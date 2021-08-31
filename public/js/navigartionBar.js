let filter = document.getElementById('filter-container')
let friendSearch = document.getElementsByClassName('friend__box-search')
let searchInput = document.getElementById('search-input')
let textArray = document.getElementsByClassName('menu-item-text')
let iconhide = document.getElementsByClassName('menu-header')
let infoField = document.getElementsByClassName('notiList')[0]
let barHint = true

infoField.style.opacity = '0'
infoField.style.display = 'none'

function openInformation() {
    if (barHint == true) {
        if (infoField.style.opacity == '0' && infoField.style.display == 'none') {
            grow()
            infoField.style.display = 'flex'
            setTimeout(() => {
                infoField.style.opacity = '1'
            }, 100)
        } else {
            grow()
            infoField.style.opacity = '0'
            setTimeout(() => {
                infoField.style.display = 'none'
            }, 200)
        }
    } else {
        if (infoField.style.opacity == '0' && infoField.style.display == 'none') {
            infoField.style.display = 'flex'
            setTimeout(() => {
                infoField.style.opacity = '1'
            }, 100)
        } else {
            grow()
            infoField.style.opacity = '0'
            setTimeout(() => {
                infoField.style.display = 'none'
            }, 200)
        }
    }
}

function grow() {
    if (barHint == false) {
        infoField.style.opacity = '0'
        setTimeout(() => {
            infoField.style.display = 'none'
        }, 200)
        setTimeout(() => {
            filter.style.animation = 'filter-off 0.5s ease forwards'
            setTimeout(() => {
                filter.style.zIndex = '-999'
            }, 300)
        }, 300)
        setTimeout(() => {
            signupField[0].style = ''
            filter.style = ''
            filter.style.display = 'none'
        }, 1000)
        friendContainer[0].classList.add('height-0')
        friendSearch[0].style.opacity = '0'
        hide = true
        document.getElementById('nagication-bar').classList.add('menu-small')
        document.getElementById('icon-hint').style.transform = 'rotate(180deg)'
        document.getElementsByClassName('menu-item-text')
        barHint = true
        searchInput.style.padding = '0 0 0 0'
        for (let i = 0; i < textArray.length; i++) {
            textArray[i].classList.add('text-hide')
        }
    } else {
        filter.style.display = 'block'
        setTimeout(() => {
            filter.style.zIndex = '19'
            filter.style.animation = 'filter-on 0.3s ease forwards'
        }, 100)
        document.getElementById('nagication-bar').classList.remove('menu-small')
        document.getElementById('icon-hint').style.transform = 'rotate(0deg)'
        iconhide[0].classList.add('icon-hide_2')
        searchInput.style.padding = '0 10px 0 45px'
        for (let i = 0; i < textArray.length; i++) {
            setTimeout(() => {
                textArray[i].classList.remove('text-hide')
            }, 250)
        }
        barHint = false
    }
}
// [0].style.display = "none";
function growSearch() {
    if (barHint == true) {
        grow()
    }
}

// let friendSearch = document.getElementsByClassName("friend__box-search");
let friendContainer = document.getElementsByClassName('friend__box-container')
let hide = true

function searchFriend() {
    if (hide === true && barHint === true) {
        grow()
        setTimeout(() => {
            friendContainer[0].classList.remove('height-0')
            setTimeout(() => {
                friendSearch[0].style.opacity = '1'
            }, 100)
        }, 200)
        friendSearch[0].style.display = 'inline-block'
        hide = false
    } else if (hide === true && barHint === false) {
        friendContainer[0].classList.remove('height-0')
        setTimeout(() => {
            friendSearch[0].style.opacity = '1'
        }, 100)
        friendSearch[0].style.display = 'inline-block'
        hide = false
    } else if (hide === false && barHint === false) {
        friendContainer[0].classList.add('height-0')
        friendSearch[0].style.opacity = '0'
        setTimeout(() => {
            friendSearch[0].style.display = 'none'
        }, 300)
        hide = true
    }
}
(function notiCount() {
    let numOfNoti = document.getElementsByClassName("notiList__item").length
    document.getElementById("notifications-num").innerHTML = numOfNoti
})()