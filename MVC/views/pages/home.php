<?php
if (isset($_GET['f'])){
      if (DB::query("SELECT * FROM users WHERE id = :id ", array(':id' => $_GET['f']))){
      $user = DB::query("SELECT * FROM users WHERE id = :id ", array(':id' => $_GET['f']))[0];

}
else 
$user = DB::query("SELECT * FROM users WHERE id = :id ", array(':id' => $_COOKIE['messageUser']))[0];


}

else 
$user = DB::query("SELECT * FROM users WHERE id = :id ", array(':id' => $_COOKIE['messageUser']))[0];

?>
<div class="container-home">
      <!-- menu-left -->
      <!-- profile Field -->
      <div class="profileField">
            <div class="profileField__body">
                  <div class="profileField__body-avatar">
                        <image style="object-fit: cover; width:200px; height:200px;" src="<?php echo $user['profileimg'] ?>"></image>
                  </div>
                  <ul class="profileField__body-information">
                        <li class="information__item">
                              <a href="#" class="profileField__body-information-name">
                                    <?php echo $user['username'] ?>
                              </a>
                        </li>
                        <li class="information__item">
                              <ion-icon class="information__item-icon" name="briefcase"></ion-icon>
                              <p class="information__item-text">
                                    <?php
                                    echo $user['education'];
                                    ?>
                              </p>
                        </li>
                        <li class="information__item">
                              <ion-icon class="information__item-icon" name="navigate"></ion-icon>
                              <p class=informationr__item-text">
                                    <?php
                                    echo $user['address'];
                                    ?>
                              </p>
                        </li>
                        <li class="information__item" class="information__item">
                              <ion-icon name="call"></ion-icon>
                              <p class="information__item-text">
                                    <?php
                                    echo $user['phone'];
                                    ?></p>
                        </li>
                        <li class="information__item" class="information__item">
                              <ion-icon name="mail"></ion-icon>
                              <p class="information__item-text">
                                    <?php
                                    echo $user['email'];
                                    ?>
                              </p>
                        </li>
                        <li class="information__item">
                              <ion-icon name="logo-instagram"></ion-icon>
                              <a href=" <?php
                                    echo $user['instagram_address'];
                                    ?>" class="information__item-text">
                                    <?php
                                    echo $user['instagram_address'];
                                    ?></a>
                        </li>
                  </ul>
            </div>
      </div>
      <!-- profile Field -->
      <!-- time new Field -->
      <div class="timeNew">
            <ul class="timeNew__body" id="postNews">

            </ul>
      </div>
        
      <div class="friendlist" >

      <label for="friend__search-input" class="friendlist__search">
      <ion-icon class="friendlist__search-icon" name="search-outline"></ion-icon>
      <input id="search-input-home" class="friendlist__search-input" id="friend__search-input" type="text">
      </label>
      <div id="friendlist">

      </div>
   
      </div>
      <div class="menuMb">
              <div class="menuMb__header">
                <img class="menuMb__header-avatar"
                  src="https://i.pinimg.com/564x/7b/ee/c5/7beec5a45c69696b4902a46a4d33eeed.jpg"></img>
              <a href="#" class="menuMb__header-name">Miles Morales
              </a>
            </div>
            <a id="addFriendMb" class="menuMb__item">
              <ion-icon name="person-add"></ion-icon>
              <span>Connect to your friend</span>
            </a>
            <div class="addFriendMbField">
              <input class="addFriendMbField__input" type="text">
              <div class="addFriendMbField__container">
                <div class="addFriendMbField__item">
                  <img src="https://i.pinimg.com/236x/85/af/3d/85af3d1aedca688912b2fdfd1cf47dba.jpg"
                    alt=""
                    class="addFriendMbField__item-image" />
                  <p class="addFriendMbField__item-name">Sylvie</p>
                </div>
                <div class="addFriendMbField__item">
                  <img src="https://i.pinimg.com/236x/85/af/3d/85af3d1aedca688912b2fdfd1cf47dba.jpg"
                    alt=""
                    class="addFriendMbField__item-image" />
                  <p class="addFriendMbField__item-name">Sylvie</p>
                </div>
                <div class="addFriendMbField__item">
                  <img src="https://i.pinimg.com/236x/85/af/3d/85af3d1aedca688912b2fdfd1cf47dba.jpg"
                    alt=""
                    class="addFriendMbField__item-image" />
                  <p class="addFriendMbField__item-name">Sylvie</p>
                </div>
              </div>
            </div>
            
            <a class="menuMb__item">
              <ion-icon name="cog"></ion-icon>
              <span>Modify your account</span>
            </a>
            <a class="menuMb__item">
              <ion-icon name="chatbubbles"></ion-icon>
              <span>Chat with your friend</span>
            </a>
            <a class="menuMb__item">
              <ion-icon name="log-in-outline"></ion-icon>
              <span>Log out</span>
            </a>
          </div>
        </div>
        <!-- time new Field -->

        <div class="nbm">
          <ion-icon id="toHome" name="albums"></ion-icon>
          <ion-icon id="toFriend" name="people-circle"></ion-icon>
          <ion-icon id="toNoti" name="notifications"></ion-icon>
          <ion-icon id="toMenu" name="menu"></ion-icon>
        </div>

      <div id="filter-container" class="filter-container" onclick="grow()"></div>
      
</div>
