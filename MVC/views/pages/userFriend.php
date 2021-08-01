<?php 
      $userid = Login::isLoggedIn();
      $result = DB::query("SELECT * FROM followers WHERE follower_id = :userid",array(':userid'=>$userid));
      foreach($result as $s){

            $user_follow = DB::query("SELECT * FROM users WHERE id = :user_follow_id", array(":user_follow_id"=>$s['user_id']))[0];
            echo "<div class=\"body__left-item\" id=\"".$s['user_id']."\">
                  <img src=\"".$user_follow['profileimg']."\"
              alt=\"\"
              
              class=\"body__left-item-image\"
            />
            <a
              href=\"#\"
              class=\"body__left-item-name\">".$user_follow['username']."</a></div>"; 
      }
?>