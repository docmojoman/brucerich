<?php

namespace App\Http\Controllers;

use App\Mail\Contact;

use App\ContactMessage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function index()
    {
    	return view('contact');
    }

    public function send(ContactFormRequest $request)
    {
    	$contact = [];
    	$contact['f_name']	= $request->get('f_name');
    	$contact['l_name']	= $request->get('l_name');
    	$contact['email']	= $request->get('email');
    	$contact['body']	= $request->get('body');

    	//
    	Mail::to(env('APP_EMAIL'))->send(new Contact($contact));

    	return view('contact-success')->with('success', 'Thanks for contacting us!');
    }

    public function success()
    {
    	return view('contact-success');
    }
}
