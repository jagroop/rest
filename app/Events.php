<?php
namespace App;

use App\Artisan\Rest;

// use App\Artisan\Mail;
// use App\Artisan\Notification;

class Events extends Rest {

	public function sendEmailsToAll() {
		$users = $_POST['users'];
		//loop through all $users and send emails
	}
}