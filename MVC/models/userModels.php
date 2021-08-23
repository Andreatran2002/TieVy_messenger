<?php
class userModels extends DB
{
      public function userModel()
      {
      }
      public function insert_user($id, $username, $password, $email)
      {
            $profileimg = "./public/images/default_avatar.jpg"; 
            $this->query('INSERT INTO users VALUES (:id,:username,:email,:password,:profileimg, \'\', \'\', \'\', \'\', \'\' ) ', array(':id' => $id, ':username' => $username, ':email' => $email, ':password' => $password , ':profileimg' => $profileimg));
            $result = false;
            if ($this->query('SELECT * FROM users WHERE id = :id', array(':id' => $id))) {
                  $result = true;
            }
            return json_encode($result);
      }

      public function login_user($id, $token, $user_id)
      {
            $this->query('INSERT INTO login_tokens VALUES(:id, :token , :user_id)', array(':id' => $id, ':token' => sha1($token), ':user_id' => $user_id));
            $result = false;
            if ($this->query('SELECT * FROM login_tokens WHERE id = :id', array(':id' => $id))) {
                  $result = true;
            }
            return json_encode($result);
      }

      public function checkUsername($un)
      {
            $result = false;
            if ($this->query('SELECT * FROM users WHERE username = :username', array(':username' => $un))) {
                  $result = true;
            }
            return json_encode($result);
      }
      public function checkEmail($email)
      {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  if (!$this->query('SELECT email FROM users WHERE email = :email', array(':email' => $email))) {
                        $result = true;
                  } else {
                        $result = "Email in use";
                  }
            } else {
                  $result = 'Invalid email!';
            }
            return json_encode($result);
      }
      public function checkPassword($password)
      {
            $result = true;
            if (strlen($password) >= 6 && strlen($password) <= 60) {
                  $result = "Invalid password";
            }
            return json_encode($result);
      }
      public function checkUsernameValid ($username)
      {

            if (!$this->query('SELECT username FROM users WHERE username =:username; ', array(':username' => $username))) {
                  if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) { // preg_match : dung de so sanh chuoi reular expression voi mot chuoi 
                              $result = true;
                        } else {
                              $result = 'Invalid username';
                        }
                  } else {
                        $result = 'Invalid username';
                  }
            } else {
                  $result = 'User already exits';
            }
            return json_encode($result);
      }
      public function getAllUsers() {
            $result = $this->query('SELECT * FROM users '); 
            return $result;
      }
      public function deleteLoginTokens() {
            $user_id = Login::isLoggedIn();
            $this->query('DELETE FROM login_tokens WHERE user_id = :user_id',array(':user_id'=>$user_id));
            return true; 
      }
      public function getUser($id){
            $user = $this->query('SELECT * FROM users WHERE id =:id', array(':id'=>$id))[0];
            return ($user); 
      }
}
