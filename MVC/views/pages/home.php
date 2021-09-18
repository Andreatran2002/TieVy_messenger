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
      <div id="filter-container" class="filter-container" onclick="grow()"></div>
      
</div>
