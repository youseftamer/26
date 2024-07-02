<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    //get update from data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    ///check valid
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "invalid form input";
    } else {
        //update user
        $query = "UPDATE users 
        SET firstname = '$firstname', 
            lastname = '$lastname', 
            username = '$username', 
            is_admin = $is_admin 
        WHERE id = $id
        LIMIT 1;
        ";
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "failed to update user";
        } else {
            $_SESSION['edit-user-success'] = "user $firstname $lastname updated successfully";
        }
    }
}
header('location:' . ROOT_URL . 'admin/manage-users.php');
die();
