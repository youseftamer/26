<?php
require 'partials/header.php';
if (isset($_GET['submit']) && isset($_GET['search'])) {
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
} else {
    header('location:' . ROOT_URL . 'blog.php');
    die();
}
?>
<section class="search__bar">
    <form action="<?= ROOT_URL ?>search.php" method="get" class="container search__bar-container">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="search" id="">
        </div>
        <button type="submit" name="submit" class="btn">go</button>
    </form>
</section>
<?php if (mysqli_num_rows($posts) > 0) : ?>
<section class="posts section_extra-margin">
    <div class="container post__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="images/<?= $post['thumbnail'] ?>" alt="post__thumbnail">
                </div>
                <div class="post__info">
                    <?php
                    //fetch category from categorise table 
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-post.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                    <h3 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                    <p class="post__body"><?= substr($post['body'], 0, 150) ?>...</p>
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
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>
<?php else : ?>
    <div class="alert__message error ">
        <p>No posts found for this category</p>
    </div>
<?php endif?>
<!------------------------------ END  OF HTML--------------------------------------->
<?php
include 'partials/footer.php'
?>