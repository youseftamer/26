<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
    // get form data 
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$title) {
        // set error
        $_SESSION['add-category'] = "enter title";
    } elseif (!$description) {
        $_SESSION['add-category'] = "enter description";
    }
    // redirect back to add category page
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        $query = "INSERT INTO categories (title,description) VALUES ('$title','$description')";
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['add-category'] = "couldn't add";
            header('location:' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = " $title category added successful";
            header('location: ' . ROOT_URL . 'admin/manage-categorise.php');
            die();
        }
    }
}
