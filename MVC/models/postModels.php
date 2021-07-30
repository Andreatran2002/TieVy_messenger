<?php

class PostModels extends DB
{

      public function createPost($postbody, $userid)
      {

            if (strlen($postbody) > 500 || strlen($postbody) < 1) {
                  die('Incorrect length!');
            }
            $id = $id = \Ramsey\Uuid\Uuid::uuid4();
            $this->query('INSERT INTO posts VALUES (:id, :postbody, \'\', :userid, \'\', \'\',NOW())', array(':id' => $id, ':postbody' => $postbody, ':userid' => $userid));
      }
      public function createImgPost($postbody, $userid)
      {
            $id = \Ramsey\Uuid\Uuid::uuid4();
            if (strlen($postbody) > 500) {
                  die('Incorrect length!');
            }
            $this->query('INSERT INTO posts VALUES (:id, :postbody, \'\', :userid, \'\', \'\',NOW())', array(':id' => $id, ':postbody' => $postbody, ':userid' => $userid));
            $postid = $this->query('SELECT id FROM posts WHERE user_id=:userid ORDER BY ID DESC LIMIT 1;', array(':userid' => $userid))[0]['id'];
            return $postid;
           
      }
      public function allPosts(){
            $results = $this->query('SELECT * FROM posts ORDER BY time '); 
            return $results; 
      }
}
