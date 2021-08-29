<?php
$user = DB::query("SELECT * FROM users WHERE id = :id ", array(':id' => $_COOKIE['messageUser']))[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="./public/css/reset.css" />
  <link rel="stylesheet" href="./public/css/menu-left.css" />
  <link rel="stylesheet" href="./public/css/home.css" />
  <link rel="stylesheet" href="./public/css/chatView.css" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body onload="updateNewPosts(); showFriends(); updateStatus(); ">
  <!-- menu-left -->
  <?php require_once "./MVC/views/pages/menu.php" ?>
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
            <a href="https://www.instagram.com/1wky0u/" class="information__item-text">
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
    <!-- friend field -->
    <div class="friendlist" id="friendlist">

    </div>
    <!-- time new Field -->

    <!-- friend field -->
    <!-- script file -->
    <div id="filter-container" class="filter-container" onclick="grow()"></div>



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- <script src="./public/js/home.js"></script> -->
    <script src="./public/js/main.js"></script>
    <script src="./public/js/home.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="./public/js/chat.js"></script>
    <script src="./public/js/navigartionBar.js"></script>
</body>

</html>