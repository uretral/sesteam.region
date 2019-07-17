$(document).scroll(function(){

    let s = $(document).scrollTop();
    if($(document).scrollTop() > 20){
        $('.header').addClass('scroll');
    } else {
        $('.header').removeClass('scroll');
    }
    if($(document).scrollTop() > 140){
        $('.pest-menu-callback').addClass('scrolled')
    } else {
        $('.pest-menu-callback').removeClass('scrolled')
    }
});



$(document).ready(function(){

    $(document).on('click','.root',function(e){
        $('.sub-menu').hide();
        $(this).find('.sub-menu').show();
        e.stopPropagation();
    });
    $(document).on('change','[rel="region-links"]',function(){
        location.href = 'http://'+$(this).val()

    });

    $(document).on('click','[for="topMenuSwitcher"]',function(){
        var ch = $('#topMenuSwitcher').prop('checked');
        if(!ch){
            $('body').css('overflow','hidden')
        } else {
            $('body').css('overflow','scroll')
        }

    });







    $(document).on('click','body',function(){
        $('.sub-menu').hide();
    });


    $("[type='tel']").inputmask("+7 (999) 999 99 99");

    $(document).on('click','#clock',function(){

        $('#callback').find('[name="discount"]').val('со скидкой');
        $('.red-callback').click();

    });


    $('#callback').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#callback').serialize(),
            success: function(data){
                $(document).find('.callback-form').html('<p>Ваша заявка успешно отправлена, мы свяжемся с вами в ближайшее время </p>');
            },
            error: function (jqXHR, exception) {
                $(document).find('.callback-form').html('<p>Извините, произошла ошибка - попробуйте обновить страницу  </p>');
            },
        });
    });

    $('#aside_form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#aside_form').serialize(),
            success: function(data){
                $(document).find('.aside-call').html('<p>Ваша заявка успешно отправлена, мы свяжемся с вами в ближайшее время </p>');
            },
            error: function (jqXHR, exception) {
                $(document).find('.aside-call').html('<p>Извините, произошла ошибка - попробуйте обновить страницу  </p>');

            },
        });
    });

    $('#specialist').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#specialist').serialize(),
            success: function(data){
                $(document).find('#specialist').html('<p>Ваша заявка успешно отправлена, мы свяжемся с вами в ближайшее время </p>');
            },
            error: function (jqXHR, exception) {
                $(document).find('#specialist').html('<p>Извините, произошла ошибка - попробуйте обновить страницу  </p>');

            },
        });
    });

    $('#feedback').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#feedback').serialize(),
            success: function(data){
                console.log(data);
                $(document).find('#feedback').html('<p>Ваша заявка успешно отправлена, мы свяжемся с вами в ближайшее время </p>');
            },
            error: function (jqXHR, exception) {
                $(document).find('#feedback').html('<p>Извините, произошла ошибка - попробуйте обновить страницу  </p>');

            },
        });



    });
});

$(document).on('click','.modal-close',function(){
    $(document).find('.modal').hide();
    $('body').css('overflow','auto')
});
$(document).on('click','[rel="modal"]',function(){
    $(document).find('.modal').show();
    $('body').css('overflow','hidden');
    var action = $(this).attr('data-action');
    // $.ajax({
    //     type: "POST",
    //     url: "/gratitude",
    //     data: { 'data': cardData}
    // }).success(function( data ) {
    //     $('#tag').html(data);
    // });


});
/*
function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    var remain = minutes + seconds;
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds,
        'remain': remain
    };
}

function initializeClock(id, endtime) {
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);



        if (t.total <= 0) {

            $(document).find('#clock').detach();
            clearInterval(timeinterval);

        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

var deadline="January 01 2018 00:00:00 GMT+0300"; //for Ukraine
var deadline = new Date(Date.parse(new Date()) + 15  * 60 * 1000); // for endless timer

initializeClock('clock', deadline);
*/

$(".carousel").owlCarousel({
    items:             3,

    // 5 блоков на компьютерах (экран от 1400px до 901px)
    itemsDesktop:      [1400, 3],

    // 3 блока на маленьких компьютерах (экран от 900px до 601px)
    itemsDesktopSmall: [900, 2],

    // 2 элемента на планшетах (экран от 600 до 480 пикселей)
    itemsTablet:       [600, 1],

    // Настройки для телефона отключены, в этом случае будут
    // использованы настройки планшета
    itemsMobile:       [480, 1],
    pagination: true
});


