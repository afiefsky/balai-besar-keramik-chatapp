<?php

function checkSession()
{
    $CI = &get_instance();
    $session = $CI->session->userdata('login_status');
    if ($session !== 'ok') {
        redirect('auth');
    }
}

function checkLoginSession()
{
    $CI = &get_instance();
    $session = $CI->session->userdata('login_status');
    if ($session === '') {
        redirect('auth');
    }
    elseif ($session === 'ok') {
        redirect('dashboard');
    }
}
