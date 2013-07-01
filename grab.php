<?php
include 'meta.php';
include 'db.php';
$db = new db();

/**
 * Created by JetBrains PhpStorm.
 * User: abhilash
 * Date: 7/1/13
 * Time: 5:15 PM
 * To change this template use File | Settings | File Templates.
 */

$url = 'http://www.ldclerk.com/practice_test.php?u=PRACTICE%20TEST%201';
$source = file_get_contents($url);

// DOM document Creation
$doc = new DOMDocument;
$doc->loadHTML($source);

// DOM XPath Creation
$xpath = new DOMXPath($doc);
foreach($xpath->query('//li') as $div){
    $pos = strrpos($div->nodeValue, "(A)");
    $rest = substr($div->nodeValue, 0, $pos);
    if($db->getAnswerByQuestion($rest)) {
        echo 'hrer';
        continue;
    }
    $textChildren = $xpath->query("descendant::*[@class='radiobutton']", $div);
    $idx = 0;
    foreach ($textChildren as $ss) {
        $opt = $ss->nodeValue;
        if ($idx == 0) {
            $opt1 = str_replace('(A)', '', $opt);
        } else if ($idx == 1) {
            $opt2 = str_replace('(B)', '', $opt);
        } else if ($idx == 2) {
            $opt3 = str_replace('(C)', '', $opt);
        }else {
            $opt4 = str_replace('(D)', '', $opt);
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
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"http://www.ldclerk.com/check_mark.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"answ=A&resid=".$exp[1]);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);

    curl_close ($ch);
    echo 'queston:'.$rest;
    echo 'opts:'.$opt1.' '.$opt2.' '.$opt3.' '.$opt4;
    echo 'id'.$exp[1];
    echo 'ans:'.$server_output;
    $db->addQuestion(array(
            'question'=>$rest,
            'choice1'=>$opt1,
            'choice2'=>$opt2,
            'choice3'=>$opt3,
            'choice4'=>$opt4,
            'answer'=>$server_output,
            'userId'=>1
        ));
}
