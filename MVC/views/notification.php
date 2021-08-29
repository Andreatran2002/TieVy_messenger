<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notifications</title>
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/menu-left.css" />
  <link rel="stylesheet" href="./assets/css/Notifications.css" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
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
        <a href="#" class="menu-item">
          <ion-icon name="home-outline"></ion-icon>
          <span class="menu-item-text text-hide">Home</span>
        </a>
      </li>
      <li>
        <a href="#" class="menu-item">
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
            <input type="text" placeholder="Search for friend..." />
          </div>
          <ul class="friend__box-container height-0">
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
            <li>
              <a href="#" class="friend__box-item">
                <img class="friend__box-item-image"
                  src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg" alt="" />
                <span class="menu-item-text text-hide friend__box-item-text">Vy Vy Vy
                  <ion-icon name="close-circle-outline" class="friend__box-item-icon"></ion-icon>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a href="#" class="menu-item icon-information ">
          <ion-icon name="chatbubbles-outline"></ion-icon>
          <span class="menu-item-text text-hide">Chatbox</span>
        </a>
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
          <li class="notiList__item">
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> Lorem ipsum dolor sit amet consectetur</p>
            </div>
          </li>
          <li class="notiList__item">
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> Lorem ipsum dolor sit amet consectetur</p>
            </div>
          </li>
          <li class="notiList__item">
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> Lorem ipsum dolor sit amet consectetur</p>
            </div>
          </li>
          <li class="notiList__item">
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> Lorem ipsum dolor sit amet consectetur</p>
            </div>
          </li>
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
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> đã gửi cho bạn một lời mời kết bạn</p>
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
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> đã gửi cho bạn một lời mời kết bạn</p>
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
            <img src="https://i.pinimg.com/564x/23/32/23/2332236e06caa9000505d7daa27ad0ee.jpg" alt=""
              class="notiList__item-image">
            <div class="notiList__item-content">
              <p><a href="#">Vy Xinh Đẹp</a> đã gửi cho bạn một lời mời kết bạn</p>
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
        <a href="#" class="menu-item">
          <ion-icon name="cube-outline"></ion-icon>
          <span class="menu-item-text text-hide">Help</span>
        </a>
      </li>
      <li>
        <a href="#" class="menu-item">
          <ion-icon name="person-circle-outline"></ion-icon>
          <span class="menu-item-text text-hide">Account</span>
        </a>
      </li>
      <li>
        <a href="#" class="menu-item">
          <ion-icon name="settings-outline"></ion-icon>
          <span class="menu-item-text text-hide">Settings</span>
        </a>
      </li>
    </div>
  </ul>
  <!-- menu-left -->

  <!-- main content -->
  <div class="container">
    <header class="header">
      <div class="header__info">
        <img src="https://i.pinimg.com/564x/7b/ee/c5/7beec5a45c69696b4902a46a4d33eeed.jpg" alt="avatar"
          class="header__info-img">
        <a href="#" class="header__info-name">Phạm Nhật Tiến</a>
      </div>
      <div class="header__setting"></div>
    </header>
    <div class="body">
      <ul class="list" id="notiField">
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
      </ul>
      <div class="box"></div>
      <ul class="list" id="frieField">
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
        <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content">
            <p><a href="">Tien dep trai</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
            </p>
          </div>
        </li>
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
</body>

</html>