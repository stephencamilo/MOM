<?php
require __DIR__ . "/vendor/autoload.php";
//  php ./TestWPInstall.php "url" "projectname" "pass"

use Symfony\Component\Panther\Client;

$client = Client::createChromeClient();

$client->request("GET", $argv[1]);

$crawler = $client->waitForVisibility("#language-continue");
$client->submitForm("Continue");

try {
    $crawler = $client->waitForVisibility("a.button");
    $client->clickLink("Let’s go!");
} catch (Exception $e) {
}

try {
    $crawler = $client->waitForVisibility("table.form-table");
    $client->submitForm("Submit", [
        "dbname" => "$argv[2]",
        "uname" => "$argv[2]",
        "pwd" => "$argv[2]",
    ]);
} catch (Exception $e) {
}

try {
    $crawler = $client->waitForVisibility("a.button");
    $client->clickLink("Run the installation");
} catch (Exception $e) {
}

try {
    $crawler = $client->waitForVisibility("#submit");
    $client->submitForm("Install WordPress", [
        "weblog_title" => "$argv[2]",
        "user_name" => "$argv[2]",
        "admin_password" => "$argv[3]",
        "admin_email" => "$argv[2]@$argv[2].local",
    ]);
} catch (Exception $e) {
    var_dump($e);
}

$client->takeScreenshot("screen.png");
