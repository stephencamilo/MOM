<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require __DIR__.'/vendor/autoload.php';

$browser = new HttpBrowser(HttpClient::create());

$browser->request('GET', $argv[1]);
$browser->submitForm('Continue');