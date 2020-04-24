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
use Webpane\WordpressPlugin\ManagementPage;

$container = new Container();
$psrContainer = new PsrContainer($container);

$container['tempaltes'] = function ($c) {
    return League\Plates\Engine::create(__DIR__.'/templates');
};

$container[ManagementPage::class] = function ($c) {
    return new ManagementPage($c['tempaltes']);
};

$plugin = new Plugin($psrContainer);


$plugin->run();
