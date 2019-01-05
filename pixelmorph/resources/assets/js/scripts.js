$(document).ready(function() {
    mResize();
})

var rId;
$(window).resize(function() {
    clearTimeout(rId);
    rId = setTimeout(mResize, 500);
    //$('.control').html($(window).width() + ' :: ' + $(window).height());
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, ['isOpen', true]);
});