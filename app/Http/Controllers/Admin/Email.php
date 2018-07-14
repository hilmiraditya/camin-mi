<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;


class Email extends Controller
{
	public function index()
	{
		return view('admin.email');
	}

	public function backup()
	{
		Mail::raw('Text', function ($message){
            $message->to('raditya113@gmail.com');
        });
        echo "email berhasil dikirim";
	}
}
