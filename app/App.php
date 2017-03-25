<?php

namespace App;

use App\Artisan\Rest;

class App extends Rest {

	public function logs() {
		return view('logtail');
	}
}
