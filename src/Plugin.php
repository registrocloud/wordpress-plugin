<?php
namespace Webpane\WordpressPlugin;

use Javanile\Granular\Autoload;

class Plugin extends Autoload
{
    /**
     *
     */
    public function run()
    {
        // Autoload bindable classes
        $this->autoload(__NAMESPACE__, __DIR__);
    }
}
