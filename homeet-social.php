<?php
/**
 * Plugin Name: Homeet Social
 * Version: 1.0.0
 */

require plugin_dir_path( __FILE__ ).'/vendor/autoload.php';


use Homeet\Social\Admin\Options;
use Homeet\Social\Front\SocialSession;

function social_buttons()
{
    require plugin_dir_path( __FILE__ ).'/social-buttons-register.php';
}

add_action('homeet_social_buttons_register', 'social_buttons');

function homeet_social_admin()
{
    return new Options();
}

homeet_social_admin();

function homee_social_session()
{
    if (!isset($_GET['social-login']) || !isset($_GET['callback'])) return;

    $init = new SocialSession();
    $init->session_register_init(home_url(), 'https://www.youtube.com/watch?v=oIIxlgcuQRU&list=RDoIIxlgcuQRU&start_radio=1&ab_channel=YeahYeahYeahsVEVO' );
}

add_action('init', 'homee_social_session');

// function algo()
// {
//     echo plugin_dir_url( __FILE__ );
// }

// add_action('init', 'algo');