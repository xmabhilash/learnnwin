<?php
    $scores = $db->getToppers();
?>
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
                        <a class="btn btn-success" href="#topperModal" data-toggle="modal">Toppers</a>
                        <!--<a class="btn btn-primary" href="#myModal" data-toggle="modal">Add Group</a>-->
                        <a href="javascript:void(0)" class="btn btn btn-success btn-score">Score:<?php echo $_SESSION['score'];?></a>
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

<div id="myModal" class="modal hide fade">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Add group</h3>
    </div>
    <div class="modal-body">
        <form method="post" action="" id="groupModel">
            <input type="hidden" name="ajax" value="addGroup"/>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="input-block-level">
            <label for="time">Timeout</label>
            <input type="test" id="time" name="time" value="60" class="input-block-level">(maximum 300 seconds)
        </form>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="btn btn-primary addGroup">Save changes</a>
        <a href="#" class="btn" data-dismiss="modal" >Close</a>
    </div>
</div>

<div id="topperModal" class="modal hide fade">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" >&times;</a>
        <h3>Top scorers</h3>
    </div>
    <table class="table table-bordered questionList">
        <thead>
            <th>Name</th>
            <th>Score</th>
            <th>View</th>
        </thead>
        <tbody>
        <?php foreach ($scores as $score) {?>
            <tr>
                <td><?php echo $score['firstName'].' '.$score['lastName']?></td>
                <td><?php echo $score['score']?></td>
                <td><a href="list.php?type=view&user=<?php echo $score['id'];?>" class="btn">View</a><a href="list.php?type=contribution&user=<?php echo $score['id'];?>" class="btn">Contributions</a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="btn btn-primary">Save changes</a>
        <a href="#" class="btn" data-dismiss="modal" >Close</a>
    </div>
</div>
