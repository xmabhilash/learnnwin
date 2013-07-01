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
$textChildren = $xpath->query("descendant::*[@class='radiobutton']", $div);
var $idx = 0;
foreach ($textChildren as $ss) {
    $opt = $ss->nodeValue;
    if ($idx == 0) {
        $opt1 = str_replace('(A)', '', $opt);
    } else if ($idx == 1) {
        $opt2 = str_replace('(B)', '', $opt);
    } else if ($idx == 2) {
        $opt3 = str_replace('(C)', '', $opt);
    }else {
        $opt4 = str_replace('(B)', '', $opt);
    }
    $textChildren2 = $xpath->query("descendant::*", $ss);
    $i=0;
    foreach ($textChildren2 as $ss2) {
        if ($i == 0) {
            $i++;
            continue;
        } else {
            $result =$ss2->getAttribute('id');
            $exp = explode('_', $result);
            $i = 0;
        }
    }
    $idx++;
}

?>

