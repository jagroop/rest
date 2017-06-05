<?php
namespace App;

use App\Artisan\Rest;
use App\Artisan\Mail;
use App\Artisan\Notification;

class Async extends Rest {

	public function sendEmailsToAll() {
		$offerId = request('offer_id');
    app_log('test');
		//...
	}
}
