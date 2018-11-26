<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class ViewController extends Controller
{
    /**
     * Show the home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instagram = new Instagram('8774113183.1677ed0.c4cdb1e0be724bceb0d36c6476932e95');
        $user = $instagram->getUser();
        $response = $instagram->getImages();//obtener las 4 primeras imagenes
        //dd($response);
        return view('web.home', compact('response','user'));
    }

    /**
     * Show the payments methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function methods()
    {
        $instagram = new Instagram('8774113183.1677ed0.c4cdb1e0be724bceb0d36c6476932e95');
        $user = $instagram->getUser();
        return view('web.methods', compact('user'));
    }

    /**
     * Show the acounts numbers.
     *
     * @return \Illuminate\Http\Response
     */
    public function transfer()
    {
        $instagram = new Instagram('8774113183.1677ed0.c4cdb1e0be724bceb0d36c6476932e95');
        $user = $instagram->getUser();
        return view('web.transfer', compact('user'));
    }
}
