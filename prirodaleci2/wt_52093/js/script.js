// Smooth scroll blocking
document.addEventListener('DOMContentLoaded', function() {
    if ('onwheel' in document) {
        window.onwheel = function(event) {
            if (typeof(this.RDSmoothScroll) !== undefined) {
                try { window.removeEventListener('DOMMouseScroll', this.RDSmoothScroll.prototype.onWheel); } catch (error) {}
                event.stopPropagation();
            }
        };
    } else if ('onmousewheel' in document) {
        window.onmousewheel = function(event) {
            if (typeof(this.RDSmoothScroll) !== undefined) {
                try { window.removeEventListener('onmousewheel', this.RDSmoothScroll.prototype.onWheel); } catch (error) {}
                event.stopPropagation();
            }
        };
    }

    try { $('body').unmousewheel(); } catch (error) {}
});

function include(url) {
    document.write('<script src="' + url + '"></script>');
    return false;
}

/* cookie.JS
 ========================================================*/
include('js/jquery.cookie.js');


/* DEVICE.JS
 ========================================================*/
include('js/device.min.js');

/* Stick up menu
 ========================================================*/
include('js/tmstickup.js');
$(window).load(function() {
    if ($('html').hasClass('desktop')) {
        $('#stuck_container').TMStickUp({})
    }
});

/* Easing library
 ========================================================*/
include('js/jquery.easing.1.3.js');


/* ToTop
 ========================================================*/
include('js/jquery.ui.totop.js');
$(function() {
    $().UItoTop({ easingType: 'easeOutQuart' });
});



/* DEVICE.JS AND SMOOTH SCROLLIG
 ========================================================*/
include('js/jquery.mousewheel.min.js');
include('js/jquery.simplr.smoothscroll.min.js');
$(function() {
    if ($('html').hasClass('desktop')) {
        $.srSmoothscroll({
            step: 150,
            speed: 800
        });
    }
});

/* Copyright Year
 ========================================================*/
var currentYear = (new Date).getFullYear();
$(document).ready(function() {
    $("#copyright-year").text((new Date).getFullYear());
});


/* Superfish menu
 ========================================================*/
include('js/superfish.js');
include('js/jquery.mobilemenu.js');


/* Orientation tablet fix
 ========================================================*/
$(function() {
    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function() {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },

        scaleFix = function() {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };

    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM)
        if (!result) {
            $('.sf-menu li').each(function() {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function() {
                            return false;
                        },
                        function() {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');

$(document).ready(function() {
    if ($('#camera01').length > 0) {
        $('#camera01').camera({
            height: '36.82291667%',
            playPause: false,
            loader: 'none',
            navigation: true,
            pagination: false,
            fx: 'simpleFade'
        });
    }
    if ($('.various').length > 0) {
        $(".various").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });
        $(".fancybox").fancybox();
    }

    $("#search-button").click(function() {
        $("#search").toggle("normal");
    });


    $(function() {
        if ($('#accordion').length > 0) {
            $("#accordion").accordion({
                heightStyle: 'content'
            });
        }
    });

    $("#prev-btn").click(function() {
        owl.trigger('owl.prev');
        return false;
    });
    $("#next-btn").click(function() {
        owl.trigger('owl.next');
        return false;
    });
});