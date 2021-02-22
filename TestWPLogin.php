<?php
require __DIR__ . "/vendor/autoload.php";
//  php ./TestWPInstall.php "url" "projectname" "pass"

use Symfony\Component\Panther\Client;

$client = Client::createChromeClient();

$client->request("GET", $argv[1]);

var_dump($argv[3]);

try {
    $crawler = $client->waitForVisibility("#wp-submit");
    $client->submitForm(
        "log In",
        [
            "user_login" => $argv[2],
            "user_pass" => $argv[3]
        ]
    );
} catch (Exception $e) {
    var_dump($e);
}

$client->takeScreenshot("screen.png");
