$(document).ready(function() {
    mResize();
})


$(window).resize(function() {
    mResize();
    $('.control').html($(window).width() + ' :: ' + $(window).height());
});

function mResize() {
    var width = $(window).width();
    if (width < 400) {
        console.log('<400')
        $('.wrap').css('display', 'none');
        $('.mwrap').css('display', 'block');
    } else {
        console.log('>400')
        $('.wrap').css('display', 'block');
        $('.mwrap').css('display', 'none');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, ['isOpen', true]);
    console.log(instances)
});