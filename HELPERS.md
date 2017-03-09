Helpers
-----------------
* [app_name](#app_name)
* [app_log](#app_log)
* [async](#async)
* [base_url](#base_url)
* [groupBy](#groupBy)
* [message](#message)
* [request](#request)
* [storage_path](#storage_path)
* [upload](#upload)
* [view](#view)

##### app_name()
The `app_name()` function returns the name of app defined in `config/app.php`

##### app_log()
The `app_log()` function logs almost every type of data types in `storage/logs/requests.log`

```php
app_log($data = array('foo' => 'bar'), $logType = "INFO"); 
```

__Note:__ Make sure `requests.log` file is writable.

##### async()
The `async()` function is for sending asynchronous(non-blocking) HTTP requests.

##### base_url()
The `base_url()` function returns app base url defined in `config/app.php`

##### groupBy()
The `groupBy()` function groups the arrays items by a given key.

```php
$array = [
    ['account_id' => 'account-x10', 'product' => 'Chair'],
    ['account_id' => 'account-x10', 'product' => 'Bookcase'],
    ['account_id' => 'account-x11', 'product' => 'Desk'],
];

$grouped = groupBy($array, 'account_id');

/*
    [
        'account-x10' => [
            ['account_id' => 'account-x10', 'product' => 'Chair'],
            ['account_id' => 'account-x10', 'product' => 'Bookcase'],
        ],
        'account-x11' => [
            ['account_id' => 'account-x11', 'product' => 'Desk'],
        ],
    ]
*/
```

##### message()
The `message()` function returns a message defined in `resources/messages/default.php`

```php
message('email_confirm') //Please confirm your email address.
```

##### request()
The `request()` function returns the http request data.

```php
request('name'); // For Perticular single value
request(['name', 'email', 'password']); //Returns array for specific values only
request(); // All HttpRequest Data
```

##### storage_path()
The `storage_path()` function returns app storage path.

##### upload()
The `upload()` function uploads a file to specific path and returns the name of uploaded file.

```php
upload('file_name', 'path_to_folder/'); 
```

##### view()
The `view()` function returns a view defined in `resources/views/`.

```php
$user = array('name' => 'Clark Kent', 'planet' => 'Crypton');
view($viewName = 'index', $data = compact('user'));
```
