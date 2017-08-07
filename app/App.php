<?php

namespace App;

use App\Artisan\Rest;

class App extends Rest {

	/**
	 * App Logs
	 * @return void
	 */
	public function logs() {
		return view('logtail');
	}
}
