<?php 
      $userid = Login::isLoggedIn();
      $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid",array(':userid'=>$userid));
      
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
?>