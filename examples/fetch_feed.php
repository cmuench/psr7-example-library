<?php

require_once __DIR__ . '/../vendor/autoload.php';

$httpClient = new \Http\Client\Curl\Client();
$service = new \Acme\MyLibrary\FetchXmlFeedService($httpClient);
$xmlData = $service->fetch();

foreach ($xmlData->channel->item as $item) {
    echo (string) $item->title . "\n";
}
