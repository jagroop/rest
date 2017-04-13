<?php

namespace App;

use App\Artisan\Rest;

class App extends Rest {

	public function test()
	{
		async('sendEmailsToAll', ['name' => 'Jagroop Singh']);
	}
	public function logs() {
		return view('logtail');
	}
}
