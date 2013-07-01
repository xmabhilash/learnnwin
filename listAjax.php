<?php
/**
 * User: abhilash
 * Date: 7/1/13
 * Time: 7:50 PM
 */
$pageLimit = 100;
$pageLinkLimit = 5;
include 'db.php';
if (!$_SESSION['isLogin']) {
    echo 'Please login to get the question list...';
}
$page = (int) $_POST['page'];

$limit = ($page-1) * 100;
$start = 1;
$end = $pageLinkLimit;
$db = new db();
$questionCount = $db->getQuestionCount();
$questions = $db->getAllQuestion($limit, $pageLimit);
$totalPage = ceil($questionCount / $pageLimit);
$previousClass = '';
$nextClass = '';
if ($page == 1) {
    $previousClass = 'disabled noClick';
}
if ($page == $totalPage) {
    $nextClass = 'disabled noClick';
}

if ($page >= $pageLinkLimit) {
    $start = $page-2;
    if ($page + 2 >= $totalPage) {
        $start = $totalPage-4;
        $end = $totalPage;
    } else {
        $end = $page + 2;
    }
}
?>
<h3 class="btn-primary" style="padding: 5px; margin-bottom: 5px;">Latest Questions</h3>
<div class="pagination pagination-right">
    <ul>
        <li class="<?php echo $previousClass;?> prev"><a href="javascript:void(0)">Prev</a></li>
        <?php for ($i = $start; $i <= $end; $i++) {?>
            <li class = "<?php if ($i == $page) {echo 'active noClick';} ?>"><a href="javascript:void(0)"><?php echo $i;?></a></li>
        <?php } ?>
        <li class = "<?php echo $nextClass;?> next"><a href="javascript:void(0)">Next</a></li>
    </ul>
</div>
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
<div class="pagination pagination-right">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>