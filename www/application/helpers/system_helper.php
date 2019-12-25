<?php
if(!function_exists('get_logged_user')){
    function get_logged_user() {
        $ci = &get_instance();
        return $ci->session->userdata("logged_user");
    }
}

if(!function_exists('set_logged_user')){
    function set_logged_user($user) {
        $ci = &get_instance();
        return $ci->session->set_userdata("logged_user", $user);
    }
}

if(!function_exists('user_logout')){
    function user_logout() {
        $ci = &get_instance();
        return $ci->session->unset_userdata("logged_user");
    }
}
?>