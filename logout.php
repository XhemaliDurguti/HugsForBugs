<?php
/*
* Template Name: logout
*/
session_start();
if(session_destroy()){
    unset($_SESSION['login']);
    wp_redirect('home');
}
?>