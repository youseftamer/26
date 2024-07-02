<?php
require '../partials/header.php';
//fetch cuurent user
if(!isset($_SESSION['user-id'])){
    header('location:' . ROOT_URL . 'signin.php');
    die();
}
?>