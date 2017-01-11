<?php
namespace App;

use App\Artisan\Rest;

// use App\Artisan\Mail;
// use App\Artisan\Notification;

class Events extends Rest {

	public function sendEmailsToAll() {
		$users = json_decode($_POST['data'], true);
		//...
	}
}