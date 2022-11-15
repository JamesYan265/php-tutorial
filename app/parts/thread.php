<?php
include_once("./app/database/connect.php");

// 取得DB中的thread //
include("app/functions/thread_get.php");

?>

<?php foreach($thread_array as $thread) : ?>
    <div class="threadWrapper">
        <div class="childWrapper">

            <div class="threadTitle">
                <span>【主題】</span>
                <h1><?php echo $thread['title'] ?></h1>
            </div>

            <!-- comment Section -->
            <?php include("commentSection.php") ?>

            <!-- Form Section -->
            <?php include("commentForm.php") ?>
        </div>
    </div>
<?php endforeach ?>