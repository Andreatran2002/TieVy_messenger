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
    DB::query("UPDATE followers SET had_text = 1 WHERE follower_id = :userid AND user_id = :friend",array(':userid'=>$user_id, ':friend'=>$receiver)); 
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
                            src=\"" . $row['profileimg'] . "\"
                          />
                          <span class=\"menu-item-text friend__box-item-text\"  
                            >" . $row['username'];
          if (!DB::query('SELECT * FROM followers WHERE user_id = :friendid AND follower_id = :userid', array(':friendid' => $row['id'], ':userid' => Login::isLoggedIn()))) {
            echo "<ion-icon id=\"" . $row['id'] . "\" onclick=\"addFriend('" . $row['id'] . "'); addSuccess(event);\"
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
        echo '<h5 style="padding : 20px; " >Khong tim thay ket qua!</h5>';
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
            <textarea  style=" resize: none; width = 600px !important ; " class="status__input" name="postbody" rows="6"placeholder="New status for a new day !!!"></textarea>
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

    $result= DB::query('SELECT posts.time,posts.id, posts.postbody, posts.postimg, posts.likes, posts.dislikes,
    users.profileimg, users.username, posts.user_id FROM users, posts, followers
    WHERE posts.user_id = followers.user_id 
    AND users.id = posts.user_id
    AND follower_id = :userid
    ORDER BY posts.time DESC LIMIT 20;',array(':userid'=>$userid));
    
    // $result = DB::query("SELECT * FROM posts WHERE user_id = :user_id  ORDER BY time DESC LIMIT 30", array(':user_id' => Login::isLoggedIn()));
    foreach ($result as $row) {
      $user = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $row['user_id']))[0];
      //$date = new DateTime();
     // $date2 = new DateTime($row['timestamp']); 
      //$date->setTimeZone(new DateTimeZone("Asia/Ho_Chi_Minh"));
      //$time = date_diff($date, $date2);
      echo '<li class="post">
                  <div class="post__header">
                    <img src="' . $user['profileimg'] . '" alt="" class="post__header-avatar">
                    <a href="#" class="post__header-name">' . $user['username'] . '</a>
                    <p  class="post__header-time"></p>
                    <ion-icon  name="reorder-two" class="post__header-btn" onclick="turnOnOptionPost(event)">
              </ion-icon>
              <ul class="post__option">
                <a href="./home&f='.$user['id'].'"><li class="post__option-item">Truy cập trang cá nhân</li></a>
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
      <button  class="post__footer-btnLike btn" '; 
      if (DB::query("SELECT * FROM likes WHERE user_id = :userid 
      AND post_id = :postid AND is_like = 1 " , array(':userid'=> Login::isLoggedIn(), ':postid'=>$row['id'])))
      echo 'style="color : white" '; 
      echo 'onclick="like(event); updateLike(\''.$row['id'].'\',\'like\');">
        <ion-icon  name="heart"></ion-icon>
      </button>
      <button  class="post__footer-btnDisLike btn" onclick="like(event) ; updateLike(\''.$row['id'].'\',\'dislike\'); ">
        <ion-icon  name="heart-dislike"';
        if (DB::query("SELECT * FROM likes WHERE user_id = :userid 
        AND post_id = :postid AND is_like = 1 " , array(':userid'=> Login::isLoggedIn(), ':postid'=>$row['id'])))
        echo 'style="color : white" '; 
        echo '></ion-icon>
      </button>
      <button  class="post__footer-btncmt" onclick="openCmtField(event)">
        <ion-icon  name="chatbox-ellipses"></ion-icon>
        Comment
      </button>
      <div  class="cmtField" id ="cmtField">
        <ul  class="cmtContainer" id = "cmtContainer_'.$row['id'].'">';
      $comments = DB::query("SELECT * FROM comments WHERE post_id =:postid ORDER BY timestamp DESC ", array(":postid" => $row['id']));
      foreach ($comments as $c) {
        $commentator = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $c['commentator_id']))[0];
        echo ' <li  class="cmtContainer__item">
          <div  class="cmtContainer__item-header">
            <img src="' . $commentator['profileimg'] . '"alt="" class="
    cmtContainer__item-header-avatar">
            <a href="#" class="cmtContainer__item-header-name">' . $commentator['username'] . '</a>
          </div>
          <div  class="cmtContainer__item-body">
            <p>' . $c['commentBody'] . '</p>
          </div>
        </li>';
      }
      echo '
        </ul>
        <div  class="cmtInput">
          <input  id="commentInput_input_' . $row['id'] . '" placeholder="Comment here..." name="postbody"rows="3"cols="
      80" class="cmtInput__input"></input>
          <ion-icon  class="cmtInput__btn" onclick="';
      echo "addComment('" . $row['id'] . "','commentInput_input_" . $row['id'] . "'); \" name=\"send\"></ion-icon>";
      echo '
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
    if (DB::query("SELECT * FROM followers WHERE user_id = :userid AND follower_id =:follower_id", array(':userid' => $userid, ':follower_id' => $followerid))) {
      echo json_encode(true);
    } else {
      DB::query('INSERT INTO followers VALUES(:id,:userid,:followerid,\'\')', array('id' => $id, 'userid' => $userid, 'followerid' => $followerid));
    }
  }
  public function showFriends()
  {
    $userid = Login::isLoggedIn();
    if (DB::query("SELECT * FROM followers WHERE follower_id = :userid", array(':userid' => $userid))) {
      $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid", array(':userid' => $userid));
      foreach ($result as $row) {
        if (DB::query("SELECT * FROM users WHERE id = :follower_id", array(':follower_id' => $row['user_id']))[0]) {
          $name = DB::query("SELECT * FROM users WHERE id = :follower_id", array(':follower_id' => $row['user_id']))[0];
          echo "<div class=\"friendlist-item\">
                  <img
                    src=\"" . $name['profileimg'] . "\"
                    class=\"friendlist-item-image\"
                  />
                  <p class=\"friendlist-item-name\">" . $name['username'] . "</p
                  >
                  <div class=\"btn-container\">
            <a href=\"./chat&w=" . $name['id'] . "\"><button class=\"btn-mess\"><ion-icon name=\"chatbox-ellipses-outline\"></ion-icon>Chat</button></a>
            <a href=\"./home&f=" . $name['id'] ."\"><button onclick=\"seeProfile('" . $name['id'] . "');\" class=\"btn-info\"><ion-icon name=\"person-outline\"></ion-icon>User</button></a>
          </div>
                </div>";
        }
      }
    }
  }

  public function getUser()
  {
    if (isset($_GET['w'])){
      if (DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $_GET['w']))){
        $closeUserId = $_GET['w'];
      }
      else $closeUserId =  $this->messageModels->getCloseMessage(); 
    }
    else  $closeUserId =  $this->messageModels->getCloseMessage();
    if (!isset($closeUserId)) {
      $closeUserId = DB::query("SELECT * FROM followers WHERE follower_id = :userid", array(':userid' => $_COOKIE['messageUser']))[0];
    }
    $user = $this->userModels->getUser($closeUserId);
    if ($user != "false") {
      echo '
        <img src="' . $user['profileimg'] . '" alt="" id="current-friend" class="body__chatBox-header-image" />
        <a href="#" class="body__chatBox-header-name" id="current-friend-name">' . $user['username'] . '</a>
        <ion-icon name="information-outline" class="body__chatBox-header-help" onclick="cbOption(event)" ></ion-icon>
        ///' . $closeUserId ;
        // echo '
        // <div id="option-chatbox" class="body__chatBox-options">
        //     <img src="'.$user['profileimg'];
        //       echo '" alt="" id="option-avatar">
        //     <a href="#" class="option-item option-user" id="option-item-name">"'.$user['username'];
        //     echo '</a>
        //     <a href="#" class="option-item" onclick="removeConversation(); ">
        //           <ion-icon name="trash-outline"></ion-icon>
        //           <p>Remove this conversations</p>
        //     </a>
        //     <a href="#" class="option-item">
        //           <ion-icon name="ban-outline"></ion-icon>
        //           <p>Block this user</p>
        //     </a>
        //     <a href="#" class="option-item">
        //           <ion-icon name="person-outline"></ion-icon>
        //           <p>Visit profile</p>
        //     </a>
        //     <a href="#" class="option-item">
        //           <ion-icon name="arrow-undo-outline"></ion-icon>
        //           <p>Share Users URL</p>
        //     </a>
        //     <a href="#" class="option-item">
        //           <ion-icon name="alert-outline"></ion-icon>
        //           <p>Send a report</p>
        //     </a>
        // ';
    } else return json_encode(false);
  }
  public function addComment()
  {
    $id = \Ramsey\Uuid\Uuid::uuid4();
    $comment = $_POST["comment"];
    $user_id = Login::isLoggedIn();
    $postid = $_POST['postid'];   
    DB::query("INSERT INTO comments VALUES(:id,:commentBody,:postid,:commentator_id, 0, 0,NOW())", array(':id' => $id, ':commentBody' => $comment, ':postid' => $postid, ':commentator_id' => $user_id));
    $result = DB::query("SELECT * FROM comments WHERE post_id = :postid  ORDER BY timestamp DESC ", array(':postid' => $postid));
    foreach ($result as $row) {
      $commentator = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $row['commentator_id']))[0];
      echo '
        <li  class="cmtContainer__item">
        <div  class="cmtContainer__item-header">
          <img src="' . $commentator['profileimg'] . '"alt="" class="
  cmtContainer__item-header-avatar">
          <a href="#" class="cmtContainer__item-header-name">' . $commentator['username'] . '</a>
        </div>
        <div  class="cmtContainer__item-body">
          <p>' . $row['commentBody'] . '</p>
        </div>
      </li>';
    }

  }
  public function updateComment()
  {
    echo '
        <ul  class="cmtContainer">';
    $postid = $_POST["postid"];
    $result = DB::query("SELECT * FROM comments WHERE post_id = :postid ORDER BY timestamp DESC", array(':postid' => $postid));
    foreach ($result as $row) {
      $commentator = DB::query("SELECT * FROM users WHERE id = :id", array(':id' => $row['commentator_id']))[0];
      echo '
        <li  class="cmtContainer__item">
        <div  class="cmtContainer__item-header">
          <img src="' . $commentator['profileimg'] . '"alt="" class="
  cmtContainer__item-header-avatar">
          <a href="#" class="cmtContainer__item-header-name">' . $commentator['username'] . '</a>
        </div>
        <div  class="cmtContainer__item-body">
          <p>' . $row['commentBody'] . '</p>
        </div>
      </li>';
    }
    echo '
        </ul>
        <div  class="cmtInput">
          <input  id="commentInput_input" placeholder="Comment here..." name="postbody"rows="3"cols="
      80" class="cmtInput__input"></input>
          <ion-icon  class="cmtInput__btn" onclick="';
    echo "addComment('" . $row['id'] . "'); \" name=\"send\"></ion-icon>";
  }
  public function setMessageRead()
  {
    $sender_id = $_POST['sender'];
    DB::query("UPDATE messages SET is_read = 1 WHERE receiver_id = :userid AND user_id =:senderid", array(':senderid' => $sender_id, ':userid' => $_COOKIE['messageUser']));
    echo json_encode($sender_id);
  }
  public function search_friend_followed(){
    $userid = Login::isLoggedIn();
    $name = addslashes($_POST["keyword"]);
    if (empty($name)) {
      echo "false";
    } else {
      $query = "SELECT users.id, users.username, followers.user_id , followers.follower_id,
      users.profileimg
       FROM users,followers 
       WHERE users.username LIKE '%$name%'
       AND users.id = followers.user_id
       AND followers.follower_id = :userid
       ";
      $result = DB::query($query,array(':userid'=>$userid));
      $num = count($result);
      if ($num > 0 && $name != "") {
        foreach ($result as $row) {
          $message_not_read = count(DB::query("SELECT * FROM messages WHERE receiver_id =:id AND is_read = 0 AND user_id =:friendid",array(":id"=>$_COOKIE['messageUser'],':friendid'=>$row['id'])));

          echo "<div class=\"body__left-item\" id=\"".$row['id']."\" >
          <a href=\"./chat&f=".$row['id']."\">
                  <img src=\"".$row['profileimg']."\"
              alt=\"\"
              
              class=\"body__left-item-image\"
            />
            <a
              href=\"./home&f=".$row['id']."\"
              class=\"body__left-item-name\">".$row['username']."</a>";
            if ($message_not_read >0) echo "  <span class=\"body__left-item-label\">".$message_not_read."</span>";
            echo " </a></div>";
        }
      } else {
        echo '<h5 style="padding : 20px; " >You haven\'t followed this one</h5>';
      }
    }
  }
  public function showFriend_ChatView(){
    $userid = Login::isLoggedIn();
      
    $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid AND had_text = 1 ",array(':userid'=>$userid));
    // $result = DB::query("SELECT * DISTINCT receiver_id,user_id FROM messages WHERE receiver_id = :userid OR user_id = :userid",array(':userid'=>$userid));

    foreach($result as $s){
          $user_follow = DB::query("SELECT * FROM users WHERE id = :user_follow_id", array(":user_follow_id"=>$s['user_id']))[0];
          $message_not_read = count(DB::query("SELECT * FROM messages WHERE receiver_id =:id AND is_read = 0 AND user_id =:friendid",array(":id"=>$_COOKIE['messageUser'],':friendid'=>$user_follow['id'])));
          echo "<div class=\"body__left-item\" id=\"".$s['user_id']."\">
                <img src=\"".$user_follow['profileimg']."\"
            alt=\"\"
            
            class=\"body__left-item-image\"
          />
          <a
            href=\"#\"
            class=\"body__left-item-name\">".$user_follow['username']."</a>";
          if ($message_not_read >0) echo "  <span class=\"body__left-item-label\">".$message_not_read."</span>";
          echo " </div>"; 
          
          
    }
  }
  public function search_friend_followed_home(){
    $userid = Login::isLoggedIn();
    $name = addslashes($_POST["keyword"]);
    if (empty($name)) {
      echo "false";
    } else {
      $query = "SELECT users.id, users.username, followers.user_id , followers.follower_id,
      users.profileimg
       FROM users,followers 
       WHERE users.username LIKE '%$name%'
       AND users.id = followers.user_id
       AND followers.follower_id = :userid
       ";
      $result = DB::query($query,array(':userid'=>$userid));
      $num = count($result);
      if ($num > 0 && $name != "") {
        foreach ($result as $row) {
          echo "<div class=\"friendlist-item\">
          <img
            src=\"" . $row['profileimg'] . "\"
            class=\"friendlist-item-image\"
          />
          <p class=\"friendlist-item-name\">" . $row['username'] . "</p
          >
          <div class=\"btn-container\">
    <a href=\"./chat&w=" . $row['id'] . "\"><button class=\"btn-mess\"><ion-icon name=\"chatbox-ellipses-outline\"></ion-icon>Chat</button></a>
    <a href=\"./home&f=" . $row['id'] ."\"><button onclick=\"seeProfile('" . $row['id'] . "');\" class=\"btn-info\"><ion-icon name=\"person-outline\"></ion-icon>User</button></a>
  </div>
        </div>";
        }
      } else {
        echo '<h5 style="padding : 20px; " >You haven\'t followed this one</h5>';
      }
    }
  }
  public function showFriend_HomeView(){
    $userid = Login::isLoggedIn();
      
    $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid ",array(':userid'=>$userid));
    // $result = DB::query("SELECT * DISTINCT receiver_id,user_id FROM messages WHERE receiver_id = :userid OR user_id = :userid",array(':userid'=>$userid));

    foreach($result as $row){
          $user_follow = DB::query("SELECT * FROM users WHERE id = :user_follow_id", array(":user_follow_id"=>$row['user_id']))[0];
          echo "<div class=\"friendlist-item\">
          <img
            src=\"" . $user_follow['profileimg'] . "\"
            class=\"friendlist-item-image\"
          />
          <p class=\"friendlist-item-name\">" . $user_follow['username'] . "</p
          >
          <div class=\"btn-container\">
    <a href=\"./chat&w=" . $user_follow['id'] . "\"><button class=\"btn-mess\"><ion-icon name=\"chatbox-ellipses-outline\"></ion-icon>Chat</button></a>
    <a href=\"./home&f=" . $user_follow['id'] ."\"><button onclick=\"seeProfile('" . $user_follow['id'] . "');\" class=\"btn-info\"><ion-icon name=\"person-outline\"></ion-icon>User</button></a>
  </div>
        </div>"; 
          
          
    }
  }
  
  public function updateLike(){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $dislikes = DB::query('SELECT * FROM posts WHERE id = :id',array(':id'=>$id))[0]['dislikes'];  
    $likes = DB::query('SELECT * FROM posts WHERE id = :id',array(':id'=>$id))[0]['likes'];
    if ($status == "like"){
      if (DB::query("SELECT * FROM posts WHERE id = :id" , array(':id'=> $id)))
      {
         
        if (!DB::query("SELECT * FROM likes WHERE user_id = :userid AND post_id = :postid" , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id))){
          DB::query('UPDATE posts SET likes = :likes WHERE id = :id',array(':id'=>$id,':likes'=>$likes+1));
          DB::query('INSERT INTO likes VALUES (:id, :user_id, :post_id,1)', array(':id'=>\Ramsey\Uuid\Uuid::uuid4(), ':user_id'=>Login::isLoggedIn(),':post_id'=>$id)); 
        }
        else {
          if (DB::query("SELECT * FROM likes  WHERE user_id = :userid AND post_id = :postid AND is_like = 0 " , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id))){
            DB::query('UPDATE posts SET likes = :likes,dislikes = :dislikes WHERE id = :id',array(':id'=>$id,':likes'=>$likes+1 ,':dislikes'=>$dislikes-1));
            DB::query('UPDATE likes SET is_like = 1 WHERE user_id = :id AND post_id = :postid',array(':postid'=>$id,':id'=>Login::isLoggedIn()));
          }
          else{
          DB::query('UPDATE posts SET likes = :likes WHERE id = :id',array(':id'=>$id,':likes'=>$likes-1));
          DB::query('DELETE FROM likes WHERE user_id = :userid AND post_id = :postid' , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id)); 
          }
        }
      }
    }
    else{
      if (DB::query("SELECT * FROM posts WHERE id = :id" , array(':id'=> $id)))
      {
        if (!DB::query("SELECT * FROM likes WHERE user_id = :userid AND post_id = :postid" , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id))){
          DB::query('UPDATE posts SET dislikes = :dislikes WHERE id = :id',array(':id'=>$id,':dislikes'=>$dislikes+1));
          DB::query('INSERT INTO likes VALUES (:id, :user_id, :post_id,0)', array(':id'=>\Ramsey\Uuid\Uuid::uuid4(), ':user_id'=>Login::isLoggedIn(),':post_id'=>$id)); 
        }
        else {
          if (DB::query("SELECT * FROM likes WHERE user_id = :userid AND post_id = :postid AND is_like = 1 " , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id))){
            DB::query('UPDATE posts SET likes = :likes, dislikes = :dislikes  WHERE id = :id',array(':id'=>$id,':likes'=>$likes-1,':dislikes'=>$dislikes+1));
            DB::query('UPDATE likes SET is_like = 0 WHERE user_id = :userid',array(':userid'=>Login::isLoggedIn()));
          }
          else{
            DB::query('UPDATE posts SET dislikes = :dislikes WHERE id = :id',array(':id'=>$id,':dislikes'=>$dislikes-1));
            DB::query('DELETE FROM likes WHERE user_id = :userid AND post_id = :postid' , array(':userid'=> Login::isLoggedIn(), ':postid'=>$id)); 
          }
       
        }}
    }
  }
}

?>