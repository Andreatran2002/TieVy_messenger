<?php

class Account extends Controller
{
      public $userModel;

      public function SayHi()
      {

            $this->view("login_logout", []);
      }
      public function __construct()
      {
            
            $this->userModel = $this->model("userModels");
      }


      public function CreateAccount()
      {
            if (isset($_POST['createAccount'])) {
                  $id = \Ramsey\Uuid\Uuid::uuid4();
                  $username = $_POST['username'];
                  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                  $email = $_POST['email'];
                  $result = false;
                  if ($this->userModel->checkEmail($email) == "true" && $this->userModel->checkPassword($password == "true") && $this->userModel->checkUsernameValid($username) == "true") {
                        $result = $this->userModel->insert_user($id, $username, $password, $email);
                        header("Location: http://localhost:8080/simple-messenger/Account");
                        if ($result) { echo "<script>alert('You have successfully created a new user.');</script>"; }
                  }
                  else{
                        header("Location: http://localhost:8080/simple-messenger/Account?a=success_account");
                  }
            }
      }

      public function Login_user()
      {
            
            if (Login::isLoggedIn()){
                  header("Location: http://localhost:8080/simple-messenger/Home");
            }
            else{
            if (isset($_POST ['login'])) {
                  
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $result = false;
                  if (DB::query('SELECT username FROM users WHERE username=:username', array(':username' => $username))) {

                        if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username' => $username))[0]['password'])) {
                              $id = \Ramsey\Uuid\Uuid::uuid4();
                              $cstrong = True;
                              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                              $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username' => $username))[0]['id'];
                              $result = $this->userModel->login_user($id, $token, $user_id);
                              //H??m sha1() trong php c?? t??c d???ng chuy???n m???t chu???i sang m???t chu???i m???i ???? ???????c m?? h??a theo ti??u chu???n sha1

                              setcookie("messageUser", $user_id, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                              setcookie("SNID", $token, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                              header("Location: http://localhost:8080/simple-messenger/Home");
                        }
                  }
                  
                  
            }
           
      }
      }
      public function logout()
      {
            
             setcookie("messageUser", "", time() - 60 * 60 * 24 * 3,'/');
            setcookie("SNID", "", time() - 60 * 60 * 24 * 7,'/');
            setcookie("SNID_", "", time() - 60 * 60 * 24 * 3,'/'); 
            $r = $this->userModel->deleteLoginTokens();
            /*  echo $r;  */
      }
      public function setAvatar(){
            $userid = Login::isLoggedIn();
            if (isset($_POST['uploadprofileimg'])){
                  Image::uploadImage('profileimg','UPDATE users SET profileimg = :profileimg WHERE id = :userid',array(':userid'=>$userid));
              }
              header("Location: http://localhost:8080/simple-messenger/Home");
      }
}
