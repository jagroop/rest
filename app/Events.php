<?php
namespace App;

use App\classes\Mail;
use App\classes\Rest;
use App\classes\Notification;

class Events extends Rest {

	public function sendEmailsToAll(){
		$users = json_decode($_POST['data'], true);
		//...
	}
}