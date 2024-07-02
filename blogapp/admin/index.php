<?php
include 'partials/headr.php';
//fetch current user post 
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id,title,category_id,is_featuerd 
FROM posts 
WHERE author_id = $current_user_id 
ORDER BY id DESC;
";
$posts = mysqli_query($connection, $query);

?>
<section class="dashboard">
    <?php if (isset($_SESSION['add-post'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['add-post-success'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
        <?php elseif (isset($_SESSION['edit-post'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post-success'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
        <?php elseif (isset($_SESSION['delete-post-success'])) : ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
        <?php elseif (isset($_SESSION['delete-post'])) : ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-post'];
                unset($_SESSION['delete-post']);
                ?>
            </p>
        </div>
    <?php endif ?>

    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-arrow-to-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-left-arrow-to-left"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active"><i class="uil uil-postcard"></i>
                        <h5>Manage post</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user-is-admin'])) : ?>
                    <li>
                        <a href="add-user.php"><i class="uil uil-user-plus"></i>
                            <h5>Add user</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                            <h5>Manage users</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php"><i class="uil uil-create-dashboard"></i>
                            <h5>add categories </h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categorise.php"><i class="uil uil-list-ul"></i>
                            <h5>Manage categories </h5>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage posts</h2>
            <?php if (mysqli_num_rows($posts) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>category</th>
                            <th>is_featured</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($post = mysqli_fetch_assoc($posts)): ?>
                        <!-- get category title  -->
                        <?php 
                        $category_id = $post['category_id'];
                        $category_query = "SELECT title FROM categories WHERE id=$category_id";
                        $category_result = mysqli_query($connection, $category_query);
                        $category = mysqli_fetch_assoc($category_result);
                        ?>
                        <tr>
                            <td><?= $post['title']?></td>
                            <td><?= $category['title']?></td>
                            <td><?= $post['is_featuerd']?></td>
                            <td><a href="<?= ROOT_URL?>admin/edit-post.php?id=<?=$post['id'] ?>" class="btn sm">Edit</a></td>
                            <td><a href="<?= ROOT_URL?>admin/delete-post.php?id=<?=$post['id'] ?>" class="btn sm danger">Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert__message error">
                    <p>No posts found</p>
                </div>
            <?php endif; ?>
        </main>
    </div>
</section>
<?php
include '../partials/footer.php'
?>