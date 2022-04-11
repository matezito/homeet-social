<?php

namespace Homeet\Social\Front;

class Providers
{
    public function config($callback_url, $debug = true)
    {
        $config = [
            'callback' => $callback_url,
            'providers' => [
                'Facebook' => [
                    'enabled' => true,
                    'keys' => [
                        'id' => get_option('_homeet_facebook_id'),
                        'secret' => get_option('_homeet_facebook_secrete')
                    ]
                ], 
                'Google' => [
                    'enabled' => true,
                    'keys' => [
                        'id' => get_option('_homeet_google_id'),
                        'secret' => get_option('_homeet_google_secrete')
                    ]
                ]
            ],
            'debug_mode' => $debug,
            'debug_file' => plugin_dir_path(__FILE__) . '/debug-social.log'
        ];

        return $config;
    }
}
