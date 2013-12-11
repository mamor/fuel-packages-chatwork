# FuelPHP Package for ChatWork

***

## Install
### Setup to fuel/packages/chatwork
* Use composer https://packagist.org/packages/mp-php/fuel-packages-chatwork
* git submodule
* Download zip

### Configuration

##### One
In app/config/config.php

	'always_load' => array('packages' => array(
		'chatwork',
		...

or in your code

	Package::load('chatwork');

##### Two
Copy packages/chatwork/config/chatwork.php to under app/config directory and edit

## Example

### Get yourself data

	$response = Chatwork::get('/me');
	Debug::dump($response);

### Post massage to room

	$response = Chatwork::post('/rooms/{room_id}/messages', array('body' => 'Hello!'));
	Debug::dump($response);

## License

Copyright 2013, Mamoru Otsuka. Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
