# Websockets
A small test of websockets using Pusher
## Requirements
* php >= 5.4
* composer
* curl or any Http client

## Installation
* Clone this repo
* Run `composer install`

## How to use it?
* Start a php built-in server `php -S localhost:8000 server.php`
* Open `client.html` in your browser
* Use your Http client to send `POST`s to your server, example: `curl -X POST localhost:8000 -d message=foo`
* Enjoy it!

