<?php
    session_start();
    class db {
        private $db;
        public function __construct() {
            $this->db = MYSQL_CONNECT ('localhost', 'root', '') or DIE ("Unable to connect to Database Server");
            
            MYSQL_SELECT_DB ('learnnwin', $this->db) or DIE ("Could not select database");
        }
        public function getLastQuestion()
        {
            $sql = 'select * from question where isActive = 1 order by id desc limit 1';
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            return $row;
        }
        public function addQuestion($post) 
        {
            $sql = 'insert into question(question,choice1, choice2, choice3,choice4, answer, userId) values ("'.$post['question'].'", "'.$post['choice1'].'", "'.$post['choice2'].'","'.$post['choice3'].'", "'.$post['choice4'].'", "'.$post['answer'].'", "'.$_SESSION['userId'].'")';
            mysql_query($sql, $this->db);
        }
        public function getAllQuestion() 
        {
            $sql = 'select * from question where isActive = 1 order by id desc';
            $result = mysql_query($sql, $this->db);
            $return = array();
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
            return $return;
        }
        public function getAnswerById($id)
        {
            $sql = 'select answer from question where isActive = 1 and id = '.$id;
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            return $row['answer'];
        }
        public function addUser($post)
        {
            $sql = 'insert into user(email,password, firstName, lastName) values ("'.$post['email'].'", "'.md5($post['password']).'", "'.$post['firstName'].'","'.$post['lastName'].'")';
            mysql_query($sql, $this->db);
        }
        public function loginUser($post)
        {
            $sql = 'select * from user where isActive = 1 and email = "'.$post['email'].'" and password = "'.md5($post['password']).'" ';
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            if ($row) {
                $_SESSION['isLogin'] = true;
                $_SESSION['email']   = $row['email'];
                $_SESSION['userId']   = $row['id'];
                $_SESSION['firstName']   = $row['firstName'];
                $_SESSION['lastName']   = $row['lastName'];
                $_SESSION['score']   = $row['score'];
            }
        }
        public function logoutUser()
        {
            $_SESSION['isLogin'] = false;
            session_destroy();
        }
        public function getUserQuestionMap($userId, $questionId) {
            $sql = 'select * from userQuestionMap where userId = '.$userId.' and questionId = '.$questionId;
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            if ($row) {
                return true;
            }
            return false;
        }
        public function insertUserQuestionMap($userId, $questionId, $status)
        {
            $sql = 'insert into userQuestionMap(userId, questionId, `status`) values ("'.$userId.'", "'.$questionId.'", "'.$status.'")';
            mysql_query($sql, $this->db);
        }
        public function updateScore($userId)
        {
            $sql = "UPDATE user SET score = score + 1 WHERE id = '".$userId."'";
            mysql_query($sql);
        }
        public function getUserById($userId)
        {
            $sql = 'select * from user where id = '.$userId.' and isActive = 1';
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            return $row;
        }

        public function addGroup($post)
        {
            $sql = 'insert into `group`(`name`,`time`, userId) values ("'.$post['name'].'", "'.$post['time'].'", "'.$_SESSION['userId'].'")';
            mysql_query($sql, $this->db);
            return mysql_insert_id();
        }
        public function addUserGroupMap($userId, $groupId)
        {
            $sql = 'insert into userGroupMap(userId,groupId) values ("'.$userId.'", "'.$groupId.'")';
            mysql_query($sql, $this->db);
        }

        public function getToppers()
        {
            $sql = 'select * from user where isActive = 1 and score != 0 order by score desc limit 10';
            $result = mysql_query($sql, $this->db);
            $return = array();
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
            return $return;
        }
        public function getUserAnswers($type)
        {
            $sql = "select (CASE
                when answer = 'A' then choice1
                when answer = 'B' then choice2
                when answer = 'C' then choice3
                when answer = 'D' then choice4
                end )
                as result,question
                from question
                left join userQuestionMap on(question.id = userQuestionMap.questionId)
                where userQuestionMap.userId = 1 and userQuestionMap.status = '".$type."'";
            $result = mysql_query($sql, $this->db);
            $return = array();
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
            return $return;
        }
        public function getUserquestions($userId)
        {
            $sql = "select (CASE
                when answer = 'A' then choice1
                when answer = 'B' then choice2
                when answer = 'C' then choice3
                when answer = 'D' then choice4
                end )
                as result,question
                from question
                where userId = ".$userId." and isActive = 1";
            $result = mysql_query($sql, $this->db);
            $return = array();
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
            return $return;
        }
    }