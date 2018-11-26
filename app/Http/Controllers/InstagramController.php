<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class InstagramController extends Controller
{
    public function instagramMaya(){
    	//$instagram = new Instagram('4479407797.1677ed0.4084700de9784abb99ba4dd4a9559c00');
    	$instagram = new Instagram('8774113183.1677ed0.c4cdb1e0be724bceb0d36c6476932e95');
    	$response = $instagram->get();
    	//$user = $response[0]->user;
    	dd($response[0]);
    	return $response;
    }
}
