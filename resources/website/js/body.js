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
    signOut();
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

window.$readURL = function (input, callback) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            callback(e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
};

function signOut() {
    $('.btn-sign-out').click(function () {
        Swal.fire({
            'icon': 'question',
            title: 'Are you sure to sign out?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sign Out',
            cancelButtonText: 'Cancel',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('data-url');
            }
        })
    });
}