<?php
namespace Webpane\WordpressPlugin;

use Javanile\Granular\Bindable;

class ManagementPage extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:admin_menu' => ['addManagementPage'],
    ];

    /**
     * ManagementPage constructor.
     *
     * @param $tempaltes
     */
    public function __construct($tempaltes)
    {
        $this->tempaltes = $tempaltes;
    }

    /**
     *
     */
    public function addManagementPage()
    {
        add_management_page('Webpane', 'Webpane', 'install_plugins', 'webpane', [$this, 'render'], 1);
    }

    /**
     *
     */
    public function render()
    {
        echo $this->templates->render('management-page', ['name' => 'Jonathan']);
    }
}
