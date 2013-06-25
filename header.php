<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Learn and Win</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="index.php">Home</a></li>>
                </ul>
            </div><!--/.nav-collapse -->
            <div class="pull-right">
                <?php
                    if (isset($_SESSION['isLogin']) && $_SESSION['isLogin']) {?>
                        <?php if($_SESSION['score']!=0) {?>
                            <a href="javascript:void(0)" class="btn btn btn-success btn-score">Score:<?php echo $_SESSION['score'];?></a>
                        <?php }?>
                        <a href="add.php" class="btn btn-primary">Add Question</a>
                        <a href="logout.php" class="btn btn btn-warning">Logout</a>

                    <?php } else {?>
                    <a href="login.php" class="btn btn">Login</a>
                    <a href="register.php" class="btn btn">Register</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>