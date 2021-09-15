<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/reset.css" />
    <link rel="stylesheet" href="./public/css/loginView.css" />
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
  <body>
  <?php 
    if (isset($_GET['a'])){
    $announce = $_GET['a'];
    switch ($announce){
      case "success_account":
        $content_announce = "You have successfully created a new account"; 
        $color_announce = "success"; 
        break; 
      default:
      $content_announce = "You have successfully created a new account"; 
        $color_announce = "success"; 
      break; 
    }
    ?>
    <div class="announce" role="alert">
  <?php 
     echo $content_announce; 
  }
  ?>
  
</div>
    <div class="container">
      <div class="header">
        <a class="header__logo">TieVy</a>
        <div class="header__option">
          <a href="#" class="header__option-item"></a>
        </div>
        <button onclick="signupOn()" class="header__signup button">
          Sign up
        </button>
      </div>
      <div class="body">
        <div class="body__tittle">
          <p class="body__tittle-main">Login to Your Account</p>
          <h4 class="body__tittle-bonus">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi
            labore nostrum qui minima obcaecati praesentium accusamus
          </h4>
        </div>
        <div class="body__login">
          <form action="./Account/Login_user" method="post" class="login__left">
            <div class="login__left-item">
              <input name="username" type="text" class="login-name" placeholder="UserName" />
            </div>
            <div class="login__left-item">
              <input
                type="password"
                class="login-password"
                placeholder="Password"
                name="password"
              />
              <ion-icon
                class="password-hide-btn"
                onclick="hidePw(0)"
              ></ion-icon>
            </div>
            <div class="login__left-item">
              <button name="login" class="button">Login to your account</button>
            </div>
          </form>
          <div class="login__center">
            <ion-icon name="apps"></ion-icon>
          </div>
          <div class="login__right">
            <div class="login__right-item image-1"></div>
            <div class="login__right-item">
              <ion-icon name="chatbubbles"></ion-icon>
            </div>
          </div>
        </div>
      </div>

      <div class="footer">
        <a href="#" class="footer__item">privacy policy</a>
        <a href="#" class="footer__item">@Tivy</a>
      </div>
      <form action="./Account/CreateAccount" method="post" class="signup">
        <div class="signup__header">
          <h1 class="signup__header-name">Create a account for you</h1>
          <!-- <ion-icon name="close"></ion-icon> -->
        </div>
        <div class="signup__body">
          <div class="signup__body-left">
            <div class="login__left-item">
              <input name="username" type="text" class="login-name" placeholder="UserName" />
              <ion-icon name="person"></ion-icon>
            </div>
            <div class="login__left-item">
              <input
                name="email"
                type="text"
                class="login-name"
                placeholder="Email Address"
              />
              <ion-icon name="mail"></ion-icon>
            </div>
            <div class="login__left-item">
              <input
                name="password"
                type="password"
                class="login-password confirm-password"
                placeholder="Password"
              />
              <ion-icon
                class="password-hide-btn"
                onclick="hidePw(1)"
                name="eye"
              ></ion-icon>
            </div>
            <div class="login__left-item">
              <input 
                onblur="confirm()"
                type="password"
                class="login-password confirm-password"
                placeholder="Confirm your password"
              />
              <ion-icon
                class="password-hide-btn"
                onclick="hidePw(2)"
                name="eye"
              ></ion-icon>
              <p
                id="warning-password"
                style="
                  font-size: 12px;
                  font-weight: 500;
                  position: absolute;
                  botton: 0px;
                  left: 15px;
                  transform: translate(0, -50%);
                  transition: all 0.2s ease;
                  opacity: 0;
                "
              >Check your password</p>
            </div>
            <div class="login__left-item">
              <button name="createAccount" class="button">Create</button>
              <ion-icon
                style="transform: translate(-150%, -50%) scale(1.2)"
                name="arrow-forward"
              ></ion-icon>
            </div>
          </div>
          <div class="line"></div>
          <div class="signup__body-right"></div>
          <ion-icon
            style="
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%) scale(2);
            "
            name="infinite"
          ></ion-icon>
          <ion-icon
            onclick="signupOff()"
            class="close-signup"
            style="
              position: absolute;
              top: -33px;
              right: 10px;
              transform: translate(-50%, -50%) scale(2);
              transition: all 0.3s ease; ;
            "
            name="close"
          ></ion-icon>
        </div>
      </form>
    </div>
    <div id="filter-container" class="filter-container"></div>
    <script>
      let pwField = document.getElementsByClassName("login-password");
      let pwHideBtn = document.getElementsByClassName("password-hide-btn");
      function hidePw(a) {
        console.log(a);
        if (pwField[a].type == "password") {
          pwField[a].type = "text";
          pwHideBtn[a].name = "eye-off";
        } else {
          pwField[a].type = "password";
          pwHideBtn[a].name = "eye";
        }
      }
      let filter = document.getElementById("filter-container");
      console.log(filter);
      let signupField = document.getElementsByClassName("signup");
      function signupOn() {
        signupField[0].style.display = "flex";
        filter.style.display = "block";
        setTimeout(() => {
          filter.style.animation = "filter-on 0.3s ease forwards";
        }, 100);
        setTimeout(() => {
          signupField[0].style.animation = "open-signup 0.3s ease forwards";
        }, 400);
      }
      function signupOff() {
        signupField[0].style.animation = "close-signup 0.5s ease forwards";
        setTimeout(() => {
          filter.style.animation = "filter-off 0.5s ease forwards";
        }, 300);
        setTimeout(() => {
          signupField[0].style = "";
          filter.style = "";
        }, 1000);
      }
      let confirmPassword = document.getElementsByClassName("confirm-password");
      console.log(confirmPassword[1]);
      function confirm() {
        let a = confirmPassword[0].value;
        let b = confirmPassword[1].value;
        let passwordCheck = a == b ? true : false;
        console.log(passwordCheck);
        if (passwordCheck === false) {
          confirmPassword[0].style.animation = "warning-on 1s linear forwards";
          confirmPassword[1].style.animation = "warning-on 1s linear forwards";
          document.getElementById("warning-password").style.animation = "open-signup 1s linear forwards";
        }
        if (passwordCheck === true) {
          confirmPassword[0].style.animation =
          "warning-off 1.5s linear forwards";
          confirmPassword[1].style.animation =
          "warning-off 1.5s linear forwards";
          let c = document.getElementById("warning-password").style.animation;
          console.log(c);
          if(c == "1s linear 0s 1 normal forwards running open-signup") {
            document.getElementById("warning-password").style.animation = "close-signup 0.6s linear forwards";
          }
        }
      }
      
    </script>
  </body>
</html>

<?php if (isset ($data['result']) ){
   echo "<script>alert('Can't create new account'); </script>"; 
  }
?> 