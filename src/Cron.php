<?php
namespace Webpane\WordpressPlugin;

use Javanile\Granular\Bindable;

class Cron extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'filter:cron_schedules' => 'cronSchedules',
        'plugin:register_activation_hook' => 'registerActivationHook',
        'plugin:register_deactivation_hook' => 'registerDeactivationHook',
    ];

    /**
     * Adds a custom cron schedule for every 5 minutes.
     *
     * @param array $schedules An array of non-default cron schedules.
     * @return array Filtered array of non-default cron schedules.
     */
    public function cronSchedules($schedules)
    {
        $schedules['every-5-minutes'] = array(
            'interval' => 5 * 60,
            'display' => __( 'Every 5 minutes', 'devhub' )
        );

        return $schedules;
    }

    /**
     *
     */
    public function registerActivationHook()
    {
        var_Dump("AAAAA");
        if (!wp_next_scheduled('webpane_ping')) {
            wp_schedule_event(time(), 'every-5-minutes', 'webpane_ping');
        }
    }

    /**
     *
     */
    public function registerDeactivationHook()
    {
        wp_clear_scheduled_hook('webpane_ping');
    }
}
