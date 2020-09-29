$ = jQuery.noConflict();

$(document).ready(function () {

    //Because the gallery is created from wp gallery, this is a way to override the attributes and implement fluidbox
    $('.gallery-item dt a').on('click', (e) => {
        e.preventDefault()
        let img = e.currentTarget.firstChild.firstChild;
        let src = $(img).attr('src') + '';
        $('.gallery-item dt a').attr('href', src);

    })
    $(function () {
        $('.gallery-item dt a').fluidbox();
    })

    // responsive menu
    if ($(document).width() <= 768) {
        $("nav.main-nav").hide();
    }
    $(window).resize(e => {
        if ($(document).width() <= 768) {
            $("nav.main-nav").hide();
        } else {
            $("nav.main-nav").show();
        }
    })

    $(".mobile").on("click", () => {
        console.log("clicked")
        $("nav.main-nav").toggle("ease");
    })

    //bxSlider for home page
    $(".slider").bxSlider({
        mode: "fade",
    });

})