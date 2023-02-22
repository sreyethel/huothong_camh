feather.replace();
Alpine.start();
AOS.init();

$(window).scroll(function () {
    var scroll = $(this).scrollTop();
    var height = $('.navbar').height();
    if (scroll > height + 200) {
        $('.isFixed').addClass('is_sticky');
    } else {
        $('.isFixed').removeClass('is_sticky');
    }

    if (scroll) {
        $('#toTop').addClass("reveal");
    } else {
        $('#toTop').removeClass("reveal");
    }
});

$(document).ready(function () {
    scrollTop();
    lazyLoad();
    isSticky();
    clickEvent();
});

function isSticky() {
    var height = $('.isFixed').height();
    $(this).scrollTop() > height ? $('.isFixed').addClass('is_sticky') : $('.isFixed').removeClass(
        'is_sticky');

    $('.header-fixed').css('height', height + 'px');
}

function scrollTop() {
    $('#toTop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
}

function lazyLoad() {
    new LazyLoad({
        elements_selector: ".lazy",
        callback_error: (img) => {
            img.setAttribute("srcset", "https://via.placeholder.com/300x300?text=Image+not+found");
            img.setAttribute("src", "https://via.placeholder.com/300x300?text=Image+not+found");
        }
    });
}

function clickEvent() {
    $('body').on('click', '[page-link]', function () {
        location.href = $(this).attr('page-link');
    });

    $('body').on('click', '[open-link]', function () {
        window.open($(this).attr('open-link'));
    });
}

// Image preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
});