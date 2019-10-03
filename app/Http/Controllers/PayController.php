<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PayController extends Controller
{
    private $_api_context;

    /* Carga la configuración de paypal*/
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	/* Envía la donación
		Redirecciona al usuario a la pagina de paypal*/
	public function postDonation(Request $request)
	{
		dd($request);
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		//lista de elementos a enviar
		$items = array();
		$subtotal = 0;
		//$cart = \Session::get('cart');
		$cant = 5;
		$currency = 'USD';

		$item = new Item();
		$item->setName("Donación")
			->setCurrency($currency)
			->setDescription("Unidos por Marianita")
			->setQuantity(1)
			->setPrice($cant);

		$items[] = $item;

		$item_list = new ItemList();
		$item_list->setItems($items);

//		dd($item_list);

		$details = new Details();
		$details->setSubtotal($cant);

		//dd($details);
		$total = $cant;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

//dd($amount);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Colaboración de prueba para Marianita');
//dd($transaction);

		$redirect_urls = new RedirectUrls();
		$redirect_urls
			->setReturnUrl(\URL::route('donation.status'))
			->setCancelUrl(\URL::route('donation.status'));
//dd($redirect_urls);

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		//dd($payment);

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			echo $ex->getCode(); 
			echo $ex->getData();
			die($ex);
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}

		return \Redirect::route('/')
			->with('error', 'Ups! Error desconocido.');
	}

	/*Obtener el satatus de la ejecución de paypal*/
	public function getDonationStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');

//dd($payment_id);
		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');
		//dd($payerId, $token);

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('/')
				->with('message', 'No se pudo realizar la donación');
		}

		$payment = Payment::get($payment_id, $this->_api_context);
//($payment);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// Registrar el mensaje --- ok
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			//$this->saveMessage(new Message(...));

			return \Redirect::route('home')
				->with('success', 'Gracias por tu donación');
		}
		return \Redirect::route('home')
			->with('error', 'No se pudo realizar la donación');
	}
}
