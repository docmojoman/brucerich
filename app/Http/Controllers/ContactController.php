<?php

namespace App\Http\Controllers;

use App\Mail\Contact;

use App\ContactMessage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
    	return view('contact');
    }

    public function send(Request $request)
    {
    	$this->validate($request, [
	      'f_name'		=>  'required',
	      'l_name'		=>  'required',
	      'email'  		=>  'required|email',
	      'body' 		=>  'required'
	     ]);

    	$subject = "Message from the Bruce Rich web site";

    	// Contact::create($request->all());

    	Mail::to(env('APP_EMAIL'))->send(new \ContactMessage(
	    	[
				'f_name'	=> $request->get('f_name'),
				'l_name'	=> $request->get('l_name'),
				'email'		=> $request->get('email'),
				'body'		=>	$request->get('body')
			]));
    	// \Mail::send('emails.contact',
    	// 	[
    	// 		'f_name'	=> $request->get('f_name'),
    	// 		'l_name'	=> $request->get('l_name'),
    	// 		'email'		=> $request->get('email'),
    	// 		'body'		=>	$request->get('body')
    	// 	], function($message) use ($request)
    	// 	{
    	// 		$message->from('contact@brucerich.com');
    	// 		$message->to(env('APP_EMAIL', 'Admin'));
    	// 		$message->subject($subject);
    	// 	});

	    return back()->with('success', 'Thanks for contacting us!');
    }
}
