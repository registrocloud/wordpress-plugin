<?php
namespace Webpane\WordpressPlugin;

use Javanile\Granular\Bindable;

class Ping extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:webpane_ping' => 'ping',
    ];

    /**
     *
     */
    public function ping()
    {
        file_put_contents(__DIR__.'/a.txt', 'AA', FILE_APPEND);
    }
}
