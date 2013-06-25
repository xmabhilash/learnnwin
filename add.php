<?php 
    include 'db.php';
    if (isset($_POST['add'])) {
        $db = new db();
        $db->addQuestion($_POST);
    }
?>
<html>
    <head>
        <title>Learn and win</title>
        
    </head>
    <body>
        <form action="" method="post">
            <h1>Add question</h1>
            <label>Question</label>
            <textarea name="question"></textarea>
            <br>
            <label>Choice A</label>
            <input name="choice1">
            <br>
            <label>Choice B</label>
            <input name="choice2">
            <br>
            <label>Choice C</label>
            <input name="choice3">
            <br>
            <label>Choice D</label>
            <input name="choice4">
            <br>
            <label>Answer</label>
            <input name="answer" placeholder="A/B/C/D">
            <br>
            <input type="submit" name="add"/>
        </form>
    </body>
</html>