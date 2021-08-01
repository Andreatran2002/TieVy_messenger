let btnCmt = document.getElementsByClassName("post__footer-btncmt");
let cmtField = document.getElementsByClassName("cmtField");
let n = cmtField.length;
console.log(cmtField);
let check = [];
for (let i = 0; i < n; i++) {
  check.push(false);
}
console.log(check);
function refreshCmt() {
  for (let i = 0; i < n; i++) {
    btnCmt[i].addEventListener("click", () => {
      if (check[i] === false) {
        cmtField[i].style.display = "flex";
        setTimeout(() => {
          cmtField[i].style.height = "350px";
          setTimeout(() => {
            cmtField[i].style.opacity = "1";
          }, 300);
        }, 200);
        check[i] = true;
        console.log(check[i]);
      } else if (check[i] === true) {
        // alert("lala");
        cmtField[i].style.opacity = "0";
        setTimeout(() => {
          cmtField[i].style.height = "0px";
          setTimeout(() => {
            cmtField[i].style.display = "none";
          }, 300);
        }, 300);
        check[i] = false;
      }
    });
  }
}
function refreshLike() {
  let btn = document.getElementsByClassName("btn");
  console.log(btn);
  let n = btn.length;
  let check = [];
  console.log(btn[0].classList[0]);
  for (let i = 0; i < n; i++) {
    check.push(false);
  }
  for (let i = 0; i < n; i++) {
    btn[i].addEventListener("click", () => {
      if (btn[i].classList[0] == "post__footer-btnLike") {
        if (check[i] === false) {
          btn[i].style.color = "greenyellow";
          btn[i + 1].style.color = "inherit";
          check[i] = true;
          check[i + 1] = false;
        } else if (check[i] === true) {
          btn[i].style.color = "inherit";
          check[i] = false;
        }
      } else if (btn[i].classList[0] == "post__footer-btnDisLike") {
        if (check[i] === false) {
          btn[i].style.color = "red";
          btn[i - 1].style.color = "inherit";
          check[i] = true;
          check[i - x1] = false;
        } else if (check[i] === true) {
          btn[i].style.color = "inherit";
          check[i] = false;
        }
      }
    });
  }
}
// setInterval(() => {
  refreshCmt();
  refreshLike();
// },1000)
