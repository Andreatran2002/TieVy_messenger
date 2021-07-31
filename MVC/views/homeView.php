<?php 
      $user = DB::query("SELECT * FROM users WHERE username = :username ",array(':username'=>$_COOKIE['messageUser']))[0]; 
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
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </head>
  <body onload = "updateNewPosts()">
    <!-- menu-left -->
    <?php require_once "./MVC/views/pages/menu.php"?>
    <div class="container-home">
      <!-- menu-left -->
      <!-- profile Field -->
      <div class="profileField">
        <div class="profileField__body">
          <div class="profileField__body-avatar">
            <image style = "object-fit: cover; width:200px; height:200px;"
              src="<?php echo $user['profileimg'] ?>"
            ></image>
          </div>
          <ul class="profileField__body-information">
            <li class="information__item">
              <a href="#" class="profileField__body-information-name">
                    <?php echo $user['username']?>
              </a>
            </li>
            <li class="information__item">
              <ion-icon class="information__item-icon" name="briefcase"></ion-icon>
              <p class="information__item-text">
                Ho Chi Minh City University of Technology and Education
              </p>
            </li>
            <li class="information__item">
              <ion-icon class="information__item-icon" name="navigate"></ion-icon>
              <p class=informationr__item-text">
                Số 62, Bom Bo, Bù Đăng, Bình Phước
              </p>
            </li>
            <li class="information__item" class="information__item">
              <ion-icon name="call"></ion-icon>
              <p class="information__item-text">0394973287</p>
            </li>
            <li class="information__item" class="information__item">
              <ion-icon name="mail"></ion-icon>
              <p class="information__item-text">beo1692@gmail.com</p>
            </li>
            <li class="information__item">
              <ion-icon name="logo-instagram"></ion-icon>
              <a
                href="https://www.instagram.com/1wky0u/"
                class="information__item-text"
                >_1wkuwu</a
              >
            </li>
          </ul>
        </div>
      </div>
      <!-- profile Field -->
      <!-- time new Field -->
      <div class="timeNew">
        <!-- <div class="timeNew__header">
            <a href="#" class="timeNew__header-logo">TieVy</a>
            <ion-icon name="reorder-three"></ion-icon>
          </div> -->
          <ul class="timeNew__body" id = "postNews" >
          <?php require_once "./MVC/views/pages/post.php"; ?>
            <li class="post">
              <div class="post__header">
                <img src="https://i.pinimg.com/236x/5b/74/8e/5b748ebcc29e8a713b64a0c85f6bedeb.jpg" alt="" class="post__header-avatar">
                <a href="#" class="post__header-name">Spider Gwen</a>
                <ion-icon name="reorder-two"></ion-icon>
              </div>
              <div class="post__body">
                <p class="post__body-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium temporibus eum magnam dolore quas, atque nemo ipsam, iusto ducimus voluptatibus animi. Voluptates vero nemo est omnis minus culpa quas soluta?</p>
              </div>
              <div class="post__footer">
                <form action="">
                  <button class="post__footer-btnLike btn">
                    <ion-icon name="heart"></ion-icon>
                  </button>
                  <button class="post__footer-btnDisLike btn"> 
                    <ion-icon name="heart-dislike"></ion-icon>
                  </button>
                  <button class="post__footer-btncmt">
                    <ion-icon name="chatbox-ellipses"></ion-icon>
                    Comment
                  </button>
                </form>
              </div>
            </li>

            <li class="post">
              <div class="post__header">
                <img src="https://i.pinimg.com/236x/0a/92/68/0a9268d6d54ad0bd4e4d984bbdf3c283.jpg" alt="" class="post__header-avatar">
                <a href="#" class="post__header-name">Peter Packer</a>
                <ion-icon name="reorder-two"></ion-icon>
              </div>
              <div class="post__body">
                <p class="post__body-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam quisquam inventore dolor numquam, veritatis excepturi.</p>
                <img src="https://i.pinimg.com/564x/70/6a/2d/706a2da6d0dea6761cf9adc2146ed63a.jpg" class="post__body-image"></img>
              </div>
              <div class="post__footer">
                <form action="">
                  <button class="post__footer-btnLike btn">
                    <ion-icon name="heart"></ion-icon>
                  </button>
                  <button class="post__footer-btnDisLike btn"> 
                    <ion-icon name="heart-dislike"></ion-icon>
                  </button>
                  <button class="post__footer-btncmt">
                    <ion-icon name="chatbox-ellipses"></ion-icon>
                    Comment
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </div>
        <!-- friend field -->
        <div class="friendlist">
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/c7/ce/fd/c7cefd491aecb8f93c5e0588337ec876.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a
              href="https://www.facebook.com/sherman.pham.75?__tn__=-UC*F"
              class="friendlist-item-name"
              >LOKI</a
            >
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/85/af/3d/85af3d1aedca688912b2fdfd1cf47dba.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">Sylvie</a>
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/98/52/1d/98521d83b7278417fb15bbdcd7cd1986.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">Mobius</a>
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/79/44/d4/7944d4277a8ac33347a517080233cb2d.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">B-15</a>
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/c7/ce/fd/c7cefd491aecb8f93c5e0588337ec876.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a
              href="https://www.facebook.com/sherman.pham.75?__tn__=-UC*F"
              class="friendlist-item-name"
              >LOKI</a
            >
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/85/af/3d/85af3d1aedca688912b2fdfd1cf47dba.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">Sylvie</a>
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/98/52/1d/98521d83b7278417fb15bbdcd7cd1986.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">Mobius</a>
          </div>
          <div class="friendlist-item">
            <img
              src="https://i.pinimg.com/236x/79/44/d4/7944d4277a8ac33347a517080233cb2d.jpg"
              alt=""
              class="friendlist-item-image"
            />
            <a href="#" class="friendlist-item-name">B-15</a>
          </div>
        </div>
      </div>
      <!-- time new Field -->

      <!-- friend field -->   
    <!-- script file -->
    <div id="filter-container" class="filter-container" onclick="grow()"></div>
    <script src="./public/js/navigartionBar.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="./public/js/home.js"></script>
    <script src="./public/js/main.js"></script>
  </body>
</html>