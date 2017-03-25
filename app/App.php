<?php

namespace App;

use App\Artisan\Rest;

class App extends Rest {

	public function test() {
		app_log('test');
	}

	public function logs() {
		// die(assets());
		return view('logtail');
	}

}