<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Panther\Client;

$client = Client::createChromeClient();

$client->request('GET', $argv[1]);

$crawler = $client->waitForVisibility('#language-continue');
$client->submitForm('Continue');

$crawler = $client->waitForVisibility('a.button');
$client->clickLink('Let’s go!');

$crawler = $client->waitForVisibility('table.form-table');
$client->submitForm('Submit' ,[
    'dbname' => 'wordpressx',
    'uname' => 'wordpressx',
    'pwd' => 'wordpressx',
]);

$crawler = $client->waitForVisibility('a.button');
$client->clickLink('Run the installation');

$client->takeScreenshot('screen.png');