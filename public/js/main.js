var message__input = document.getElementById("message__input");
var message__area = document.getElementById("message__area");
var friend_search_input = document.getElementById("friend_search_input");
var receiver;
$(document).ready(function() {
    updateChat();
    $("#username").keyup(function() {
        var user = $(this).val();
        $("#messageUser").html(user);
        $.post("./Ajax/checkUsername", {
            un: user
        }, function(data) {
            $("#messageUser").html(data);
        });

    })
})

function getReceiver(receiver_id) {
    message__area.scrollTop = message__area.scrollHeight;
    if (receiver_id != "#") {
        receiver = receiver_id;
    }
    return receiver;
}



function updateResult(data) { result = data; }

function getcookie(cname) {
    var result = false;
    $.ajax({
        type: "POST",
        url: './Ajax/getCookies',
        data: ({ cookieName: cname }),
        dataType: "json",
        async: false,
        success: function(data) {

            result = data;
        },
        error: function() {

        }
    });
    return result;

}

function escapehtml(text) {
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function sendmsg() {


    var message = message__input.value;
    if (message != "") {
        $.post("./Ajax/sendMessage", {
            message: message,
            receiver: receiver
        }, function(data) {
            $("#message__input").val("");
            message__area.scrollTop = message__area.scrollHeight;


        });
    }
}

function updateChat() {
    var username = getcookie("messageUser");
    var output = "";
    $.post("./Ajax/updateMessage", {
        receiver: receiver
    }, function(data) {

        var response = data.split("\n");
        var rl = response.length;
        var item = "";
        for (var i = 0; i < rl; i++) {
            item = response[i].split('\\')
            if (item[1] != undefined) {
                if (item[0] == username) {
                    output += "<div class=\"body__chatBox-msgArea-item sent\">" + item[1] + " </div>";
                } else {
                    output += "<div class=\"body__chatBox-msgArea-item receive\">" + item[1] + " </div>";
                }
            }
        }
        $("#message__area").html(output);
        message__area.scrollTop = message__area.scrollHeight;
    });
}

// home


function updateNewPosts() {
    $.post("./Ajax/updatePosts", {
        // id = user_id; 
        // Để hiển thị các bài post mới là bạn của người dùng
    }, function(data) {
        $("#postNews").html(data);
    });
}
var friend_id;

function addFriend(friend_id) {
    $.post("./Ajax/addFriend", {
        friend_id: friend_id
    }, function(data) {

        if (data == "true") {
            var result = document.getElementById(friend_id);
            result.classList.add('icon_hide');
        }
    })
}

var comment_input = document.getElementById("commentInput_input");
var comment_area = document.getElementById("cmtField");

function addComment(postid, inputid) {
    cmtContainerId = "cmtContainer_" + postid;
    comment = document.getElementById(inputid);
    comment_area = document.getElementById(cmtContainerId);

    if (comment.value != "") {
        $.post("./Ajax/addComment", {
            comment: comment.value,
            postid: postid
        }, function(data) {
            comment.value = "";
            $("#" + cmtContainerId).html(data)
        });

    }
}

function updateComment(postid) {
    comment_area = document.getElementById("cmtField");
    $.post("./Ajax/updateComment", {
        postid: postid
    }, function(data) {
        $("#cmtField").html(data);
    });
}

function searchFriendInDB() {
    var name = friend_search_input.value;
    if (name != "") {
        $.post("./Ajax/searchFriends", {
            search_friend: name
        }, function(data) {
            $("#friend_search_input").val("");
            $("#friend_search_area").html(data);
        });
    }
}




function showFriends() {
    $.post("./Ajax/showFriends", {
        // id = user_id; 
        // Để hiển thị các bài post mới là bạn của người dùng
    }, function(data) {
        $("#friendlist").html(data);
    });
}

function eraseCookieFromAllPaths(name) {

}

function logout() {
    eraseCookieFromAllPaths("messageUser")
    eraseCookieFromAllPaths("SNID")
    eraseCookieFromAllPaths("SNID_")
}
// setInterval(function() { updateChat() }, 500);

function ScrollDown() {
    setTimeout(() => {
        document.getElementById("message__area").scrollTo(0, document.getElementById("message__area").scrollHeight);
    }, 1500);
}

{
    function sendMsg() {

        let rocket = document.getElementsByClassName("body__chatBox-input-icon");
        rocket[0].classList.add("rocket-fly");
        console.log(rocket[0].classList);
        setTimeout(() => {
            rocket[0].classList.remove("rocket-fly")
        }, 250)
        sendmsg();
        setTimeout(() => {
            document.getElementById("message__area").scrollTo(0, document.getElementById("message__area").scrollHeight);
        }, 500)
    }
} {

    function friendChatting(receiver_id) {
        ScrollDown();
        // sendMsg();
        for (let i = 1; i < a.length - 3; i++) {
            a[i].style = "background-color: #323944bf";
            console.log(i);
        }
        document.getElementById(receiver_id).style = "background-color :#65676b";
        var receiver = receiver_id;
        alert(receiver)
    }
    let filter = document.getElementById("filter-container");
    let friendSearch = document.getElementsByClassName("friend__box-search");
    let searchInput = document.getElementById("search-input");
    let textArray = document.getElementsByClassName("menu-item-text");
    let iconhide = document.getElementsByClassName("menu-header");
    let barHint = true;

    function grow() {
        if (barHint == false) {
            setTimeout(() => {
                filter.style.animation = "filter-off 0.5s ease forwards";
                setTimeout(() => {
                    filter.style.zIndex = "-999";
                }, 300)
            }, 300);
            setTimeout(() => {
                signupField[0].style = "";
                filter.style = "";
                filter.style.display = "none";
            }, 1000);
            friendContainer[0].classList.add("height-0");
            friendSearch[0].style.opacity = "0";
            hide = true;
            document.getElementById("nagication-bar").classList.add("menu-small");
            document.getElementById("icon-hint").style.transform = "rotate(180deg)";
            document.getElementsByClassName("menu-item-text");
            barHint = true;
            searchInput.style.padding = "0 0 0 0";
            for (let i = 0; i < textArray.length; i++) {
                textArray[i].classList.add("text-hide");
            }
        } else {
            filter.style.display = "block";
            setTimeout(() => {
                filter.style.zIndex = "19";
                filter.style.animation = "filter-on 0.3s ease forwards";
            }, 100);
            document.getElementById("nagication-bar").classList.remove("menu-small");
            document.getElementById("icon-hint").style.transform = "rotate(0deg)";
            iconhide[0].classList.add("icon-hide_2");
            searchInput.style.padding = "0 10px 0 45px";
            for (let i = 0; i < textArray.length; i++) {
                setTimeout(() => {
                    textArray[i].classList.remove("text-hide");
                }, 250);
            }
            barHint = false;
        }
    }
    // [0].style.display = "none";
    function growSearch() {
        if (barHint == true) {
            grow();
        }
    }

    // let friendSearch = document.getElementsByClassName("friend__box-search");
    let friendContainer = document.getElementsByClassName(
        "friend__box-container"
    );
    let hide = true;

    function searchFriend() {
        if (hide === true && barHint === true) {
            grow();
            setTimeout(() => {
                friendContainer[0].classList.remove("height-0");
                setTimeout(() => {
                    friendSearch[0].style.opacity = "1";
                }, 100);
            }, 200);
            friendSearch[0].style.display = "inline-block";
            hide = false;
        } else if (hide === true && barHint === false) {
            friendSearch[0].style.display = "inline-block";

            friendContainer[0].classList.remove("height-0");
            setTimeout(() => {
                friendSearch[0].style.opacity = "1";
            }, 100);
            hide = false;
        } else if (hide === false && barHint === false) {
            friendContainer[0].classList.add("height-0");
            friendSearch[0].style.opacity = "0";
            setTimeout(() => {
                friendSearch[0].style.display = "none";
            }, 300);
            hide = true;
        }

    }
}
// menu-left animation
{
    function getID(oObject) {
        var id = oObject.id;
        // message__area.scrollTop = message__area.scrollHeight;

        return id;

    }

    function refreshFriendlist() {
        let friendItem = document.getElementsByClassName("body__left-item");
        let n = friendItem.length;
        for (let i = 0; i < n; i++) {
            // thêm function cho friend item.
            friendItem[i].addEventListener("click", () => {
                for (let j = 0; j < n; j++) {
                    friendItem[j].classList.remove("friend-item-focus");
                }
                friendItem[i].classList.add("friend-item-focus");
                let currFriend = document.getElementById("current-friend");
                let friendImage = friendItem[i].childNodes[1].src.toString();
                let currFriendName = document.getElementById(
                    "current-friend-name"
                );
                // console.log(currFriend.src);
                {
                    currFriend.style.animation = "fade-out-in 0.4s ease forwards";
                    currFriendName.style.animation =
                        "fade-out-in 0.4s ease forwards";

                    setTimeout(() => {
                        currFriend.src = friendImage;
                        currFriendName.innerHTML =
                            friendItem[i].childNodes[3].innerHTML;
                    }, 200);
                    setTimeout(() => {
                        currFriend.style.animation = "";
                        currFriendName.style.animation = "";
                    }, 400);
                }
                let nameRegex = new RegExp(">" + "." + "<");
                // console.log(nameRegex);
                // let name = ;
                // console.log(friendItem[i].childNodes[3]);
                var receiver = getReceiver(getID(friendItem[i]));
                updateChat();
                //message readed
                message_read(receiver);
            });
        }
    }

}


{
    let option = document.getElementById('option-chatbox')
    let messArr = document.getElementsByClassName('body__chatBox-msgArea-item')

    function cbOption(event) {
        if (!event.target.classList.contains('body__chatBox-msgArea')) {
            if (option.style.opacity != '1') {
                for (let i = 0; i < messArr.length; i++) {
                    messArr[i].style.opacity = '0'
                    setTimeout(() => {
                        messArr[i].style.display = 'none'
                    }, 200)
                }
                option.style.display = 'flex'
                setTimeout(() => {
                    option.style.opacity = '1'
                }, 200)
            } else {
                option.style.opacity = '0'
                setTimeout(() => {
                    option.style.display = 'none'
                }, 200)
                for (let i = 0; i < messArr.length; i++) {
                    messArr[i].style.display = 'flex'
                    setTimeout(() => {
                        messArr[i].style.opacity = '1'
                    }, 200)
                }
            }
        } else if (option.style.opacity == '1') {
            option.style.opacity = '0'
            setTimeout(() => {
                option.style.display = 'none'
            }, 200)
            for (let i = 0; i < messArr.length; i++) {
                messArr[i].style.display = 'flex'
                setTimeout(() => {
                    messArr[i].style.opacity = '1'
                }, 200)
            }
        }
    }
}

refreshFriendlist()





function constructUser() {
    $.post("./Ajax/getUser", {
        // id = user_id; 
        // Để hiển thị các bài post mới là bạn của người dùng
    }, function(data) {
        if (data != "false" && data != "") {
            var response = data.split("///");
            $('#body__chatBox-header').html(response[0]);
            receiver = response[1];
            updateChat();
        }
    });
}


function message_read(id) {

    $.post("./Ajax/setMessageRead", {
        sender: id
            // Để hiển thị các bài post mới là bạn của người dùng
    }, function(data) {

        $(data).css({
            "opacity": 0
        })
    });
}

function seeProfile(name) {

}