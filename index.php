<?php
include 'db.php';
if (!$_SESSION['isLogin']) {
    header('Location:login.php');
}
$db = new db();
$questions = $db->getAllQuestion();
?>
<?php
    require_once 'meta.php';
    require_once 'header.php';
?>
<div class="container">
    <h3>Latest Questions</h3>
    <table class="table table-bordered questionList">
        <tbody>
        <?php foreach ($questions as $question) {?>
            <tr>
                <td colspan= "4"><i class="icon-chevron-right"></i><b><?php echo $question['question']?></b></td>
            </tr>
            <tr>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>A" id='<?php echo $question['id']?>'>A</a> <?php echo $question['choice1']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>B" id='<?php echo $question['id']?>'>B</a> <?php echo $question['choice2']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>C" id='<?php echo $question['id']?>'>C</a> <?php echo $question['choice3']?></td>
                <td><a href="javascript:void(0)" class="btn opt <?php echo $question['id']?>D" id='<?php echo $question['id']?>'>D</a> <?php echo $question['choice4']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div> <!-- /container -->

<?php
   require_once 'footer.php';
?>