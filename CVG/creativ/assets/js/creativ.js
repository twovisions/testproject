(function ($) {
    Drupal.behaviors.creativ_theme = {
        attach: function (context, settings) {
            $('.search-toggle').once('search', function () {
                $(this).click(function () {
                    $('body').toggleClass('search-open');
                });
            });
            /* Fix column sibling height */
            $(".data-height-fix").each(function () {
                var siblingHeight = $(this).find($(".get-height")).outerHeight();
                $(".set-height").css("height", siblingHeight);
            });
            $("a[rel^='prettyPhoto']").prettyPhoto();
            /* Tooltips */
            if ($().tooltip) {
                $("[data-toggle='tooltip']").tooltip();
            }
            /* Popovers */
            if ($().popover) {
                $("[data-toggle='popover']").popover();
            }
            /*Fix add cart icon*/
            $("h3 i.fa-shopping-cart").click(function () {
                $(this).parent().next().find("form").submit();
            });
        }
    }
    var equalizer = function() {
        $(".equalizer").each(function () {
            var getHeight = $(this).find($(".get-height")).height();
            $(".set-height").css("height", getHeight);
        });
    }
    $(window).load(function () {
        equalizer();
       $(".preloader_1").delay(300).fadeOut();
       $("#loader").delay(600).fadeOut("slow");
    });
    setTimeout(function(){
        $(".preloader_1").delay(300).fadeOut();
        $("#loader").delay(600).fadeOut("slow");
    },10000);
})(jQuery);

jQuery(document).ready(function ($) {
    "use strict";
    if (detectIE() > 1) {
        $('body').addClass('ie');
    }
    if (!$('#section-introduction .region').hasClass('region-banner')) {
        $('#section-introduction').addClass('no-banner');
    }
    $('.dexp-fading').each(function () {
        var $this = $(this);
        var $slides = [];
        $this.find('> *').each(function (index) {
            $(this).wrap('<div>');
            $slides[index] = $(this).parent().html();
            $(this).remove();
        });
        var counter = 1;
        $this.html($slides[0]).removeClass('fadeout');
        setInterval(function () {
            $this.addClass('fadeout');
            setTimeout(function () {
                $this.html($slides[counter = (counter + 1) % $slides.length]).removeClass('fadeout');
            }, 500);
        }, 5000);
    });

    var el = $('.rotate');
    var array = [];
    $.each(el.text().split(","), function (key, value) {
        array.push(value);
    });
    el.text(array[0]);

    var rotate = function () {
        el.animate({
            opacity: 0
        }, 500, function () {
            var index = $.inArray(el.text(), array);
            if ((index + 1) === array.length)
                index = -1;
            el.text(array[index + 1]).animate({
                opacity: 1
            }, 500);
        });
    };
    setInterval(rotate, 3000);
    /*Go to top*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#go-to-top').css({
                bottom: "-1px"
            });
        } else {
            $('#go-to-top').css({
                bottom: "-100px"
            });
        }
    });
    $('#go-to-top').click(function () {
        $('html, body').animate({
            scrollTop: '0px'
        }, 800);
        return false;
    });
});

jQuery.fn.cleardefault = function () {
    return this.focus(function () {
        if (this.value == this.defaultValue) {
            this.value = "";
        }
    }).blur(function () {
        if (!this.value.length) {
            this.value = this.defaultValue;
        }
    });
};
function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        /* IE 10 or older => return version number*/
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    if (trident > 0) {
        /* IE 11 (or newer) => return version number*/
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }
    /* other browser*/
    return false;
}
