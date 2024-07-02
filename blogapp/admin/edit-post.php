<?php
include 'partials/headr.php';
//FETCH category
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);
// fetch form 
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="<?= ROOT_URL?>admin/edit-post-logic.php" method="post" class="form-signup" enctype="multipart/form-data">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>" >
            <input type="hidden" name="id" value="<?= $post['id'] ?>" >
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
            <textarea name="body" rows="10" placeholder="Body"><?= $post['body'] ?></textarea>
            <select name="category">
                <?php while($category =mysqli_fetch_assoc($categories)):?>
                <option value="<?= $category['id'] ?>"><?= $category['title']?></option>
                <?php endwhile?>
            </select>
            <?php if (isset($_SESSION['user-is-admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail" class="btn custom-upload-button" id="uploadLabel">
                    change Thumbnail
                </label>
                <input type="file" id="thumbnail" name="thumbnail" style="display: none;" onchange="updateUploadButton(this)">
            </div>
            <button type="submit" name="submit" class="btn">update Post</button>
        </form>
    </div>
</section>
<?php
include '../partials/footer.php'
?>