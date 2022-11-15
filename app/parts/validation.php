<!-- Value Checking 訊息 -->
<!-- <?php include("app/functions/comment_add.php"); ?> -->

<?php if(isset($error_msg)) : ?>
    <ul class="errorMessage">
        <?php foreach($error_msg as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>