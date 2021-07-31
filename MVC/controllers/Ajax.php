<?php 
class Ajax extends Controller{
      public $userModels ;  
      public $postModel; 
      public $messageModels;

      public function __construct(){
            $this->userModels = $this->model("userModels");
            $this->messageModels = $this->model("messageModels");
            $this->postModel = $this->model("postModels");
      }

      public function checkUsername(){
            $un = $_POST["un"];

            echo $a = $this->userModels->checkUsername($un);
      }
      public function checkEmail(){
            $e = $_POST["email"];
            echo $a = $this->userModels->checkEmail($e);
      }
      public function sendMessage(){
            $id = \Ramsey\Uuid\Uuid::uuid4();
            $message = $_POST["message"];
            $user_id = Login::isLoggedIn();
            $receiver = $_POST["receiver"];
            $a = $this->messageModels->insert_message($id,$user_id,$receiver,$message); 
            echo $result ="<div class=\"body__chatBox-msgArea-item sent\">".$message. " </div>";

      }
      public function updateMessage(){
            $receiver = $_POST["receiver"]; 
            $result = $this->messageModels->get_message($receiver);
            echo $result; 
      }
      public function getCookies(){
            $cookieName = $_POST["cookieName"]; 
            echo json_encode($_COOKIE[$cookieName]); 
      }

      public function searchFriends(){
             // Gán hàm addslashes để chống sql injection 
            $name = addslashes($_POST["search_friend"]);
            if (empty($name)){
                  echo "You have to type your friend's name.";
            }
            else{
                  $query = "select * from users where username like '%$name%'";
                  $result = DB::query($query); 
                  $num = count($result); 
                  if ($num > 0 && $name != "") 
                {
                    foreach ($result as $row){
                        echo "<li>
                        <a href=\"#\" class=\"friend__box-item\">
                          <img
                            class=\"friend__box-item-image\"
                            src=\"https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg\"
                          />
                          <span class=\"menu-item-text text-hide friend__box-item-text\"
                            >".$row['username']."
                            <ion-icon
                              name=\"close-circle-outline\"
                              class=\"friend__box-item-icon\"
                            ></ion-icon>
                          </span>
                        </a>
                      </li>"; 
                    }
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }

            }
      }
      
      
}
?>