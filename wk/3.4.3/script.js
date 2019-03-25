$(document).ready(function() {
$("a").attr("target", "_blank");
});

$(".dropdown").hover(function() {
    $(".websites").slideDown("fast");
},function() {
    $(".websites").slideUp("fast");
}
)