<?php
include 'db.php';
$db = new db();
if (isset($_POST['signup'])) {
   $db->addUser($_POST);
   $db->loginUser($_POST);
   header('Location:index.php');
}
?>

<?php
    require_once 'meta.php';
    require_once 'header.php';
?>

    <div class="container">
        <div class="login-wrapper center">
            <div class="login-title">
                <h3>Sign Up</h3>
            </div>
            <form method="post" action="">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="John.doe@example.com" class="input-block-level">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="***************" class="input-block-level">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" class="input-block-level">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="input-block-level">
                <div class="clearfix"></div>
                <button class="btn btn-success btn-large" name="signup" type="submit">&nbsp;&nbsp;&nbsp;Log in&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </form>
        </div>
    </div> <!-- /container -->

<?php
    require_once 'footer.php';
?>