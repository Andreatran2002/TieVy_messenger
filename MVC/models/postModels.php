<?php

class PostModels extends DB
{

      public function createPost($postbody, $userid)
      {

            if (strlen($postbody) > 500 || strlen($postbody) < 1) {
                  die('Incorrect length!');
            }
             $id = \Ramsey\Uuid\Uuid::uuid4();
            // add notify
            if (count(Notify::createNotify($postbody)) != 0) {
                  foreach (Notify::createNotify($postbody) as $key => $n) {
                        $s = Login::isLoggedIn();
                        $r = DB::query('SELECT id FROM users WHERE username=:username', array(':username' => $key))[0]['id'];
                       
                        if ($r != 0) {
                              DB::query('INSERT INTO notifications VALUES (:id, :type, :receiver, :sender, :extra,\'\')', array(':id'=>$id,':type' => $n["type"], ':receiver' => $r, ':sender' => $s, ':extra' => $n["extra"]));
                        }
                  }
            }
            $id = \Ramsey\Uuid\Uuid::uuid4();
            $this->query('INSERT INTO posts VALUES (:id, :postbody, \'\', :userid, \'\', \'\',NOW())', array(':id' => $id, ':postbody' => $postbody, ':userid' => $userid));
      }
      public function createImgPost($postbody, $userid)
      {
            $id = \Ramsey\Uuid\Uuid::uuid4();
            if (strlen($postbody) > 500) {
                  die('Incorrect length!');
            }
            // add notify
            if (count(Notify::createNotify($postbody)) != 0) {
                  foreach (Notify::createNotify($postbody) as $key => $n) {
                        $s = Login::isLoggedIn();
                        $r = DB::query('SELECT id FROM users WHERE username=:username', array(':username' => $key))[0]['id'];
                        if ($r != 0) {
                              DB::query('INSERT INTO notifications VALUES (:id, :type, :receiver, :sender, :extra,\'\')', array(':id' => $id,':type' => $n["type"], ':receiver' => $r, ':sender' => $s, ':extra' => $n["extra"]));
                        }
                  }
            }
            $id = \Ramsey\Uuid\Uuid::uuid4();
            $this->query('INSERT INTO posts VALUES (:id, :postbody, \'\', :userid, \'\', \'\',NOW())', array(':id' => $id, ':postbody' => $postbody, ':userid' => $userid));
            
            return $id;
      }
      public function allPosts()
      {
            $results = $this->query('SELECT * FROM posts ORDER BY time ');
            return $results;
      }
}
