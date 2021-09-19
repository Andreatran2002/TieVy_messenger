function updateLike(postid, status) {

    $.post("./Ajax/updateLike", {
        id: postid,
        status: status
            // Để hiển thị các bài post mới là bạn của người dùng
    }, function(data) {

    });
}
let btnNewPost = () => {
    document.getElementsByClassName("timeNew__body")[0].scrollTo({
        top: 0,
        behavior: "smooth",
    });
    setTimeout(() => {
        document.getElementsByClassName("status__input")[0].focus();
    }, 700);
    P
};

let openCmtField = (event) => {
    let cmtField = event.target.parentNode.lastElementChild;
    if (cmtField.style.opacity != "1" && cmtField.style.height != "350px") {
        cmtField.style.height = "350px";
        setTimeout(() => {
            cmtField.style.opacity = "1";
        }, 200);
    } else {
        cmtField.style.opacity = "0";
        setTimeout(() => {
            cmtField.style.height = "0";
        }, 200);
    }
};

let turnOnOptionPost = (event) => {
    let option = event.target.parentNode.lastElementChild;
    if (option.style.display != "block") {
        option.style.display = "block";
        setTimeout(() => {
            option.style.opacity = "1";
        }, 200);
    } else {
        option.style.opacity = "0";
        setTimeout(() => {
            option.style.display = "none";
        }, 200);
    }
};

let like = (event) => {
    let btnLike = event.target;
    let arrBtn = btnLike.parentNode.childNodes;
    if (btnLike.classList.contains("post__footer-btnLike")) {
        if (btnLike.style.color != "white") {
            btnLike.style.color = "white";
            arrBtn[3].style.color = "";
        } else {
            btnLike.style.color = "";
        }
    } else {
        if (btnLike.style.color != "white") {
            btnLike.style.color = "white";
            arrBtn[1].style.color = "";
        } else btnLike.style.color = "";
    }
};

function loadFile(event) {
    console.log(URL.createObjectURL(event.target.files[0]));
    let ouput = document.getElementById("output");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src);
    };
}