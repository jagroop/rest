Helpers
-----------------
* [app_name](#)
* [app_log](#)
* [async](#)
* [base_url](#)
* [groupBy](#)
* [message](#)
* [storage_path](#)
* [upload](#)
* [view](#)

##### app_name()
The ```app_name()``` function returns the name of app defined in config/app.php

//Get HttpRequest Data
request('name'); // For Perticular single value

//or

request(['name', 'email', 'password']); //Returns array for specific values only

//or

request(); //All HttpRequest Data

//Load a view.
$user = array('name' => 'Clark Kent', 'planet' => 'Crypton');
view($viewName = 'index', $data = compact('user')); //views path => resources/views

//Activity logging. Note: Make sure the log file is writeable.
app_log($data = array('foo' => 'bar'), $logType = "INFO"); 
// log file path => storage/logs/requests.log

//Get storage path
storage_path();

//Get Application Base url
base_url();

//The groupBy method groups the arrays items by a given key:
groupBy($array, $key);

//Get message
message('email_confirmed'); //path => app/resources/messages/default.php

//Upload File
upload('file_name', 'path_to_folder/'); 
//returns name of the uploaded file 'Adwer3435gdfgd_batman.jpg' (returns null if file wasn't uploaded)
```
