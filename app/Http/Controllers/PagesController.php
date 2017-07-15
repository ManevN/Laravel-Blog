<?php

namespace App\Http\Controllers;

class PagesController extends Controller{

	#process variable data or parametars
	#talk to the model
	#recieve from the model
	#compile or process tha data from model if needed
	#pass that data to correct view

	public function getIndex(){
		return view('pages.welcome');
	}

	public function getMain(){
		return view('main');
	}

	public function getAbout(){
		$firstName = "Nenad";
		$lastName = "Manev";
		$fullname = $firstName." ".$lastName;
		$email = "nenad.manev@gmail.com";
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		return view('pages.contact');
	}
}


?>