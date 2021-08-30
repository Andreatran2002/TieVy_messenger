 <?php 
      $user = DB::query("SELECT * FROM users WHERE id = :id",array(':id' => $_COOKIE['messageUser']))[0];
      
 ?>
 
 <!-- main content -->
 <div class="container">
    <header class="header">
      <div class="header__info">
        <img src="<?php echo $user['profileimg']?>" alt="avatar"
          class="header__info-img">
        <a href="#" class="header__info-name"><?php echo $user['username']?></a>
      </div>
      <div class="header__setting"></div>
    </header>
    <div class="body">
      <ul class="list" id="notiField">
            
        <?php 
        $news = DB::query("SELECT * FROM notifications WHERE receiver =:receiver", array(':receiver' => $_COOKIE['messageUser']));
        foreach ($news as $n) {
              $sender = DB::query("SELECT * FROM users WHERE id = :id", array(":id" => $n['sender']))[0];
              if ($n['type'] == 1) {
                    if ($n['extra'] != "") {
                          $extra = json_decode($n['extra']);
                          echo '
                          <li class="list__item">
                          <img src="'.$sender['profileimg'].'" alt=""
                            class="list__item-image">
                          <div class="list__item-content">
                            <p><a href="">'.$sender['username'].'</a> mentioned you in a post
                            </p>
                          </div>
                        </li>';
                    }
              }
        }
        ?>
        
    
      </ul>
      <div class="box"></div>
      <ul class="list" id="frieField">

        <?php 
          $friend_requests = DB::query("SELECT * FROM followers WHERE user_id = :user_id ", array(':user_id' => $_COOKIE['messageUser']));
          foreach ($friend_requests as $friend){
            if (!(DB::query("SELECT * FROM followers WHERE follower_id = :user_id AND user_id =:friendid", array(':user_id' => $_COOKIE['messageUser'], ':friendid'=>$friend['follower_id']))))
            {$follower = DB::query("SELECT * FROM users WHERE id = :id", array(':id'=>$friend['follower_id']))[0];
            echo '
            <li class="list__item">
            <img src="'.$follower['profileimg'] .'" alt=""
              class="list__item-image">
            <div class="list__item-content of-req">
              <p><a href="">'.$follower['username'].'</a> want to become your friend !
              </p>
              <div class="list__item-btnContainer">
                <button onclick="addFriend("'.$follower['id'].'");" class="btn-add">
                  <ion-icon name="person-add-outline"></ion-icon> Add
                </button>
                <button class="btn-remove">
                  <ion-icon name="person-remove-outline"></ion-icon> Remove
                </button>
              </div>
            </div>
          </li>';
            }
          }
           
        ?>
      </ul>
      <h2 id="title-1">Notifications</h2>
      <h2 id="title-2">Friend requests</h2>
      <!-- <ul class="reqfr"></ul> -->
    </div>
  </div>
  <!-- main content -->
  <div id="filter-container" class="filter-container" onclick="grow()"></div>
  <!-- <div class="filter-option"></div> -->
  <script src="./assets/js/navigartionBar.js"></script>
  <script>
    {
      let noti = document.getElementById("notiField")
      let frie = document.getElementById("frieField")
      let title1 = document.getElementById("title-1")
      let title2 = document.getElementById("title-2")
      console.log({title1})
      noti.addEventListener("mouseover", () => {
        noti.style.transform = "scale(1) translateX(30%)"
        frie.style.transform = "scale(0.7) translateX(200%)"
        title1.style.opacity = "1"
        // frie.style.opacity = "0"
      })
      frie.addEventListener("mouseover", () => {
        noti.style.transform = "scale(0.7) translateX(-200%)"
        frie.style.transform = "scale(1) translateX(-30%)"
        title2.style.opacity = "1"
      })
      noti.addEventListener("mouseout", () => {
        noti.style.transform = "scale(0.9)"
        frie.style.transform = "scale(0.9)"
        title2.style.opacity = "0"
        title1.style.opacity = "0"
      })
      frie.addEventListener("mouseout", () => {
        noti.style.transform = "scale(0.9)"
        frie.style.transform = "scale(0.9)"
        title2.style.opacity = "0"
        title1.style.opacity = "0"
      })
    }
    </script>