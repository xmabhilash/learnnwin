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
        <div id = 'editor-box' style="width: 60%;height: 189px;border: 1px solid #CCCCCC;float:left" contenteditable="true"></div>
        <div id="suggestion-box" style="cursor:pointer;width:35%;min-height: 189px;border: 1px solid #CCCCCC;float:left"></div>
    </div> <!-- /container -->
<?php
require_once 'footer.php';
?>