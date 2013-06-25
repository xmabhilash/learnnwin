<?php 
    class db {
        private $db;
        public function __construct() {
            $this->db = MYSQL_CONNECT ('localhost', 'root', '') or DIE ("Unable to connect to Database Server");
            
            MYSQL_SELECT_DB ('learnnwin', $this->db) or DIE ("Could not select database");
        }
        public function getLastQuestion()
        {
            $sql = 'select * from question where is_active = 1 order by id desc limit 1';
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            return $row;
        }
        public function addQuestion($post) 
        {
            $sql = 'insert into question(question,choice1, choice2, choice3,choice4, answer) values ("'.$post['question'].'", "'.$post['choice1'].'", "'.$post['choice2'].'","'.$post['choice3'].'", "'.$post['choice4'].'", "'.$post['answer'].'")';
             mysql_query($sql, $this->db);  
        }
        public function getAllQuestion() 
        {
            $sql = 'select * from question where is_active = 1 order by id desc';
            $result = mysql_query($sql, $this->db);
            $return = array();
            while ($row = mysql_fetch_array($result)) {
                $return[] = $row;
            }
            return $return;
        }
        public function getAnswerById($id)
        {
            $sql = 'select answer from question where is_active = 1 and id = '.$id;
            $result = mysql_query($sql, $this->db);
            $row = mysql_fetch_array($result);
            return $row['answer'];
        }
    }
?>