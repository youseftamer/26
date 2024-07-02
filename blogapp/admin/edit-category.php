<?php
include 'partials/headr.php';
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    // $category = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    } else {
        // header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    }
} else {
    header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>edit category</h2>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="post" class="form-signup">
            <input type="hidden" name="id" value="<?= $category['id'] ?>" >
            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>
<?php
include '../partials/footer.php'
?>