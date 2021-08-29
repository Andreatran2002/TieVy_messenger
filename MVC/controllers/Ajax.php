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
    $options = array(
      'cluster' => 'ap1',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      '6d26d8d2ff0bf9b79d49',
      '690b7bb4be34ea3bd2f9',
      '1253694',
      $options
    );
    $data['request'] = "message";
    $data['message'] = $_POST['message'];
    $pusher->trigger('my-channel', 'my-event', $data);
    $id = \Ramsey\Uuid\Uuid::uuid4();
    $message = $_POST["message"];
    $user_id = Login::isLoggedIn();
    $receiver = $_POST["receiver"];
   
    $a = $this->messageModels->insert_message($id, $user_id, $receiver, $message);
    echo  "<div class=\"body__chatBox-msgArea-item sent\">" . $message . " </div>";
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
                            src=\"".$row['profileimg'] ."\"
                          />
                          <span class=\"menu-item-text friend__box-item-text\"  
                            >" . $row['username'];
          if (!DB::query('SELECT * FROM followers WHERE user_id = :friendid AND follower_id = :userid', array(':friendid' => $row['id'], ':userid' => Login::isLoggedIn()))) {
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
    $userid = Login::isLoggedIn();
    $user =  $this->userModels->getUser($userid);
    echo '<li class="post">
            <div class="post__header">
              <img src="' . $user['profileimg'] . '" alt="" class="post__header-avatar">
              <a href="#" class="post__header-name">' . $user['username'] . '</a>
              <ion-icon name="reorder-two"></ion-icon>
            </div>
            <div class="post__body status">
            
            <form  class="post__body status" action="./Home/upNewPost"method="post" enctype="multipart/form-data">
            <textarea  class="status__input" name="postbody" rows="6"placeholder="New status for a new day !!!"></textarea>
            <label class="label-upload" for="input-image">Upload image</label>
            <input id="input-image" type="file" name="postimg" accept="image/*" class="input-image" onchange="loadFile(event)">
            <img src="" id="output"/>
            <label for="post" class="status__post">
              <button type="submit" name="post" value="">
              <ion-icon  name="send" class="status__post-btn"></ion-icon>
            </label>
        </form>
            </div>
            <div class="post__footer">
            </div>
          </li>';



    $result = DB::query("SELECT * FROM posts WHERE user_id = :user_id ORDER BY time DESC LIMIT 30", array(':user_id' => Login::isLoggedIn()));
    foreach ($result as $row) {
      $user = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $row['user_id']))[0];
      echo '<li class="post">
                  <div class="post__header">
                    <img src="' . $user['profileimg'] . '" alt="" class="post__header-avatar">
                    <a href="#" class="post__header-name">' . $user['username'] . '</a>
                    <p  class="post__header-time">2 minutes ago</p>
                    <ion-icon  name="reorder-two" class="post__header-btn" onclick="turnOnOptionPost(event)">
              </ion-icon>
              <ul class="post__option">
                <li class="post__option-item">Truy cập trang cá nhân</li>
                <li class="post__option-item">Ẩn bài viết</li>
                <li class="post__option-item">Ẩn bài viết từ người này</li>
                <li class="post__option-item">Báo cáo bài viết</li>
              </ul>
                  </div>
                  <div class="post__body">
                    <p class="post__body-text">' . $row['postbody'] . '</p>';
      if ($row['postimg'] != NULL) {
        echo '<img class="post__body-image" src="' . $row['postimg'] . '">';
      }

      echo '</div>
      <div  class="post__footer">
      <button  class="post__footer-btnLike btn" onclick="like(event)">
        <ion-icon  name="heart"></ion-icon>
      </button>
      <button  class="post__footer-btnDisLike btn" onclick="like(event)">
        <ion-icon  name="heart-dislike"></ion-icon>
      </button>
      <button  class="post__footer-btncmt" onclick="openCmtField(event)">
        <ion-icon  name="chatbox-ellipses"></ion-icon>
        Comment
      </button>
      <div  class="cmtField" id ="cmtField">
        <ul  class="cmtContainer">';
        $comments = DB::query("SELECT * FROM comments WHERE post_id =:postid",array(":postid"=>$row['id']));
        foreach($comments as $c){
          $commentator = DB::query("SELECT * FROM users WHERE id = :id", array(':id'=>$c['commentator_id']))[0];
          echo ' <li  class="cmtContainer__item">
          <div  class="cmtContainer__item-header">
            <img src="'.$commentator['profileimg'].'"alt="" class="
    cmtContainer__item-header-avatar">
            <a href="#" class="cmtContainer__item-header-name">'.$commentator['username'].'</a>
          </div>
          <div  class="cmtContainer__item-body">
            <p>'.$c['commentBody'].'</p>
          </div>
        </li>';
        }
        echo '
        </ul>
        <div  class="cmtInput">
          <input  id="commentInput_input" placeholder="Comment here..." name="postbody"rows="3"cols="
      80" class="cmtInput__input"></input>
          <ion-icon  class="cmtInput__btn" onclick="';
          echo "addComment('".$row['id']."'); \" name=\"send\"></ion-icon>";
          echo'
        </div>
      </div>
    </div>
                </li>';
    }
    echo '         <li onclick="btnNewPost()" class="timeNew__btn-add-post">
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
    if (DB::query("SELECT * FROM followers WHERE user_id = :userid AND follower_id =:follower_id", array(':userid' => $userid , ':follower_id' => $followerid))) {
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
                    src=\"" . $name['profileimg'] . "\"
                    class=\"friendlist-item-image\"
                  />
                  <p
                    href=\"./chat\"
                    class=\"friendlist-item-name\"
                    >" . $name['username'] . "</p
                  >
                  <div class=\"btn-container\">
            <button class=\"btn-mess\"><ion-icon name=\"chatbox-ellipses-outline\"></ion-icon>Chat</button>
            <button class=\"btn-info\"><ion-icon name=\"person-outline\"></ion-icon>User</button>
          </div>
                </div>";
    }
  }

  public function getUser()
  {
    if (isset($id)){
      $closeUserId = $id;
      
    }
    else{
    $closeUserId =  $this->messageModels->getCloseMessage();
  }
  $user = $this->userModels->getUser($closeUserId);
    echo '
        <img src="' . $user['profileimg'] . '" alt="" id="current-friend" class="body__chatBox-header-image" />
        <a href="#" class="body__chatBox-header-name" id="current-friend-name">' . $user['username'] . '</a>
        <ion-icon name="information-outline" class="body__chatBox-header-help"></ion-icon>
        ///' . $closeUserId;
  }
  public function addComment(){
    
      $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        '6d26d8d2ff0bf9b79d49',
        '690b7bb4be34ea3bd2f9',
        '1253694',
        $options
      );
      $data['request'] = "comment";
      $data['comment'] = $_POST['comment'];
      $data['postid'] = $_POST['postid']; 
      $pusher->trigger('my-channel', 'my-event', $data);
      $id = \Ramsey\Uuid\Uuid::uuid4();
      $comment = $_POST["comment"];
      $user_id = Login::isLoggedIn();
      $postid = $_POST['postid']; 
      DB::query("INSERT INTO comments VALUES(:id,:commentBody,:postid,:commentator_id, 0, 0,NOW())",array(':id'=>$id,':commentBody'=>$comment,':postid'=>$postid, ':commentator_id'=>$user_id)); 
      
    }
    public function updateComment()
    {
      echo '
        <ul  class="cmtContainer">';
      $postid = $_POST["postid"];
      $result = DB::query("SELECT * FROM comments WHERE post_id = :postid",array(':postid'=>$postid));
      foreach ($result as $row){
        $commentator = DB::query("SELECT * FROM users WHERE id = :id", array(':id'=>$row['commentator_id']))[0];
        echo '
        <li  class="cmtContainer__item">
        <div  class="cmtContainer__item-header">
          <img src="'.$commentator['profileimg'].'"alt="" class="
  cmtContainer__item-header-avatar">
          <a href="#" class="cmtContainer__item-header-name">'.$commentator['username'].'</a>
        </div>
        <div  class="cmtContainer__item-body">
          <p>'.$row['commentBody'].'</p>
        </div>
      </li>';
      }
      echo '
        </ul>
        <div  class="cmtInput">
          <input  id="commentInput_input" placeholder="Comment here..." name="postbody"rows="3"cols="
      80" class="cmtInput__input"></input>
          <ion-icon  class="cmtInput__btn" onclick="';
          echo "addComment('".$row['id']."'); \" name=\"send\"></ion-icon>";
        
    }
}
