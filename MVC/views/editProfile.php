<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Your Profile</title>
      <link rel="stylesheet" href="./public/css/reset.css" />
      <link rel="stylesheet" href="./public/css/menu-left.css" />
      <link rel="stylesheet" href="./public/css/editProfile.css" />
      <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
</head>

<body>
      <!-- menu-left -->
      <?php require_once "./MVC/views/pages/menu.php"; ?>
      <!-- menu-left -->
      <!-- main content -->
      <div class="container">
            <header class="header">
                  <div class="header__info">
                        <img src="<?php echo  $data['img'] ?>" alt="avatar" class="header__info-img">
                        <a href="#" class="header__info-name"><?php echo  $data['username'] ?></a>
                  </div>
                  <div class="header__setting"></div>
            </header>
            <form class="body" method="post" action="./Profile/edit">
                  <ul class="editField">
                        <li class="editField__item">
                              <label for="" class="editField__item-name">Avatar</label>
                              <img src="<?php echo  $data['img'] ?>" id="output" />
                              <label class="editField__item-upload" for="input-image">Upload</label>
                              <input id="input-image" name="avatarImg" type="file" accept="image/*" class="input-image" onchange="loadFile(event)">
                              <p class="editField__item-des">Your uploaded image should be a square to fit the avatar frame!</p>
                        </li>
                        <li class="editField__item" style="grid-column: 2/3; grid-row: 1/2; ">
                              <label for="name" class="editField__item-name">Name</label>
                              <input type="text" id="name" onblur="checkName(event)" name="username" value="<?php echo  $data['username'] ?>" class="editField__item-input">
                              <p class="editField__item-des">Your name may appear around Website where you contribute or are mentioned. You can change it here.</p>
                        </li>
                        <li class="editField__item" style="grid-column: 2/3; grid-row: 1/2; transform:translateY(38%)">
                              <label for="birth" class="editField__item-name">Your Birthday</label>
                              <input type="date" id="birth" name="birthday" value="<?php echo  $data['birthday'] ?>" class="editField__item-input">
                        </li>
                        <li class="editField__item" style="grid-column: 2/3; grid-row: 1/2; transform:translateY(70%)">
                              <label for="phoneN" class="editField__item-name">Your Phone Number</label>
                              <input type="text" id="phoneN" class="editField__item-input" name="phone" value="<?php echo  $data['phone'] ?>">
                        </li>
                        <li class="editField__item" style="grid-column: 1/3; grid-row: 2/3;">
                              <label for="educa" class="editField__item-name">Education</label>
                              <input type="text" id="educa" name="education" value="<?php echo  $data['education'] ?>" class="editField__item-input">
                        </li>
                        <li class="editField__item" style="grid-column: 1/3; grid-row: 3/4;">
                              <label for="addr" class="editField__item-name">Your Address</label>
                              <input type="text" id="addr" name="address" value="<?php echo  $data['address'] ?>" class="editField__item-input">
                        </li>
                        <li class="editField__item" style="grid-column: 1/3; grid-row: 4/5;">
                              <label for="ins" class="editField__item-name">Contact via Instagram</label>
                              <input type="text" id="ins" name="ig_address" value="<?php echo  $data['ig_address'] ?>" class="editField__item-input">
                        </li>
                        <button class="Form-submit">Complete</button>
                  </ul>
            </form>
      </div>
      <!-- main content -->
      <!-- <div class="filter-option"></div> -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script>
            let userNames = ["PhuongVy", "NhatTien2002", "Lala"]

            function loadFile(event) {
                  console.log(URL.createObjectURL(event.target.files[0]))
                  let ouput = document.getElementById('output')
                  output.src = URL.createObjectURL(event.target.files[0])
                  output.onload = function() {
                        URL.revokeObjectURL(output.src)
                  }
            }

            function checkName(event) {

                  var a = event.target.value

                  var mess = document.getElementsByClassName('editField__item-des')[1]
                  console.log(mess
                  )
                  $.post("./Ajax/checkUsername", {
                        un : a
                  }, function(data) {
                        var result = data;
                        alert(data)
                        alertMes(result)

                        function alertMes(result) {
                              if (result == true) {
                                    event.target.style.borderColor = "green"
                                    mess.style.opacity = "0"
                                    setTimeout(() => {
                                          mess.style.color = "#c9d1d979"
                                          mess.innerHTML = "That's great!"
                                          setTimeout(() => {
                                                mess.style.opacity = "1"
                                                event.target.style = ""
                                          }, 200)
                                    }, 200)
                              } else {
                                    event.target.style.borderColor = "red"
                                    mess.style.opacity = "0"
                                    setTimeout(() => {
                                          mess.style.color = "red"
                                          mess.innerHTML = "This name has been used!"
                                          setTimeout(() => {
                                                mess.style.opacity = "1"
                                          }, 200)
                                    }, 200)
                              }
                        }

                  });
                  

            }
      </script>
      <script src="./public/js/navigartionBar.js"></script>
</body>

</html>