<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $data['page'];?></title>
  <link rel="stylesheet" href="./public/css/reset.css" />
  <link rel="stylesheet" href="./public/css/menu-left.css" />
  <link rel="stylesheet" href="./public/css/<?php echo $data['page'] ?>.css" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body onload = "constructUser();updateNewPosts(); showFriends(); updateStatus(); updateChat(); ">

  <!-- menu-left -->
  <ul id="nagication-bar" class="menu menu-small">
    <div class="top">
      <li class="menu-header">
        <ion-icon onclick="grow()" id="icon-hint" name="arrow-back-outline"></ion-icon>
      </li>
      <li class="menu-search" onclick="growSearch()">
        <ion-icon class="menu-search-icon" name="search-outline"></ion-icon>
        <input id="search-input" type="text" placeholder="" />
      </li>
      <li>
        <a href="./Home" class="menu-item">
          <ion-icon name="home-outline"></ion-icon>
          <span class="menu-item-text text-hide">Home</span>
        </a>
      </li>
      <li>
        <a href="./Chat" class="menu-item">
          <ion-icon name="chatbubbles-outline"></ion-icon>
          <span class="menu-item-text text-hide">Chat</span>
        </a>
      </li>
      <li onclick="logout()">
        <a href="./Account/logout" class="menu-item">
          <ion-icon name="log-out-outline"></ion-icon>
          <span class="menu-item-text text-hide">Logout</span>
        </a>
      </li>
      <li>
        <a href="#" class="friend__box-header" onclick="searchFriend()">
          <ion-icon name="person-add-outline"></ion-icon>
          <span class="menu-item-text text-hide">Friends</span>
        </a>
        <div href="#" class="friend__box">
          <div class="friend__box-search">
            <input type="text" name="search_friend" id="friend_search_input" onkeydown="if (event.keyCode == 13) { searchFriendInDB();}" placeholder="Search for friend..." />
          </div>
          <ul class="friend__box-container height-0" id="friend_search_area">

          </ul>
        </div>
      </li>
      <li style="position:relative">
        <a href="#" class="menu-item icon-information info-item" onclick="openInformation()">
          <ion-icon name="notifications-outline" id="notifications-icon"></ion-icon>
          <span class="icon-count" id="notifications-num">0</span>
          <span class="menu-item-text text-hide">Notifications</span>
        </a>
        <ul class="notiList">
          <p style="
            font-weight: 500;
            margin: 0 0 10px 5px;
            font-size: 26px;
            color: #fff;
            ">Notifications</p>
          <p style="
            font-weight: 500;
            margin: 0 0 10px 5px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
          ">News
            <a href="./notifications" style="
            font-size: 14px;
            font-weight: 300;
          ">See all</a>
          </p>
          <?php
          $news = DB::query("SELECT * FROM notifications WHERE receiver =:receiver", array(':receiver' => $_COOKIE['messageUser']));
          foreach ($news as $n) {
            $sender = DB::query("SELECT * FROM users WHERE id = :id", array(":id" => $n['sender']))[0];
            if ($n['type'] == 1) {
              if ($n['extra'] != "") {
                $extra = json_decode($n['extra']);
                echo '
              <li class="notiList__item">
                <img src="' . $sender['profileimg'] . '" alt="" class="notiList__item-image">
                <div class="notiList__item-content">
                  <p><a href="#">' . $sender['username'] . '</a> mentioned you in their posts</p>
                </div>
              </li>
                    ';
              }
            }
          }
          ?>


          <p style="
            font-weight: 500;
            margin: 0 0 10px 5px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
          ">Add friend
            <a href="./notifications" style="
          font-size: 14px;
          font-weight: 300;
        ">See all</a>
          </p>
          <?php 
          $friend_requests = DB::query("SELECT * FROM followers WHERE user_id = :user_id", array(':user_id' => $_COOKIE['messageUser']));
          foreach ($friend_requests as $friend){
            if (!DB::query("SELECT * FROM followers WHERE user_id = :friendid AND follower_id = :userid",array(':userid'=>$_COOKIE['messageUser'],':friendid'=>$friend['follower_id']))){
            $follower = DB::query("SELECT * FROM users WHERE id = :id", array(':id'=>$friend['follower_id']))[0];
            echo ' 
            <li class="notiList__item">
            <img src="'.$follower['profileimg'] .'" alt="" class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">'.$follower['username'].'</a> want to be your friend.</p>
              <div class="notiList__item-btn">';
            echo"   <button onclick=\"addFriend('".$friend['id']."');\"";
           echo ' type="button" class="btn-Fr">
                  <ion-icon name="person-add-outline"></ion-icon>
                  <p>Add</p>
                  <button type="button" class="btn-Fr">
                    <ion-icon name="person-remove-outline"></ion-icon>
                    <p>Remove</p>
                  </button>
              </div>
            </div>
          </li>';
            }
          }
           
        ?>
        </ul>
      </li>
    </div>
    <div class="bottom">
      <li>
        <a href="#" class="menu-item">
          <ion-icon name="cube-outline"></ion-icon>
          <span class="menu-item-text text-hide">Help</span>
        </a>
      </li>
      <li>
        <a href="./Profile" class="menu-item">
          <ion-icon name="person-circle-outline"></ion-icon>
          <span class="menu-item-text text-hide">Profile</span>
        </a>
      </li>
      <li>
        <a href="#" class=" menu-item">
          <ion-icon name="settings-outline"></ion-icon>
          <span class="menu-item-text text-hide">Settings</span>
        </a>
      </li>
    </div>
  </ul>
  <div id="filter-container" class="filter-container" onclick="grow()"></div>
  <?php require_once "./MVC/views/pages/".$data['page'].".php" ?>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script> 
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script> 
  <script src="./public/js/navigartionBar.js"></script>
  <script src="../public/js/home.js"></script>
  <script src="./public/js/main.js"></script>   
  <script src="./public/js/chat.js"> </script>

</body>

</html>