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
        <ion-icon name="notifications-outline"></ion-icon>
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
          <a href="#" style="
            font-size: 14px;
            font-weight: 300;
          ">See all</a>
        </p>
        <?php
        $news = DB::query("SELECT * FROM notifications WHERE receiver =:receiver", array(':receiver' => $_COOKIE['messageUser']));
        foreach ($news as $n){
          $sender = DB::query("SELECT * FROM users WHERE id = :id",array(":id" => $n['sender'] ))[0];
          if ($n['type'] == 1) {
            if ($n['extra'] != "") {
              $extra = json_decode($n['extra']);
              echo '
              <li class="notiList__item">
                <img src="'.$sender['profileimg'].'" alt="" class="notiList__item-image">
                <div class="notiList__item-content">
                  <p><a href="#">'.$sender['username'].'</a> mentioned you in their posts</p>
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
          <a href="#" style="
          font-size: 14px;
          font-weight: 300;
        ">See all</a>
        </p>
        <li class="notiList__item">
          <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt="" class="notiList__item-image">
          <div class="notiList__item-content">
            <p><a href="#">Vy Xinh ?????p</a> ???? g???i cho b???n m???t l???i m???i k???t b???n</p>
            <div class="notiList__item-btn">
              <button type="button" class="btn-Fr">
                <ion-icon name="person-add-outline"></ion-icon>
                <p>Add</p>
                <button type="button" class="btn-Fr">
                  <ion-icon name="person-remove-outline"></ion-icon>
                  <p>Remove</p>
                </button>
            </div>
          </div>
        </li>
        <li class="notiList__item">
          <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt="" class="notiList__item-image">
          <div class="notiList__item-content">
            <p><a href="#">Vy Xinh ?????p</a> ???? g???i cho b???n m???t l???i m???i k???t b???n</p>
            <div class="notiList__item-btn">
              <button type="button" class="btn-Fr">
                <ion-icon name="person-add-outline"></ion-icon>
                <p>Add</p>
                <button type="button" class="btn-Fr">
                  <ion-icon name="person-remove-outline"></ion-icon>
                  <p>Remove</p>
                </button>
            </div>
          </div>
        </li>
        <li class="notiList__item">
          <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt="" class="notiList__item-image">
          <div class="notiList__item-content">
            <p><a href="#">Vy Xinh ?????p</a> ???? g???i cho b???n m???t l???i m???i k???t b???n</p>
            <div class="notiList__item-btn">
              <button type="button" class="btn-Fr">
                <ion-icon name="person-add-outline"></ion-icon>
                <p>Add</p>
                <button type="button" class="btn-Fr">
                  <ion-icon name="person-remove-outline"></ion-icon>
                  <p>Remove</p>
                </button>
            </div>
          </div>
        </li>
      </ul>
    </li>
  </div>
  <div class="bottom">
    
    <li>
      <a href="./Profile" class="menu-item">
        <ion-icon name="person-circle-outline"></ion-icon>
        <span class="menu-item-text text-hide">Profile</span>
      </a>
    </li>
    
  </div>
</ul>
<div id="filter-container" class="filter-container" onclick="grow()"></div>