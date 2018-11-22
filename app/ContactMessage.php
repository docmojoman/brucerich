<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    public function contactMessage()
    {
    	[
			'f_name'	=> '',
			'l_name'	=> '',
			'email'		=> '',
			'body'		=> ''
		];
    }
}
