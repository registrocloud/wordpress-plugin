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
    protected $client;

    /**
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     *
     */
    public function ping()
    {
        try {
            $this->client->request('POST', 'test');
        } catch (\Throwable $err) {
            var_dump($err);
        }
    }
}
