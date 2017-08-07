<?php
namespace App;

use App\Artisan\Rest;

class Async extends Rest {

	public function sendEmailsToAll() {
		$offerId = request('offer_id');
		app_log('test');
		//...
	}
}
