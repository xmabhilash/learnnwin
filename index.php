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
    <div style="width: 75%; float: left;" class='questionContainer'>

    </div>
    <div style="float: right; width: 23%;">
        <h3 class="btn-primary" style="padding: 5px;">Question Papers</h3>
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        <i class="icon-chevron-right"></i> PSC
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ol>
                            <li><a href="javascript:void(0)">PSC LDC Idukki-2003</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<?php
   require_once 'footer.php';
?>