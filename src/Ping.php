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
        echo "PING";
    }
}
