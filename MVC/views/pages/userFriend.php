<?php 
      $userid = Login::isLoggedIn();
      $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid",array(':userid'=>$userid));
      // $result = DB::query("SELECT * DISTINCT receiver_id,user_id FROM messages WHERE receiver_id = :userid OR user_id = :userid",array(':userid'=>$userid));

      foreach($result as $s){
            if (DB::query("SELECT * FROM followers WHERE user_id = :userid AND follower_id = :friendid",array(':userid'=>$userid,':friendid'=>$s['user_id']))){
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
            echo '<div id="option-chatbox" class="body__chatBox-options">
            <img src="'.$user_follow['profileimg'].'" alt="" id="option-avatar">
            <a href="#" class="option-item option-user">'.$user_follow['username'].'</a>
            <a href="#" class="option-item">
                  <ion-icon name="trash-outline"></ion-icon>
                  <p>Remove this conversations</p>
            </a>
            <a href="#" class="option-item">
                  <ion-icon name="ban-outline"></ion-icon>
                  <p>Block this user</p>
            </a>
            <a href="#" class="option-item">
                  <ion-icon name="person-outline"></ion-icon>
                  <p>Visit profile</p>
            </a>
            <a href="#" class="option-item">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                  <p>Share Users URL</p>
            </a>
            <a href="#" class="option-item">
                  <ion-icon name="alert-outline"></ion-icon>
                  <p>Send a report</p>
            </a>
      </div>'; 
            }
      }
?>