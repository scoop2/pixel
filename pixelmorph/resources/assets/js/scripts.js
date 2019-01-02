/*
mResize();

$(window).resize(function() {
    mResize();
    $('.control').html($(window).width() + ' :: ' + $(window).height());
});

function mResize() {
    var width = $(window).width();
    if (width < 400) {
        $('.wrap').css('display', 'none');
        $('.mwrap').css('display', 'block');
    } else {
        $('.wrap').css('display', 'block');
        $('.mwrap').css('display', 'none');
    }
}
*/