<?php
require_once 'db.php';
$db = new db();
if (!$_SESSION['isLogin']) {
    header('Location:login.php');
}else {
    if (isset($_POST['add'])) {
        $db->addQuestion($_POST);
    }
}
?>

<?php
require_once 'meta.php';
require_once 'header.php';
?>

<div class="container">
    <div class="login-wrapper center">
        <div class="login-title">
            <h3>Add question</h3>
        </div>
        <form action="" method="post">
            <label>Question</label>
            <textarea name="question"></textarea>
            <br>
            <label>Choice A</label>
            <input name="choice1">
            <br>
            <label>Choice B</label>
            <input name="choice2">
            <br>
            <label>Choice C</label>
            <input name="choice3">
            <br>
            <label>Choice D</label>
            <input name="choice4">
            <br>
            <label>Answer</label>
            <input name="answer" placeholder="A/B/C/D">
            <br>
            <input type="submit" name="add" value="Add"/>
        </form>
    </div>
</div> <!-- /container -->
<?php
require_once 'footer.php';
?>

