<?php
/**
 * User: abhilash
 * Date: 6/25/13
 * Time: 2:24 PM
 */
require_once 'db.php';
$db = new db();
$db->logoutUser();
header('Location:login.php');