<?php

namespace App\Controllers;

use App\Models\Email;

class HomeController extends Controller{
	public function index($request, $response){

		return $this->view->render($response, 'home.twig');
	}

	public function getEmailList($request, $response){

		return $this->view->render($response, 'emails.twig');

	}

	public function postSubscribe($request, $response){

		$check = Email::where('email',$request->getParam('email'))->first();

		if($check){
			$email = Email::create([
				'name' => $request->getParam('name'),
				'email' => $request->getParam('email')
			]);

			if($email){
				return $response->withRedirect('/reward?email='.$email->email);
			}
		}
		else{
			return $response->withRedirect('/rewards?email='.$check->email);
		}

		return $response->withRedirect('/');

	}

	public function getReward($request, $response){

		$e = $request->getParam('email');

		if($e){
			$subscription = Email::where('email', $e)->first();


			if($subscription->count()){

				return $this->view->render($response, 'reward.twig');

			}
		}

		return $response->withRedirect('/');

	}

}