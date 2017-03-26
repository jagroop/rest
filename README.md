REST 
========
[![php version](https://img.shields.io/badge/php-%3E%3D5.3-blue.svg)]()
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)]()

REST is usefull scaffold for making rest APIs using php. It is simple, fast and lightweight.

Table of contents
-----------------
* [Installation](#installation)
* [Url Structure](#url-structure)
* [Naming conventions](#naming-conventions)
* [Database](#database)
* [Cache](#cache)
* [Helpers](#helpers)
* [Validations](#validations)
* [Mails](#sending-mails)
* [Push Notifications](#sending-push-notifications)
* [Async HTTP requests](#asynchronous-http-requests)

Installation
------------

```shell
$ git clone https://github.com/jagroop/rest.git
$ cd rest
$ composer install
```

Url Structure
-------------

http://localhost/rest/web/class/method/param_1/param_2/..../param_n

Naming conventions
------------------
* All files in app folder should be "title case"

Database
--------

[PDO Query Builder](https://github.com/izniburak/PDOx/blob/master/DOCS.md)

Cache
-----

[Simple PHP Cache](https://github.com/cosenary/Simple-PHP-Cache)

Helpers
---------------

[Laravel 5 Helpers for Non-Laravel Projects](https://github.com/rappasoft/laravel-helpers)

[New helpers](https://github.com/jagroop/rest/blob/master/HELPERS.md)

Validations
-----------

[GUMP Validator](https://github.com/Wixel/GUMP)

New Validation Rules:

```php
//unique,table_name or if column name is different in db unique,table_name:col_name
$rules = array('email' => 'required|valid_email|unique,users');

//exist,table_name or exist,table_name:col_name
$rules = array('user_id' => 'required|exist,users:id');

$request = request(['name', 'email']);

$this->validate($request, $rules);

//Now you can insert your data in DB

$this->db->table('users')->insert($request);
```
 
Sending Mails
-------------

```php
use App\Artisan\Mail;

$user = $this->db->table('users')->where('id',1)->get();

//templates are in resources/email folder

$mail = Mail::send('template_name', compact('user'))
			->to('example@gmail.com', 'John Doe')
			->subject('This is a test subject')
			->deliver();
```

Sending Push Notifications
--------------------------

```php
use App\Artisan\Notification;

$user = $this->db->table('users')->where('id',1)->get();

$payload = [
	'message' => 'Test notification.',
	'badge' => 2
];

Notification::send($user, $payload);
```

Asynchronous HTTP requests
--------------------------

```php
async('sendNewOfferEmail', ['offer_id' => 123]);

//Async requests will be defined in app/Async.php

//example:

class Async {

	public function sendNewOfferEmail(){
		$offerId = request('offer_id');
		//...
	}
}
```
Happy Coding !!!
