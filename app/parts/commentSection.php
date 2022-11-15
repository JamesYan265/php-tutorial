<?php
// 取得DB中的Comment //
include("app/functions/comment_get.php");
?>

<section>
        <?php foreach($comment_array as $comment) : ?>
            <!-- 根據其thread_id 放返佢地係屬於佢地的留言板 -->
            <?php if($thread["id"] == $comment["thread_id"]) :?>
            <article>
                <div class="wrapper">
                    <div class="nameArea">
                        <span>姓名：</span>
                        <p class="username"><?php echo $comment["username"]; ?></p>
                        <time>：<?php echo $comment["post_date"]; ?></time>
                    </div>
                    <p class="comment"><?php echo $comment["body"]; ?></p>
                </div>
            </article>
            <?php endif ?>
        <?php endforeach ?>
    </section>