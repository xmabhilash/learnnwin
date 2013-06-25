<?php
include 'db.php';
$db = new db();
$questions = $db->getAllQuestion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Learn and Win</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>

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
                    <li class="active"><a href="/">Home</a></li>>
                </ul>
                <a href="#" class="btn btn-primary">Add Question</a>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <h3>Latest Questions</h3>
    <table class="table table-bordered questionList">
        <tbody>
        <?php foreach ($questions as $question) {?>
            <tr>
                <td colspan= "4"><i class="icon-chevron-right"></i><?php echo $question['question']?></td>
            </tr>
            <tr>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>A" id='<?php echo $question['id']?>'>A</a> <?php echo $question['choice1']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>B" id='<?php echo $question['id']?>'>B</a> <?php echo $question['choice2']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>C" id='<?php echo $question['id']?>'>C</a> <?php echo $question['choice2']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>D" id='<?php echo $question['id']?>'>D</a> <?php echo $question['choice4']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/bootstrap-modal.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-scrollspy.js"></script>
<script src="assets/js/bootstrap-tab.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-popover.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-carousel.js"></script>
<script src="assets/js/bootstrap-typeahead.js"></script>
<script src="assets/js/common.js"></script>
</body>
</html>
