<!-- menu-left -->
<ul id="nagication-bar" class="menu menu-small">
      <div class="top">
        <li class="menu-header">
          <ion-icon
            onclick="grow()"
            id="icon-hint"
            name="arrow-back-outline"
          ></ion-icon>
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
              <input type="text" name="search_friend" id="friend_search_input" onkeydown="if (event.keyCode == 13) {searchFriendInDB();}" placeholder="Search for friend..." />
            </div>
            <ul class="friend__box-container height-0" id="friend_search_area" >
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
              <li>
                <a href="#" class="friend__box-item">
                  <img
                    class="friend__box-item-image"
                    src="https://i.pinimg.com/564x/90/33/83/903383dbe84483ffe3628a9149a55a1e.jpg"
                    alt=""
                  />
                  <span class="menu-item-text text-hide friend__box-item-text"
                    >Vy Vy Vy
                    <ion-icon
                      name="close-circle-outline"
                      class="friend__box-item-icon"
                    ></ion-icon>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#" class="menu-item">
            <ion-icon name="notifications-outline"></ion-icon>
            <span class="menu-item-text text-hide">Notifications</span>
          </a>
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
    <div id="filter-container" class="filter-container" onclick="grow()"></div>
