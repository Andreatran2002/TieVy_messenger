<?php
class messageModels extends DB
{
      public function userModel()
      {
      }
      public function insert_message($id, $sender, $receiver, $message)
      {
            $this->query('INSERT INTO messages VALUES (:id,:sender,:receiver,:message, NOW()) ', array(':id' => $id, ':sender' => $sender, ':receiver' => $receiver, ':message' => htmlspecialchars($message)));
            $result = false;
            if ($this->query('SELECT * FROM messages WHERE id = :id', array(':id' => $id))) {
                  $result = true;
            }
            return json_encode($result);
      }

      public function get_message( $receiver)
      {
            $sender = Login::isLoggedIn(); 
            $result = $this->query("SELECT * FROM messages WHERE
            (user_id=:user AND receiver_id=:receiver) OR 
            (user_id=:receiver AND receiver_id=:user)
            ORDER BY time ", array(':receiver' => $receiver, ':user' => $sender));

            foreach ($result as $r) {
                  echo $r['user_id'];
                  echo "\\";
                  echo htmlspecialchars($r['message']);
                  echo "\n";
            }
      }

      public function getCloseMessage() {
            $userid = Login::isLoggedIn();
            $result =  $this->query("SELECT * FROM messages 
            WHERE user_id =:userid 
            ORDER BY time DESC LIMIT 1",array(':userid'=>$userid))[0];
            return $result['receiver_id'];
      }
}