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
            $response = $this->client->request('POST', 'v1/ping');
            $responseText = $response->getBody()->getContents();
            $responseJson = json_decode($responseText, true);
        } catch (\Throwable $err) {
            $responseJson = [
                'success' => false,
                'error' => [
                    'message' => $err->getMessage(),
                ]
            ];
        }

        update_option('webpane_ping_log', json_encode($responseJson));
    }
}
