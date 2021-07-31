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
                  $query = "SELECT * FROM users WHERE username LIKE '%$name%'";
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
                          <span class=\"menu-item-text friend__box-item-text\"
                            >".$row['username'];
                        echo "<ion-icon
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
      public function updatePosts() {
            $result = DB::query("SELECT * FROM posts"); 
            foreach ($result as $row) {
                  $username = DB::query("SELECT * FROM users WHERE id = :id", array(':id'=>$row['user_id']))[0]['username'];
                  echo '<li class="post">
                  <div class="post__header">
                    <img src="https://i.pinimg.com/236x/5b/74/8e/5b748ebcc29e8a713b64a0c85f6bedeb.jpg" alt="" class="post__header-avatar">
                    <a href="#" class="post__header-name">'.$username.'</a>
                    <ion-icon name="reorder-two"></ion-icon>
                  </div>
                  <div class="post__body">
                    <p class="post__body-text">'.$row['postbody'].'</p>'; 
                  echo '</div>
                  <div class="post__footer">
                    <form action="">
                      <button class="post__footer-btnLike btn">
                        <ion-icon name="heart"></ion-icon>
                      </button>
                      <button class="post__footer-btnDisLike btn"> 
                        <ion-icon name="heart-dislike"></ion-icon>
                      </button>
                      <button class="post__footer-btncmt">
                        <ion-icon name="chatbox-ellipses"></ion-icon>
                        Comment
                      </button>
                    </form>
                  </div>
                </li>'; 
            }
      }
      
      
}
?>