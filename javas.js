function urlEng() {
    document.getElementsByName('eng')[0].value =
            document.getElementsByClassName('entry-content wp-block-post-content has-global-padding is-layout-constrained')[0].innerText;
    document.getElementsByName('url')[1].value = document.getElementsByClassName('notranslate')[0].innerText;
}

function urlRus() {
    document.getElementsByName('rus')[0].value =
            document.getElementsByClassName('entry-content wp-block-post-content has-global-padding is-layout-constrained')[0].innerText;
    document.getElementsByName('url')[2].value = document.getElementsByClassName('notranslate')[0].innerText;
}

function zagr() {
    if (document.getElementsByClassName('id')[0].innerText == 'url') {
        document.getElementById('engk').click();
    } else if (document.getElementsByClassName('id')[0].innerText == 'eng') {
        document.getElementById('botk').click();
    } else if (document.getElementsByClassName('id')[0].innerText == 'eng (нет русских символов)') {
        document.getElementById('botk').click();
    } else if (document.getElementsByClassName('id')[0].innerText == 'rus') {
        document.getElementById('nexk').click();
    }
}


