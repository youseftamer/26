<?php
require 'config/database.php';
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // update category id for post that belong to this category 
    $query = "UPDATE posts SET category_id=1 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $query);
    if (!mysqli_errno($connection)) {
        $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-category-success'] = "category deleted successfully";
    }
    //make sure the id is valid
}
header('location:' . ROOT_URL . 'admin/manage-categorise.php');
die();
