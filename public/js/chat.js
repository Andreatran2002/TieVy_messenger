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
} // menu-left animation
{
    function getID(oObject) {
        var id = oObject.id;
        // message__area.scrollTop = message__area.scrollHeight;

        return id;

    }

    function refreshFriendlist() {
        let friendItem = document.getElementsByClassName('body__left-item')
        let avatar = document.getElementById('option-avatar')
        let name = document.getElementById('option-username')
        let option = document.getElementById('option-chatbox')
        let messArr = document.getElementsByClassName('body__chatBox-msgArea-item')

        let n = friendItem.length
        for (let i = 0; i < n; i++) {
            friendItem[i].addEventListener('click', (e) => {
                option.style.opacity = '0'
                for (let i = 0; i < messArr.length; i++) {
                    messArr[i].style.display = 'flex'
                    setTimeout(() => {
                        messArr[i].style.opacity = '1'
                    }, 200)
                }
                setTimeout(() => {
                    option.style.display = 'none'
                    avatar.src = friendItem[i].childNodes[1].src
                    name.innerHTML = e.target.childNodes[3].innerHTML
                }, 200)

                for (let j = 0; j < n; j++) {
                    friendItem[j].classList.remove('friend-item-focus')
                }
                friendItem[i].classList.add('friend-item-focus')
                let currFriend = document.getElementById('current-friend')
                let friendImage = friendItem[i].childNodes[1].src.toString()
                let currFriendName = document.getElementById('current-friend-name')
                    // console.log(currFriend.src);
                    {
                        currFriend.style.animation = 'fade-out-in 0.4s ease forwards'
                        currFriendName.style.animation = 'fade-out-in 0.4s ease forwards'

                        setTimeout(() => {
                            currFriend.src = friendImage
                            currFriendName.innerHTML = friendItem[i].childNodes[3].innerHTML
                        }, 200)
                        setTimeout(() => {
                            currFriend.style.animation = ''
                            currFriendName.style.animation = ''
                        }, 400)
                    }
                let nameRegex = new RegExp('>' + '.' + '<')
                    // console.log(nameRegex);
                    // let name = ;
                    // console.log(friendItem[i].childNodes[3]);
                var receiver = getReceiver(getID(friendItem[i]));
                updateChat();
                //message readed
                message_read(receiver);
            })
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

function addSuccess(e) {
    e.target.style.opacity = '0'
}

refreshFriendlist();
Pusher.logToConsole = true;

var pusher = new Pusher('6d26d8d2ff0bf9b79d49', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));

    if (data['request'] == "message") {
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



});