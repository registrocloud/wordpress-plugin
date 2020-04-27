<?php
/*
Plugin Name: Webpane WordPress (official plugin)
Plugin URI: https://github.com/webpane/webpane-wordpress-plugin
Description: Get a new banana for your split.
Author: webpane
Version: 0.0.1
Author URI: https://github.com/webpane
*/

require_once __DIR__ . '/vendor/autoload.php';

use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;
use Webpane\WordpressPlugin\Plugin;
use Webpane\WordpressPlugin\Ping;
use Webpane\WordpressPlugin\ManagementPage;
use Webpane\WordpressPlugin\WebpaneClient;

$container = new Container();
$psrContainer = new PsrContainer($container);

$container['templates'] = function ($c) {
    return League\Plates\Engine::create(__DIR__.'/templates');
};

$container[ManagementPage::class] = function ($c) {
    return new ManagementPage($c['templates']);
};

$container[WebpaneClient::class] = function ($c) {
    return new WebpaneClient([
        'base_uri' => 'https://webpane.herokuapp.com/api/',
    ]);
};

$container[Ping::class] = function ($c) {
    return new Ping($c[WebpaneClient::class]);
};

$plugin = new Plugin($psrContainer, __FILE__);

$plugin->run();

function cron_webpane_ping_e65a6649() {
    file_put_contents(__DIR__.'/io.txt', "A", FILE_APPEND);
}

add_action( 'webpane_ping', 'cron_webpane_ping_e65a6649', 10, 0 );

