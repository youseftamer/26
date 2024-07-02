</section>
<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
         $all_categories = "SELECT * FROM categories";
         $all_categories = mysqli_query($connection, $all_categories);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
        <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile; ?>
    </div>
</section>
<footer>
        <div class="footer__socials">
            <a href="" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="" target="_blank"><i class="uil uil-facebook-f"></i></a>
            <a href="" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="" target="_blank"><i class="uil uil-linkedin"></i></a>
            <a href="" target="_blank"><i class="uil uil-instagram-alt"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>categorize</h4>
                <ul>
                    <li><a href="">category</a></li>
                    <li><a href="">hi</a></li>
                    <li><a href="">fisr</a></li>
                    <li><a href="">knor</a></li>
                    <li><a href="">ohh</a></li>
                    <li><a href="">cool</a></li>
                </ul>
            </article> 
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">travil</a></li>
                    <li><a href="">home to taci</a></li>
                    <li><a href="">ain elsokhna</a></li>
                    <li><a href="">matroh</a></li>
                    <li><a href="">ay 7aga</a></li>
                    <li><a href="">safreh</a></li>
                </ul>
            </article> 
            <article>
                <h4>suppor</h4>
                <ul>
                    <li><a href="">online support</a></li>
                    <li><a href="">call numper</a></li>
                    <li><a href="">email</a></li>
                    <li><a href="">social support</a></li>
                    <li><a href="">locaion</a></li>
                    <li><a href="">owner</a></li>
                </ul>
            </article>
            <article>
                <h4>permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">contact</a></li>
                    <li><a href="">call owner</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small> &copy;2024 Yousef Tamer. All rights reserved. </small>
        </div>
    </footer>
    <script src="<?= ROOT_URL ?>js/main.js"></script>
</body>
</html>