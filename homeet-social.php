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
    $init->session_register_init(home_url(), home_url().'/?social-login='.$_GET['social-login'].'&callback='.$_GET['callback']);
}

add_action('init', 'homee_social_session');
