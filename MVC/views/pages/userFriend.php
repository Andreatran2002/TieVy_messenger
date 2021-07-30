<?php 

      $result = DB::query("SELECT * FROM users"); 
      foreach($result as $s){
            echo "<div class=\"body__left-item\" id=\"".$s['id']."\">
                  <img src=\"./public/images/default_avatar.jpg\"
              alt=\"\"
              
              class=\"body__left-item-image\"
            />
            <a
              href=\"#\"
              class=\"body__left-item-name\">".$s['username']."</a></div>"; 
      }
?>