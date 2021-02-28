<?php
require __DIR__ . "/vendor/autoload.php";
//  php ./TestWPInstall.php "url" "projectname" "pass"

use Symfony\Component\Panther\Client;

$client = Client::createFirefoxClient();

$client->request("GET", $argv[1]);

$client->submitForm(
    "#wp-submit",
    [
        "user_login" => $argv[2],
        "user_pass" => $argv[3]
    ]
);

$client->takeScreenshot("screen.png");
