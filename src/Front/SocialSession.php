<?php

namespace Homeet\Social\Front;

use \Hybridauth\Hybridauth;
use Homeet\Social\Front\Providers;

class SocialSession
{
    public function session_register_init($callback)
    {
        $provider = $_GET['social-login'] == 'facebook' ? 'Facebook' : 'Google';
        $redirect_url = $_GET['callback'] == 'register' ? get_permalink(get_option('homeet_create_profile_page')) : 'otrol lado';

        $config = [
            'callback' => $callback,
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
            'debug_mode' => true,
            'debug_file' => plugin_dir_path(__FILE__) . '/debug-social.log'
        ];
  
        try {
            $hybridauth = new Hybridauth($config);

            $adapter = $hybridauth->authenticate($provider);

            $tokens = $adapter->getAccessToken();
            $userProfile = $adapter->getUserProfile();

            print_r($tokens);
            print_r($userProfile);
            die();
            $adapter->disconnect();
            wp_redirect($redirect_url);
            exit();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}
