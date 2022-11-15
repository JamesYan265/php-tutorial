<?php 
    $position = 0;

    if(isset($_POST["submitButton"])) {
        $position = $_POST["position"];
    }
?>

<form class="formWrapper" method="POST">
    <div>
        <input type="submit" class="submit" valuse="輸入" name="submitButton"/>
        <label>姓名：</label>
        <input type="text" name="username" class="username" value="<?php if($thread["id"] == $comment["thread_id"]) echo $_SESSION["username"] ?>" require/>
        <input type="hidden" name="threadID" value="<?php echo $thread["id"] ?>" require/>
    </div>
    <div>
        <textarea class="commentTextArea" name="commentBody" require></textarea>
    </div>
    <!-- 取得正確網頁scroll位置 -->
    <input type="hidden" name="position" value="0" />
</form>
<!-- 裝入Jquery(cdn version) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    //$(document).ready = 讀取完html後
    $(document).ready(() => {
        $("input[type=submit]").click(() => {
            //定位 scroll位置
            let position = $(window).scrollTop();
            $("input:hidden[name=position]").val(position);
        })
        $(window).scrollTop(<?php echo $position; ?>);
    })
</script>