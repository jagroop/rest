<?php

namespace App;

use App\Artisan\Mail;
use App\Artisan\Rest;

class Auth extends Rest {

	public function register() {

		$request = request(['name', 'email']);

		//Set Validation Rules
		$rules = array(
			'name' => 'required|unique,users',
			'email' => 'required|valid_email|unique,users',
		);

		//Validate Request Data
		$this->validate($request, $rules);

		//Insert data into db after validation
		$newUser = $this->db->table('users')->insert($request);

		if ($newUser) {

			$user = $this->db->table('users')->where('id', $newUser)->get();

			//Send Welcome email

			Mail::send('email_confirm', compact('user'))
				->to($request['email'], $request['name'])
				->subject('Welcome to my app')
				->deliver();
		}

		//return  response

		return ($newUser) ? $this->success('User has been successfully registered.') : $this->error('Something Went Wrong.');

	}

}