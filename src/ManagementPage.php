<?php
namespace Webpane\WordpressPlugin;

use Javanile\Granular\Bindable;

class ManagementPage extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:admin_init' => 'registerSettings',
        'action:admin_menu' => 'addManagementPage',
    ];

    /**
     *
     */
    protected $templates;

    /**
     * ManagementPage constructor.
     *
     * @param $tempaltes
     */
    public function __construct($templates)
    {
        $this->templates = $templates;
    }

    /**
     * Add management page to admin menu.
     */
    public function addManagementPage()
    {
        add_management_page('Webpane', 'Webpane', 'install_plugins', 'webpane', [$this, 'render'], 1);
    }

    /**
     *
     */
    public function registerSettings()
    {
        add_option('webpane_secret', 'This is my option value.');
        register_setting('webpane_options_group', 'webpane_secret', 'myplugin_callback');
    }

    /**
     * Render page.
     */
    public function render()
    {
        echo $this->templates->render('management-page', ['secret' => get_option('webpane_secret')]);
    }
}
