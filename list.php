<?php 
    include 'db.php';
    $db = new db();
    $questions = $db->getAllQuestion();
?>
<html>
    <head>
        <title>Learn and win</title>
        <style>
            ol li {cursor: pointer;}
        </style>
    </head>
    <body>
        <h3>Questions</h3>
        <?php foreach ($questions as $question) {?>
        <div><?php echo $question['question']?></div>
        <ol style="list-style: upper-alpha outside ">
        <li><?php echo $question['choice1']?></li>
        <li><?php echo $question['choice2']?></li>
        <li><?php echo $question['choice3']?></li>
        <li><?php echo $question['choice4']?></li>
        </ol>
        Answer:<?php echo $question['answer']?>
        <?php }?>
    </body>
</html>