<?php

namespace Homeet\Social\Front;

use \Hybridauth\Hybridauth;
use Homeet\Social\Front\Providers;

class SocialSession
{
    public function session_register_init($url_redirect = null, $callback)
    {
        $session = new Providers();

        $provider = $_GET['social-login'] == 'facebook' ? 'Facebook' : 'Google';
       // $callback = $_GET['callback'] == 'register' ? get_permalink(get_option('homeet_create_profile_page')) : 'otrol lado';

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
            $adapter->disconnect();
            wp_redirect($url_redirect ? $url_redirect : home_url());
            exit();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}
