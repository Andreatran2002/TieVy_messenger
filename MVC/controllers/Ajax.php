<?php
class Ajax extends Controller
{
      public $userModels;
      public $postModel;
      public $messageModels;

      public function __construct()
      {
            $this->userModels = $this->model("userModels");
            $this->messageModels = $this->model("messageModels");
            $this->postModel = $this->model("postModels");
      }

      public function checkUsername()
      {
            $un = $_POST["un"];

            echo $a = $this->userModels->checkUsername($un);
      }
      public function checkEmail()
      {
            $e = $_POST["email"];
            echo $a = $this->userModels->checkEmail($e);
      }
      public function sendMessage()
      {
            $id = \Ramsey\Uuid\Uuid::uuid4();
            $message = $_POST["message"];
            $user_id = Login::isLoggedIn();
            $receiver = $_POST["receiver"];
            $a = $this->messageModels->insert_message($id, $user_id, $receiver, $message);
            echo $result = "<div class=\"body__chatBox-msgArea-item sent\">" . $message . " </div>";
      }
      public function updateMessage()
      {
            $receiver = $_POST["receiver"];
            $result = $this->messageModels->get_message($receiver);
            echo $result;
      }
      public function getCookies()
      {
            $cookieName = $_POST["cookieName"];
            echo json_encode($_COOKIE[$cookieName]);
      }

      public function searchFriends()
      {
            // Gán hàm addslashes để chống sql injection 
            $name = addslashes($_POST["search_friend"]);
            if (empty($name)) {
                  echo "You have to type your friend's name.";
            } else {
                  $query = "SELECT * FROM users WHERE username LIKE '%$name%'";
                  $result = DB::query($query);
                  $num = count($result);
                  if ($num > 0 && $name != "") {
                        foreach ($result as $row) {
                              echo "<li>
                        <a href=\"#\" class=\"friend__box-item\">
                          <img
                            class=\"friend__box-item-image\"
                            src=\"https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg\"
                          />
                          <span class=\"menu-item-text friend__box-item-text\"  
                            >" . $row['username'];
                              if (!DB::query('SELECT * FROM followers WHERE user_id = :friendid', array(':friendid' => $row['id']))) {
                                    echo "<ion-icon id=\"" . $row['id'] . "\" onclick=\"addFriend('" . $row['id'] . "')\"
                              name=\"close-circle-outline\"
                              class=\"friend__box-item-icon\"
                            ></ion-icon>";
                              }
                              echo "
                          </span>
                        </a>
                      </li>";
                        }
                  } else {
                        echo "Khong tim thay ket qua!";
                  }
            }
      }
      public function updatePosts()
      {
            echo '<li class="post">
            <div class="post__header">
              <img src="https://i.pinimg.com/564x/7b/ee/c5/7beec5a45c69696b4902a46a4d33eeed.jpg" alt="" class="post__header-avatar">
              <a href="#" class="post__header-name">Peter Packer</a>
              <ion-icon name="reorder-two"></ion-icon>
            </div>
            <div class="post__body status">
            
            <form  class="post__body status" action="./Home/upNewPost"method="post" enctype="multipart/form-data">
            <textarea  class="status__input" name="postbody" rows="6"placeholder="New status for a new day !!!"></textarea>
            <input class="status__upImage" type="file" name="postimg"/>
            <label for="post" class="status__post">
              <button type="submit" name="post" value="">
              <ion-icon  name="send" class="status__post-btn"></ion-icon>
            </label>
        </form>
            </div>
            <div class="post__footer">
            </div>
          </li>';



            $result = DB::query("SELECT * FROM posts WHERE user_id = :user_id ORDER BY time DESC LIMIT 30" , array(':user_id'=>Login::isLoggedIn()));
            foreach ($result as $row) {
                  $user = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $row['user_id']))[0];
                  echo '<li class="post">
                  <div class="post__header">
                    <img src="'.$user['profileimg'].'" alt="" class="post__header-avatar">
                    <a href="#" class="post__header-name">' . $user['username'] . '</a>
                    <p  class="post__header-time">2 minutes ago</p>

                    <ion-icon name="reorder-two"></ion-icon>
                  </div>
                  <div class="post__body">
                    <p class="post__body-text">' . $row['postbody'] . '</p>';
                  if ($row['postimg'] != NULL){
                    echo '<img class="post__body-image" src="' . $row['postimg'] .'">'; 
                  }
                  
                    echo'</div>
                  <div class="post__footer">
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
                    <div class="cmtField">
                      <ul class="cmtContainer">
                        <li class="cmtContainer__item">
                          <div class="cmtContainer__item-header">
                            <img src="https://i.pinimg.com/564x/57/fc/b6/57fcb656c72c31e7c9a17199fed8daf5.jpg" alt="" class="cmtContainer__item-header-avatar">
                            <a href="#" class="cmtContainer__item-header-name">Miles Morales</a>
                          </div>
                          <div class="cmtContainer__item-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam est molestias fugit.</p>
                          </div>
                        </li>
                        <li class="cmtContainer__item">
                          <div class="cmtContainer__item-header">
                            <img src="https://i.pinimg.com/564x/b0/5c/a4/b05ca4dc3b1cad8946609202036e2b97.jpg" alt="" class="cmtContainer__item-header-avatar">
                            <a href="#" class="cmtContainer__item-header-name">Miles Morales</a>
                          </div>
                          <div class="cmtContainer__item-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam est molestias fugit.</p>
                          </div>
                        </li>
                      </ul>
                      <div class="cmtInput">
                        <textarea placeholder="Comment ở đây nè con đĩ" name="postbody" rows="3" cols="80" class="cmtInput__input"></textarea>
                          <ion-icon class="cmtInput__btn" name="send"></ion-icon>
                      </div>
                  </div>
                </li>';
              }
              echo '        <li class="timeNew__btn-add-post">
              <ion-icon name="add-circle-outline"></ion-icon>
            </li>
            <li class="timeNew__btn-see-more">
              <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
            </li>';
      }
      public function addFriend()
      {
        $userid =  $_POST['friend_id'];
        $id = \Ramsey\Uuid\Uuid::uuid4();
            $followerid = Login::isLoggedIn();
            if (DB::query("SELECT * FROM followers WHERE user_id = :userid", array(':userid' => $userid))) {
                  echo json_encode(true);
            } else {
                  DB::query('INSERT INTO followers VALUES(:id,:userid,:followerid)', array('id' => $id, 'userid' => $userid, 'followerid' => $followerid));
            }
      }
      public function showFriends()
      {
            $userid = Login::isLoggedIn();
            $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid", array(':userid' => $userid));

            foreach ($result as $row) {
                  $name = DB::query("SELECT * FROM users WHERE id = :follower_id", array(':follower_id' => $row['user_id']))[0];
                  echo "<div class=\"friendlist-item\">
                  <img
                    src=\"".$name['profileimg']."\"
                    class=\"friendlist-item-image\"
                  />
                  <a
                    href=\"https://www.facebook.com/sherman.pham.75?__tn__=-UC*F\"
                    class=\"friendlist-item-name\"
                    >" . $name['username'] . "</a
                  >
                </div>";
            }
      }
}