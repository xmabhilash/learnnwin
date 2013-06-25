<?php
include 'db.php';
$db = new db();
if (isset($_POST['login'])) {
    $db->loginUser($_POST);
    if ($_SESSION['isLogin']) {
        header('Location:index.php');
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
            <h3>Log in</h3>
        </div>
        <form method="post" action="">
            <div class="control-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="John.doe@example.com" class="input-block-level">            <span style="display: none" id="FLoginForm_username_em_" class="help-inline"></span>        </div>
            <div class="control-group rebilly-float-error">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="***************" class="input-block-level">
            </div>
            <div class="clearfix"></div>
            <button class="btn btn-success btn-large" name="login" type="submit">&nbsp;&nbsp;&nbsp;Log in&nbsp;&nbsp;&nbsp;&nbsp;</button>
        </form>
    </div>
</div> <!-- /container -->
<?php
    require_once 'footer.php';
?>
