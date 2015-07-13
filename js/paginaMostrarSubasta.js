function scrollToAnchor(aid){
    var div = $("#"+ aid);
    $('html,body').animate({scrollTop: div.offset().top-70},'slow');
}
$(document).ready(function () {
    var topOfOthDiv = $("#containerComentarios").offset().top;
    $(window).scroll(function () {
        // if (($(window).scrollTop()+$(window).height()+50) < topOfOthDiv) {
        if ($(window).scrollTop()==0){
            $("#viewCommentsButton").fadeIn();
        } else {
            $("#viewCommentsButton").fadeOut();
        }
    });
});