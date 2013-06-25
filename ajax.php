<?php
include 'db.php';
$db = new db();
/**
 * User: abhilash
 * Date: 6/25/13
 * Time: 12:22 PM
 */
if (isset($_POST['ajax'])) {
    switch ($_POST['ajax']) {
        case 'getAnswer':
            echo $db->getAnswerById($_POST['id']);
            break;
    }
}