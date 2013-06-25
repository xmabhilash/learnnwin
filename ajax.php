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
            $answer = $db->getAnswerById($_POST['id']);
            if (!$db->getUserQuestionMap($_SESSION['userId'], $_POST['id'])) {
                $db->insertUserQuestionMap($_SESSION['userId'], $_POST['id']);
                $db->updateScore($_SESSION['userId']);
            }
            echo $answer;
            break;
        case 'updateScore':
            $user = $db->getUserById($_SESSION['userId']);
            if ($user) {
                $_SESSION['score'] = $user['score'];
                echo $user['score'];
            } else {
                echo 0;
            }
            break;
    }
}