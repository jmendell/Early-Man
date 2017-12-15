<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCard;
use App\Http\Controllers\SubscriberController;

use Illuminate\Http\Request;

class MailController extends Controller
{
	public function sendCard (Request $request) {

		$data = array(
			'to' =>  $request->to,
			'from' =>  $request->from,
			'image' =>  $request->image,
			'subscribe' =>  $request->subscribe
		);

		if ($data['subscribe'] !== 'false') {
			$newsletter = new SubscriberController;
			$list = $newsletter::store($data['from']);
		}
		
		Mail::to($data['to'])->send(new SendCard($data));

		if(count(Mail::failures()) > 0){
			return '0';
		}else{
			return '1';
		}
	
	}
}
