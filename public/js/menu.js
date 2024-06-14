document.getElementById('btn-open-close').addEventListener('click', open_close_menu);

var side_menu = document.getElementById('menu-side');
var btn_open_close = document.getElementById('btn-open-close');
var body = document.getElementById('body');

function open_close_menu() {
    body.classList.toggle('body-move');
    side_menu.classList.toggle('menu-side-move');
}

window.addEventListener('resize', function() {
    if(window.innerWidth > 760) {
        body.classList.remove('body-move');
        side_menu.classList.remove('menu-side-move');
    }

    if (window.innerWidth < 760) {
        body.classList.add('body-move');
        side_menu.classList.add('menu-side-move');
    }
});