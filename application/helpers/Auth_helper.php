<?php

function _checklogin() 
{
    $ci = get_instance();
        if(!$ci->session->userdata('user_email')) {
            redirect('auth');
        }
}