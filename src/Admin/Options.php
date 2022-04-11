<?php

namespace Homeet\Social\Admin;

class Options 
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_init', [$this, 'save_options']);
    }

    public function menu()
    {
        add_menu_page( 
            'Homeet Social',
            'Homeet Social',
            'manage_options',
            'homeet-social',
            [$this,'menu_callback'],
            'dashicons-admin-network',
            40
        );
    }

    public function menu_callback()
    {
        require plugin_dir_path( __FILE__ ).'/partials/options.php';
    }

    public function save_options()
    {
        if(isset($_POST['_homeet_facebook_id'])) {
            update_option('_homeet_facebook_id', $_POST['_homeet_facebook_id'],true);
        }
        if(isset($_POST['_homeet_facebook_secrete'])) {
            update_option('_homeet_facebook_secrete', $_POST['_homeet_facebook_secrete'],true);
        }
        if(isset($_POST['_homeet_google_id'])) {
            update_option('_homeet_google_id', $_POST['_homeet_google_id'],true);
        }
        if(isset($_POST['_homeet_google_secrete'])) {
            update_option('_homeet_google_secrete', $_POST['_homeet_google_secrete'],true);
        }
    }
}