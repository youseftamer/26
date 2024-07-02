<?php
include 'partials/headr.php';
//fetch categories from DB 
$query = "SELECT * FROM categories ";
$categories = mysqli_query($connection, $query);
$title = $_SESSION['add-post-data']['title']?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <?php if (isset($_SESSION['add-post'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" class="form-signup" method="post" enctype="multipart/form-data">
            <input name="title" value="<?= $title?>" type="text" placeholder="Title">
            <textarea name="body"   rows="10" placeholder="Body"><?= $title?></textarea>
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"> <?= $category['title'] ?> </option>
                <?php endwhile; ?>
            </select>
            <?php if (isset($_SESSION['user-is-admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail" class="btn custom-upload-button" id="uploadLabel">
                    Upload Thumbnail
                </label>
                <input type="file" id="thumbnail" name="thumbnail" style="display: none;" onchange="updateUploadButton(this)">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
    </div>
</section>
<?php
include '../partials/footer.php'
?>