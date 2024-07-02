<?php
include 'partials/header.php';
//fetch posts from DB if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    //fetch post from DB based on id
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    //fetch data
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>
<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__author">
            <?php
            //fetch author from users table
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            ?>
            <div class="post__author-avatar">
                <img src="images/<?= $author['avatar'] ?>" alt="">
            </div>
            <div class="post__author-info">
                <h5>By: <?= "{$author['firstname']} {$author['lastname']} " ?></h5>
                <small><?= date("M d, Y - h:i A", strtotime($post['date_time'])) ?></small>
            </div>
        </div>
        <div class="singlepost__thubmnail">
            <img src="images/<?=$post['thumbnail']?>">
        </div>
        <p>
            <?= $post['body'] ?>
        </p>
    </div>
    <?php
    include 'partials/footer.php'
    ?>