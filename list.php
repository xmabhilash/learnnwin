<?php
include 'db.php';
if (!$_SESSION['isLogin']) {
    header('Location:login.php');
}
$db = new db();
if ($_GET['type'] == 'view') {
    $answers['correct'] = $db->getUserAnswers('S', $_GET['user']);
    $answers['wrong'] = $db->getUserAnswers('F', $_GET['user']);
} else {
    $answers['correct'] = $db->getUserquestions($_GET['user']);
}
?>
<?php
require_once 'meta.php';
require_once 'header.php';
?>
    <div class="container">
        <?php if (isset($answers['wrong'])) {?>
        <ul id="tab" class="nav nav-tabs">
            <li class="active"><a href="#correct" data-toggle="tab">Correct</a></li>

                <li><a href="#wrong" data-toggle="tab">Wrong</a></li>

        </ul>
        <?php }?>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="correct">
                <table class="table table-bordered questionList">
                    <tbody>
                    <?php
                    if (sizeof($answers['correct']) >0 ) {
                    foreach ($answers['correct'] as $correct) {?>
                        <tr>
                            <td><i class="icon-chevron-right"></i><b><?php echo $correct['question']?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo $correct['result']?></td>
                        </tr>
                    <?php }
                    } else {?>
                        <tr>
                            <td><i class="icon-thumbs-down"></i ><b>No question found</b></td>
                        </tr>
                    <? }?>
                    </tbody>
                </table>
            </div>
            <?php if (isset($answers['wrong'])) {?>
            <div class="tab-pane fade" id="wrong">
                <table class="table table-bordered questionList">
                    <tbody>
                    <?php
                    if (sizeof($answers['wrong']) >0 ) {
                    foreach ($answers['wrong'] as $wrong) {?>
                        <tr>
                            <td><i class="icon-chevron-right"></i><b><?php echo $wrong['question']?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo $wrong['result']?></td>
                        </tr>
                    <?php }
                    } else {?>
                        <tr>
                            <td><i class="icon-thumbs-down"></i ><b>No question found</b></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <?php }?>
        </div>

    </div> <!-- /container -->

<?php
require_once 'footer.php';
?>
