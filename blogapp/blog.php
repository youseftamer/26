<?php
include 'partials/header.php';
//fetch all post from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC ";
$posts = mysqli_query($connection, $query);
?>
    <!-- ==================================================================================================== -->
    <section class="search__bar">
        <form action="<?= ROOT_URL?>search.php" method="get" class="container search__bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="search" id="">
            </div>
            <button type="submit" name="submit" class="btn">go</button>
        </form>
    </section>
<!--====================================================================================================================================-->
<section class="posts <?= $featured ? '' : 'section_extra-margin' ?>">
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


<?php
include 'partials/footer.php';
?>
