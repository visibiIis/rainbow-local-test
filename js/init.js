
function editHeightChildPhotoCont() {

    if (innerWidth > 1024) {
        var childResultHeaderH = jQuery('.chlid-result-header').outerHeight();
        var childResultArticleH = jQuery('.chlid-result-article').outerHeight();

        jQuery('.chlid-result-header-photo').height(childResultArticleH + childResultHeaderH);
    } 
    return false;
}


jQuery(document).ready(function() {
    editHeightChildPhotoCont();

// изменение разметки календаря для телефонов (Даниил Б)

if (window.innerWidth <= 320)
{
    $('.calendar-win').find('h2').text('Расписание');

    $('.calendar-win').find('.calendar-slider').empty();
    $('.calendar-win').find('.calendar-slider').append('<div class="calendar-slider-slide"><table><tr><th>Понедельник</th><th>Вторник</th></tr><tr><td></td><td></td></tr><tr><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td><td></td></tr><tr><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td><td></td></tr><tr><td></td><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td></tr><tr><td></td><td></td></tr></table></div><div class="calendar-slider-slide"><table><tr><th>Среда</th><th>Четверг</th></tr><tr><td></td><td></td></tr><tr><td></td><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td></tr><tr><td></td><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td></tr><tr><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td><td></td></tr><tr><td></td><td></td></tr></table></div><div class="calendar-slider-slide"><table><tr><th>Пятница</th><th>Суббота</th></tr><tr><td></td><td></td></tr><tr><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td></tr><tr><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td><td class="module-day">Модуль <span class="module-number">1</span>. <span class="module-time">c <span class="module-time-start">16</span> до <span class="module-time-start">18</span> </span><span class="module-age">(7-9лет)</span> </td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table></div><div class="calendar-slider-slide"><table><tr><th>Воскресенье</th></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table></div>');
}

// изменение дней нидели в календаре для планшетов (Даниил Б)

if (window.innerWidth <= 1024 && window.innerWidth < 320) 
{
    console.log('priv 768');
    var sliders = $('.calendar-win').find('.calendar-slider-slide'),
        sliderIndex = 0;

    for (sliderIndex; sliderIndex < sliders.length; ++sliderIndex)
    {
      $(sliders[sliderIndex]).find('th:eq(0)').text('ПН');
      $(sliders[sliderIndex]).find('th:eq(1)').text('ВТ');
      $(sliders[sliderIndex]).find('th:eq(2)').text('СР');
      $(sliders[sliderIndex]).find('th:eq(3)').text('ЧТ');
      $(sliders[sliderIndex]).find('th:eq(4)').text('ПТ');
      $(sliders[sliderIndex]).find('th:eq(5)').text('СБ');
      $(sliders[sliderIndex]).find('th:eq(6)').text('ВС');
    }
}

//скрипты вызова окна смены пароля

jQuery('.profile-menu-password').click(function(e) {
   e.preventDefault();
   if (jQuery('.modal-win-shadow').length == 0) {
        jQuery('body').append('<div class="win-callback-modal modal-win-shadow"></div>');

    } else {
        jQuery('.win-callback-modal').show();
    }
    jQuery('.password-reset').fadeIn();
});

jQuery('.password-reset').find('.closeCross').click(function() {
  jQuery('.password-reset, .modal-win-shadow:visible').fadeOut();
});



// Скрипты валидации и отправки формы смены пароля (ЛК)

jQuery('.password-reset-form').find('[type="password"]').blur(function() { // Проверяем пустое поле или нет

  var oldPassValidDesc = 'Введите старый пароль',
      newPassValidDesc = 'Введите новый пароль', 
      repeatPassValidDesc = 'Повторите пароль', 
      passValidDesc;

  if (jQuery(this).attr('name') == 'oldPassword' ) {
    passValidDesc = oldPassValidDesc;
  } else if (jQuery(this).attr('name') == 'newPassword') {
    passValidDesc = newPassValidDesc;
  } else {
    passValidDesc = repeatPassValidDesc;
  }


  if (jQuery(this).val() === '') {
    jQuery(this).after('<div class="wrong-input">' + passValidDesc + '</div>')
    jQuery('.password-reset-form').find('[type="submit"]').prop( "disabled", true );
  } else {
    jQuery(this).next('.wrong-input').remove(); 

    if (jQuery('.password-reset-form').find('.wrong-input').length == 0 ) {
      jQuery('.password-reset-form').find('[type="submit"]').prop( "disabled", false );
    }                 
  }

}).focus(function() { // удаляем сообщение валидации при фокусе

  jQuery(this).next('.wrong-input').remove();

}).end().submit(function (e) { // проверяем значения полей и отправляем форму с паролями

  //e.preventDefault();
   var emptyInput = false;
  jQuery(this).find('[type="password"]').each(function() {
   
    if(jQuery(this).val() == '') {
      alert('Заполните все поля');
      emptyInput = true;
      return false;
    }

  });
  if (!emptyInput) {
    if (jQuery('[name="newPassword"]').val() != jQuery('[name="repeatPassword"]').val()) {
      alert('Пароли не совпадают!');
      return false;
    } else {
      //alert('отправка');
      jQuery('.password-reset').fadeOut(function() {

        //показываем окно "пароль изменен"
        /*jQuery('.ok-button').find('button').click(function() {
          jQuery('.ok-button, .modal-win-shadow:visible').fadeOut();
        });
        jQuery('.ok-button').fadeIn(400);
        */
      });
      
     // когда будет бекенд - настроить аякс отправку формы
    }
  
 }

});
// end





// меняем шапку при проскроленной странице (надо вынести в отдельную функцию и вызывать при событиях риди и скролл)
  if(window.scrollY != 0) {
        if(jQuery('.scrolled').length == 0) {
                jQuery('.header').addClass('scrolled');

        } 
        if(jQuery('.noscrolled').length > 0) {
             jQuery('.header').removeClass('noscrolled');
        }

            jQuery('body').css('padding-top', '6.25vw');
        } else {

            if(jQuery('.noscrolled').length == 0) {
                jQuery('.header').addClass('noscrolled');
        } 
        if(jQuery('.scrolled').length > 0) {
             jQuery('.header').removeClass('scrolled');
        }
        jQuery('body').css('padding-top', 0);
    }

// фотослайдер
    if(jQuery('.main-photoslider').length > 0){
    jQuery('.main-photoslider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });
}
if(jQuery('.courses-page-slider').length > 0){
    jQuery('.courses-page-slider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });
}
    /*jQuery('.courses-slider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });*/
if(jQuery('.newsblog-photoslider').length > 0){
    jQuery('.newsblog-photoslider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });
}
// courses slider
if(jQuery('.courses-slider').length > 0){
    jQuery('.courses-slider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });
}
// rewiews slider
if(jQuery('.reviews-slider').length > 0){
    jQuery('.reviews-slider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false
    });
}
    
// слайдер учителей
if(jQuery('.teacher-slider').length > 0){
    jQuery('.teacher-slider').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false,
     responsive: [{
        breakpoint: 1025,
        settings: {
            slidesToShow : 2,
            slidesToScroll: 2,
            fade: false,
            speed: 800
         }
        },{

        breakpoint: 500,
        settings: {
            slidesToShow : 1,
            slidesToScroll: 1
         }
        }
        ]
  
    });
}

// слайдер модулей
if(jQuery('.modules-slider').length > 0){
    jQuery('.modules-slider').slick({
          // dots: true,
          infinite: true,
          speed: 300,
          slidesToShow: 4,
          slideToScroll: 1,
          adaptiveHeight: true,
          responsive: [{
            breakpoint: 1025,
            settings: {
                centerMode: true,
                centerPadding: '0%',
                slidesToShow : 3
            }
          },{
            breakpoint: 500,
            settings: {
                centerMode: false,
                slidesToShow : 1
            }
          }]
        });
}


            /*переход по ссылкам в результаты ученика на планшете/телефоне*/

            if(innerWidth < 1025) {
                jQuery('.results-article-title').click(function(){
                    jQuery(this).addClass('hoverResultTitle');
                    setTimeout(function(){
                        location.href = jQuery('.hoverResultTitle').find('.results-article-read-link').attr('href');
                    }, 800);

                    setTimeout(function(){
                        jQuery('.results-article-title.hoverResultTitle').removeClass('hoverResultTitle');
                    }, 900);
                })                
            }
/*
    if(innerWidth > 500 && innerWidth < 1025) {
        var sliderTrack = jQuery('.modules-slider').find('.slick-track');
        var trackWidth = sliderTrack.css('width');
        var slideCount = 0;
        var plusSlideWidth = 20.833333333333333333333333333333;
        sliderTrack.find('.modules-slider-slide').each(function() {
            slideCount++;
        });
        plusSlideWidth = plusSlideWidth * slideCount;
        
        var newWidth = 'calc(' + trackWidth +' + '+ plusSlideWidth + 'vw)';
        sliderTrack.css('minWidth', newWidth);
        console.log(trackWidth, slideCount, plusSlideWidth, newWidth, jQuery('.modules-slider').find('.slick-track').width());
        // width: calc(100% - 80px);
    }*/
   /* jQuery('.calendar-slider').slick({
     // dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear'
     // arrows: false
    });*/


// скрипты для личного квбинета
    if (!($("#is_logged_in").length > 0)){
        jQuery('.user-cabinet-trigger').click(function(e){
            e.preventDefault();
            jQuery('.user-login-win').fadeIn(800);
            // return false;
        });
    }


    jQuery('.user-login-and-registr-form.desktop .registrLink').click(function(e) {
        e.preventDefault();
        jQuery('.user-login-and-registr-form.desktop .userLogin, .user-login-and-registr-form.desktop h3:first').fadeOut(function () {
            jQuery('.user-login-and-registr-form.desktop .userRegistr, .user-login-and-registr-form.desktop h3:last').fadeIn();
        });
        
    });

    jQuery('.user-login-and-registr-form.desktop .loginLink').click(function(e) {
        e.preventDefault();
        jQuery('.user-login-and-registr-form.desktop .userRegistr, .user-login-and-registr-form.desktop h3:last').fadeOut(function () {
            jQuery('.user-login-and-registr-form.desktop .userLogin, .user-login-and-registr-form.desktop h3:first').fadeIn();
        });
        
    });
        jQuery('.user-login-close').click(function() {
        jQuery('.user-login-win').fadeOut(400);
    });


// личный кабинет на мобилах

        if (innerWidth > 500) {
            jQuery('.user-login-socials').addClass('desktop');
        } else {
             jQuery('.user-login-socials').removeClass('desktop');
        }



jQuery('.user-login-and-registr-form.mobile .registrLink').click(function(e){
    e.preventDefault();

    // jQuery(this).parent().fadeOut();
    jQuery('.user-login-socials > *').fadeOut(function() {
        jQuery('.user-login-and-registr-form.mobile .userLogin').hide();
        jQuery('.user-login-socials').css('background', '#f5f7fa');

        jQuery('.user-login-and-registr-form.mobile .userRegistr').css('display', 'flex').prev().toggle().parent().fadeIn();
        // jQuery(.'user-login-and-registr-form.mobile').fadeIn();
    });
    // jQuery('.user-login-socials').fadeOut();


});

jQuery('.user-login-and-registr-form.mobile .loginLink').click(function(e){
    e.preventDefault();
    jQuery('.user-login-socials > *').fadeOut(function() {
    jQuery('.user-login-and-registr-form.mobile .userRegistr, .user-login-and-registr-form.mobile h3:last').hide(10);

    // jQuery()
    jQuery('.user-login-socials-bar').css('display', 'flex').prev().fadeIn();


    jQuery('.user-login-socials').css({
        'background-image' : 'url(<?php bloginfo("template_directory") ?>/resources/img/popup-win/cabinet-win.jpg)',
        'background-repeat' : 'no-repeat',
        'background-position' : '53% 0%',
        'background-size' : 'contain',
        'background-color': '#5891de'
    });
    jQuery('.user-login-and-registr-form.mobile .userLogin').css('display', 'flex').parent().fadeIn();
    });
});


// окно с меню навигации на мобилах
jQuery('.mobile-nav-menu-trigger').click(function() {
    jQuery('.mobile-nav-menu').fadeIn();
});
jQuery('.mobile-nav-menu-close').click(function() {
    jQuery('.mobile-nav-menu').fadeOut();
});


// скрипты для календаря
    jQuery('.calendar-trigger').click(function(e){
        e.preventDefault();
        jQuery('.calendar-win').fadeIn(800);
        // return false;
        jQuery('.calendar-slider').slick({
             // dots: true,
              infinite: true,
                 speed: 500,
                 fade: true,
            cssEase: 'linear'
             // arrows: false
        });
    });

    jQuery('.calendar-win-close').click(function() {
        jQuery('.calendar-win').fadeOut(400);
    });






// скрипты для формы поиска в шапке


     //Показываем форму поиска в шапке
   jQuery('.search-trigger').click(function(){
        jQuery(this).removeClass('search-trigger');
        if (window.innerWidth <= 1024) {}
        jQuery('.calendar-trigger').hide(10);
        jQuery('.search-cont').fadeIn(800);
    });



   // закрываем форму поиска в шапке
   jQuery('.search-close').click(function(e){
        jQuery('.search-widget').addClass('search-trigger');
        jQuery('.calendar-trigger').show(400);
        jQuery('.search-cont').fadeOut(400);
        return false;
   }
    );





// всплывающая подсказка 

jQuery('.article-favorite-status').click(function(){
        
    if (jQuery('#is_logged_in').length < 1) {
        //просим авторизоваться гостя
        if (jQuery('.modal-win-shadow').length == 0) {
            jQuery('body').append('<div class="win-callback-modal modal-win-shadow"></div>');
        } else {
            jQuery('.win-callback-modal').show();
        }
        jQuery('.call-for-authorization').fadeIn();

        jQuery('.call-for-authorization-close').click(function() {
            jQuery('.call-for-authorization, .win-callback-modal').fadeOut();
        });

        jQuery('.call-for-authorization').find('a').click(function(e) {
            e.preventDefault();
            jQuery('.call-for-authorization, .win-callback-modal').fadeOut();
            if (jQuery(this).hasClass('openLoginForm')) {

                    if (innerWidth > 500) {
                        jQuery('.user-login-and-registr-form.desktop .loginLink').click();
                    } else {
                         jQuery('.user-login-and-registr-form.mobile .loginLink').click();
                     }
            } else {
                    if (innerWidth > 500) {
                        jQuery('.user-login-and-registr-form.desktop .registrLink').click();
                    } else {
                         jQuery('.user-login-and-registr-form.mobile .registrLink').click();
                     }
            }
            jQuery('.user-login-win').fadeIn(800);
        });

        return false;
    }
    if(jQuery(this).hasClass('add-article-in-favorite')){
        jQuery(this).removeClass('add-article-in-favorite').addClass('article-in-favorite').find('div').text('Статья добавлена в избранное');
    } else {
        jQuery(this).removeClass('article-in-favorite').addClass('add-article-in-favorite').find('div').text('Добавить в избранное');
    }
});

/*паралакс*/

jQuery('.school-relevance').parallax({
    imageSrc: 'wp-content/themes/rainbow/resources/img/main-page/relevance/relevance-bg.jpg',
    positionY: 'top'
    // positionY: '-1000px'

});




//init phone input mask
    jQuery('input[type="tel"]').mask('+38 (099) 999-99-99');
    // jQuery('input[type="email"]').mask("{1,20}@{1,20}.{3}[.{2}]");


// emailvalid
jQuery('[type="email"], #user_login').blur(function() {
    if($(this).val() != '') {
        // if()

        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;


        if(pattern.test($(this).val())){
                        // $(this).css({'border' : '1px solid #569b44'});
                        // $('#valid').text('Верно');
                        jQuery(this).attr('placeholder', 'Введите ваш email');
                    } else {
                        $(this).addClass('invalidInput');
                        if(jQuery(this).next('.emailError').length > 0){
                            jQuery('.emailError').fadeIn();    
                        }else {
                            jQuery(this).after('<div style="display:none" class="emailError">Неверно введен Email!<div>');
                            jQuery('.emailError').fadeIn();
                        }
                        // $('#valid').text('Не верно');
                    }
    } else {
        jQuery(this).addClass('invalidInput').attr('placeholder', 'Вы не ввели email');
    }
});

jQuery('form').submit(function(e){
    //e.preventDefault();




    if (jQuery(this).find('.invalidInput').length == 0) {
        //отправляем
        if(jQuery(this).parent().hasClass('callback-form') || jQuery(this).parent().hasClass('questionForm')) {
            // alert(111);
            // jQuery(this).fadeOut();
            jQuery(this).parent().find('*').fadeOut(function() {
                if(jQuery('.win-callback-desc:visible').length != 0) {
                    jQuery('.win-callback-desc').hide();
                }
                jQuery(this).parent().prepend('<div class="callback-form-letter" style="display:none;"></div>');
                jQuery('.callback-form-letter').fadeIn();
            });

        }
    } else {
        jQuery(this).find('.invalidInput').css('opacity', .2).animate({
            opacity: 1
            }, 1000, function() {
             // jQuery('.invalidInput').css('opacity', 1);
        });
    }
    
})








jQuery('[type="tel"]').blur( function() {

        if($(this).val() == '') {
                jQuery(this).addClass('invalidInput').attr('placeholder', 'Вы не ввели номер телефона!');
        } else {
            jQuery(this).attr('placeholder', 'Ваш номер телефона +38(0**) *** ** **');
        }
});


jQuery('[type="password"]').blur( function() {
   if($(this).val() == '') {
    jQuery(this).addClass('invalidInput');
   } 
});

jQuery('[name="clientName"], [name="userQName"]').blur( function() {
   if($(this).val() == '') {
    jQuery(this).addClass('invalidInput');
   } 
});



jQuery('input').focus(function () {
    if (jQuery(this).hasClass('invalidInput')) {
       jQuery(this).removeClass('invalidInput');
        /*jQuery().*/
    }
    if (jQuery(this).next('.emailError').length > 0) jQuery('.emailError').fadeOut();
});



// счетчик "избаранное" на странице статьи

jQuery('.favorite-count div + div').click(function(){
    var counter = +jQuery(this).prev('.counter').text();
    if(!jQuery(this).hasClass('added')) {
        jQuery(this).addClass('added');
        
        jQuery(this).prev('.counter').text(counter+1);
    } else{
       jQuery(this).removeClass('added');
        jQuery(this).prev('.counter').text(counter-1);
    }
});






jQuery('.win-callback-init-link').click(function(e) {
    e.preventDefault();
    if (jQuery('.modal-win-shadow').length == 0) {
        jQuery('body').append('<div class="win-callback-modal modal-win-shadow"></div>');

    } else {
        jQuery('.win-callback-modal').show();
    }
    jQuery('.win-callback').fadeIn();
});


jQuery('.win-callback-close').click(function() {
    jQuery('.win-callback, .modal-win-shadow:visible').fadeOut();
})


jQuery('body').on('click', '.modal-win-shadow', function() {
    jQuery(this).hide();
    jQuery('.modal-win').hide();

});

/////////////////////////////////////////////////////////////
// попап "подписаться" стр блога


jQuery('.blog-menu-subscribe').click(function(e) {
    e.preventDefault();
    if (jQuery('.modal-win-shadow').length == 0) {
        jQuery('body').append('<div class="blog-menu-subscribe-modal modal-win-shadow"></div>');

    } else {
        jQuery('.blog-menu-subscribe-modal').show();
    }
    jQuery('.blog-menu-subscribe-win').fadeIn();
});


jQuery('.blog-menu-subscribe-win-close').click(function() {
    jQuery('.blog-menu-subscribe-win, .modal-win-shadow:visible').fadeOut();
})

jQuery('.blog-menu-subscribe-win').find('form').submit(function(e) {
  e.preventDefault();
  if (jQuery('.blog-menu-subscribe-win').find('[type="email"]').val() !== '') {
    // добавить AJAX скрипт отправки мыла
    jQuery('.blog-menu-subscribe-win div + div').html('<div><span>Спасибо,</span> Вы теперь с нами ;)</div>').css({'border-color': '#e8e8e8'});

  } else {
    alert('Введите Ваш email!');
  }
});




////////////////////////////////////////////////////////////////////




//show video
jQuery('.childern-results-video-play, .about-school-video-play').click(function(e) {
    e.preventDefault();
    if (jQuery('.modal-win-shadow').length == 0) {
        jQuery('body').append('<div class=" modal-win-shadow"></div>');

    } else {
        jQuery('.modal-win-shadow').show();
    }
    jQuery('.results-video-cont').fadeIn();
});


/*jQuery('.results-video-close').click(function() {
    
})*/

jQuery('body').on('click','.results-video-close', function() {
  jQuery('.results-video-cont, .modal-win-shadow:visible').fadeOut();
});

    // выбор видео в слайдере (страница курсы)

    jQuery('.courses-video-play').click(function(e) {
      e.preventDefault();
      var videoLink = jQuery(this).attr('href');
      var videoWinContent = '<div class="results-video-cont"><iframe id="Youtube" src="' + videoLink + '" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe><div id="pauseYoutube" class="results-video-close closeCross"></div></div><div class=" modal-win-shadow"></div>'


      jQuery('body').append(videoWinContent);
      jQuery('.results-video-cont, .modal-win-shadow').fadeIn();
      jQuery('.results-video-close').click(function() {
          setTimeout(function(){
            jQuery('.results-video-cont, .modal-win-shadow').remove();
          }, 600);
      });
    });

    //выбор видео в слайдере (страница курс)

    jQuery('.course-video-play').click(function(e) {
      e.preventDefault();
      var videoLink = jQuery(this).attr('href');
      var videoWinContent = '<div class="results-video-cont"><iframe id="Youtube" src="' + videoLink + '" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe><div id="pauseYoutube" class="results-video-close closeCross"></div></div><div class=" modal-win-shadow"></div>'


      jQuery('body').append(videoWinContent);
      jQuery('.results-video-cont, .modal-win-shadow').fadeIn();
      jQuery('.results-video-close').click(function() {
          setTimeout(function(){
            jQuery('.results-video-cont, .modal-win-shadow').remove();
          }, 600);
      });
    });

    //выбор видео в отзывах (страница курсы)

    jQuery('.course-feedback > div > a > .youtube-button').click(function(e) {
      e.preventDefault();
      var videoLink = jQuery('.course-feedback a').attr('href');
      var videoWinContent = '<div class="results-video-cont"><iframe id="Youtube" src="' + videoLink + '" frameborder="0" autoplay="1" allow="autoplay; encrypted-media" allowfullscreen></iframe><div id="pauseYoutube" class="results-video-close closeCross"></div></div><div class=" modal-win-shadow"></div>'

      console.log(videoLink);

      jQuery('body').append(videoWinContent);
      jQuery('.results-video-cont, .modal-win-shadow').fadeIn();
      jQuery('.results-video-close').click(function() {
          setTimeout(function(){
            jQuery('.results-video-cont, .modal-win-shadow').remove();
          }, 600);
      });
    });






/*
jQuery('body').on('click', '.modal-win-shadow', function() {
    jQuery(this).hide();
    jQuery('.modal-win').hide();
});*/

/*результаты слайдер*/
jQuery('.chlid-result-select-result.mobileSlider').slick({
        //settings: 'unslick'
     //dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     //arrows: false,
     slidesToShow : 1,
    slidesToScroll: 1
     
  
    });





   /*jQuery('.chlid-result-select-result').slick({
     dots: true,
     infinite: true,
     speed: 500,
     fade: true,
     cssEase: 'linear',
     arrows: false,
                 slidesToShow : 1,
            slidesToScroll: 1
  
    });*/

// blog menu

jQuery('.blog-menu-trigger').click(function() {
  jQuery('.news-and-blog-category-menu').fadeIn(function() {
    jQuery(this).addClass('opened');
  });
});

jQuery('.news-and-blog-category-menu').find('a').click(function(e) {
  //e.preventDefault();
  jQuery('a').removeClass('current-cat');
  var changeCatText = jQuery(this).text();
  jQuery('.blog-menu-trigger span, .news-and-blog h3').text(changeCatText);
  jQuery(this).addClass('current-cat');
  //jQuery('.news-and-blog-article').remove();
  jQuery('.news-and-blog-category-menu').fadeOut(function() {
        jQuery(this).removeClass('opened');
      });
});

jQuery(document).click(function(event) {
    //if(jQuery('.other-nav-items-trigger').hasClass('active')){
       if (jQuery(event.target).closest(".news-and-blog-category-menu.opened, .blog-search-results:visible").length) return;
      jQuery(".news-and-blog-category-menu.opened, .blog-search-results:visible").fadeOut(function() {
        jQuery(this).removeClass('opened');
      });

      /*jQuery('.other-nav-items-trigger.active').removeClass('active');*/
      event.stopPropagation();  
  });


// Удаление аватраки

//показываем окно удаления аватарки
jQuery('.profile-cross').click(function() {

  if (jQuery('.modal-win-shadow').length == 0) {
      jQuery('body').append('<div class="del-avatar-modal modal-win-shadow"></div>');
  } else {
      jQuery('.modal-win-shadow').show();
  }
  jQuery('.del-avatar-window-sure').fadeIn();
});

// удаляем аватакру
jQuery('.del-avatar-button').click(function() {
  // добавить ajax для удаления файла аватраки на сервере, и уже  при ответе показывать окно "успех"
  //
  jQuery('.del-avatar-window-sure').fadeOut(400, function() {
    jQuery('body').prepend('<div class="del-avatar-window-deleted modal-win"><span class="del-avatar-deleted ">Аватарка успешно удалена!</span></div>');
    jQuery('.del-avatar-window-deleted').fadeIn(400);
  });
  
});

// закрываем окно "удалить автарку"
jQuery('.del-avatar-window-sure').find('.closeCross, .del-avatar-cancel').click(function() {
  jQuery('.del-avatar-window-sure, .modal-win-shadow:visible').fadeOut();
});

//end





//profile menu change tab script
var profileListItemsCount = 0;
// выбираем активную вкладку
jQuery('.profile-tabs-cont > *:nth-child(1)').fadeIn(function() {
  jQuery('.profile-category-list').find('li:nth-child(1)').find('a').addClass('active');
});

// считаем количество ссылок на табы и добавляем им атрибут, необходимый для открытия нужного окна
jQuery('.profile-category-list').find('li').each(function() {
  profileListItemsCount++;
  jQuery(this).find('a').attr('data-open-tab', profileListItemsCount);
});


jQuery('[data-open-tab]').click(function(e) {
  e.preventDefault();

  // костыль для фона (чтобы вкладка была без фона - добавляй к ссылке в дропдауне атрибут data-none-background="1")
  if (jQuery(this).attr('data-none-background') == 1) {
    if (!jQuery('.wrapper').hasClass('noneBackground')) {
       jQuery('.wrapper').addClass('noneBackground');
    }
     
  } else {
    if (jQuery('.wrapper').hasClass('noneBackground')) {
       jQuery('.wrapper').removeClass('noneBackground');
    }
  }
  // end

    //по значению атрибута открываем нужный нам таб, перед эти закрывая активный
   var profileTabNumber = jQuery(this).attr('data-open-tab');
   jQuery('[data-open-tab].active').removeClass('active');
   jQuery(this).addClass('active');

   jQuery('.profile-tabs-cont > *:visible').fadeOut(400, function() {
     jQuery('.profile-tabs-cont > *:nth-child(' + profileTabNumber + ')').fadeIn(400);
  });
});

//END


// jQuery('body').css('padding-top', '6.25vw');


// скрипты формы поиска в блоге
jQuery('#blog-search-form').submit(function(e) {
  //e.preventDefault();
 
  if(jQuery('#blog-search-form').find('[type="text"]').val() !== '') {
    // на проде добавить AJAX 
    jQuery('.blog-search-results').fadeIn();
  } else {
    alert('введите запрос для поиска !');
  }
  // return false;

});

/*выбор страницы в пагинации результатов*/
jQuery('.results-pagination-change-page').click(function(e) {
  e.preventDefault();
  jQuery('.change-page-form').fadeIn();
});
jQuery('.change-page-form-close').click(function() {
  jQuery('.change-page-form').fadeOut();
});
jQuery('.change-page-form').submit(function(e) {
  e.preventDefault();
  alert('пиши скрипт для выбора страницы');
});
//////////////////////////////////////

// меняем шапку при проскроленной странице (надо вынести в отдельную функцию и вызывать при событиях риди и скролл)

    jQuery(document).scroll(function(){
    if(window.scrollY != 0) {
        if(jQuery('.scrolled').length == 0) {
                jQuery('.header').addClass('scrolled');
                // jQuery('body').css('padding-top', '6.25vw');

        } 
        if(jQuery('.noscrolled').length > 0) {
             jQuery('.header').removeClass('noscrolled');
             // jQuery('body').css('padding-top', '6.25vw');
        }

        jQuery('body').css('padding-top', '6.25vw');


        } else {

            if(jQuery('.noscrolled').length == 0) {
                jQuery('.header').addClass('noscrolled');
        } 
        if(jQuery('.scrolled').length > 0) {
             jQuery('.header').removeClass('scrolled');
        }
        jQuery('body').css('padding-top', 0);
    }
    });


    jQuery(window).resize(function () {
        editHeightChildPhotoCont();
        jQuery('.school-relevance').parallax({
            imageSrc: 'wp-content/themes/rainbow/resources/img/main-page/relevance/relevance-bg.jpg',
            positionY: 'top'
            // positionY: '-1000px'

        });



        if (innerWidth > 500) {
            jQuery('.user-login-socials').addClass('desktop');
            jQuery('.mobile-nav-menu').fadeOut();
        } else {
             jQuery('.user-login-socials').removeClass('desktop');
        }

    });


});


$(document).ready(function(){

  $('.course-feedback-slider').slick({

    dots: true,
    arrows: false,
    speed: 500,
    fade: true,
    cssEase: 'linear',

  });

});


$(document).ready(function(){
  $('.atmosphere-rainbow-slides').slick({
    dots: true,
    arrows: false,
    speed: 500,
    fade: true,
    cssEase: 'linear',
  });
});


$(document).ready(function(){

  $('.course-teacher-slider').slick({

    dots: true,
    arrows: false,
    speed: 500,
    fade: true,
    cssEase: 'linear',

  });

});


$('.not-found-home-link').mouseout(function(){
  $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404Boy.svg) center bottom no-repeat, radial-gradient(ellipse at center, rgba(254,255,254,1) 0%, rgba(226,232,235,1) 100%)');
  $('.not-found-page').css('backgroundSize', '18.90625vw 19.9479166667vw, 100%');
});

$('.not-found-home-link').mouseover(function(){
  $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404BoyHover.svg) calc(50% + .47858796296vw) bottom no-repeat, radial-gradient(ellipse at center, rgba(254, 255, 254, 1) 0%, rgba(226, 232, 235, 1) 100%)');
  $('.not-found-page').css('backgroundSize', '13.28125vw 19.9479166667vw, 100%');
});

$('.not-found-home-link').mouseout(function(){
  if (window.screen.width <= 1024)
  {
    if (window.innerWidth <= 1024) 
    {
      $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404Boy-tablet.svg) center bottom no-repeat, radial-gradient(ellipse at center, rgba(254, 255, 254, 1) 0%, rgba(226, 232, 235, 1) 100%)');
      $('.not-found-page').css('backgroundSize', '26.5625vw 28.125vw, 100%');
    }
  }
});

$('.not-found-home-link').mouseover(function(){
  if (window.screen.width <= 1024)
  {
    if (window.innerWidth <= 1024) 
    {
      $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404BoyHover-tablet.svg) calc(50% + .65104166666vw) bottom no-repeat, radial-gradient(ellipse at center, rgba(254, 255, 254, 1) 0%, rgba(226, 232, 235, 1) 100%)');
      $('.not-found-page').css('backgroundSize', '18.75vw 28.125vw, 100%');
    }
  }
});

$('.not-found-home-link').mouseout(function(){
  if (window.screen.width <= 320)
  {
    if (window.innerWidth <= 320) 
    {
      $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404Boy-phone.svg) center bottom no-repeat, radial-gradient(ellipse at center, rgba(254, 255, 254, 1) 0%, rgba(226, 232, 235, 1) 100%)');
      $('.not-found-page').css('backgroundSize', '57.5vw 60.625vw, 100%');
    }
  }
});

$('.not-found-home-link').mouseover(function(){
  if (window.screen.width <= 320)
  {
    if (window.innerWidth <= 320) 
    {
      $('.not-found-page').css('background', 'url(<? bloginfo("template_directory")  ?>/resources/img/404/404BoyHover-phone.svg) calc(50% + 1.38888888889vw) bottom no-repeat, radial-gradient(ellipse at center, rgba(254, 255, 254, 1) 0%, rgba(226, 232, 235, 1) 100%)');
      $('.not-found-page').css('backgroundSize', '40.625vw 60.625vw, 100%');
    }
  }
});

// скрытие всплывашек с помощью Esc (Роман К) //

$(document).keyup(function(e){
  if(e.keyCode == 27)
  {
    if(!$('.del-avatar-window-deleted').hasClass('unactive'))
    {
      $('.del-avatar-window-deleted').addClass('unactive');
      $('.profile-modal-shadow').addClass('unactive');
    }

    if(!$('.password-reset').hasClass('unactive'))
    {
      $('.password-reset').addClass('unactive');
      $('.profile-modal-shadow').addClass('unactive');
    }

    if(!$('.ok-button').hasClass('unactive'))
    {
      $('.ok-button').addClass('unactive');
      $('.profile-modal-shadow').addClass('unactive');
    }

    if ($('.results-video-close:visible'))
    {
        $('.results-video-cont, .modal-win-shadow').fadeOut();
    }

    jQuery('.change-page-form').fadeOut();

    jQuery('.del-avatar-window-sure, .modal-win-shadow:visible').fadeOut();

    jQuery('.calendar-win:visible').fadeOut(800);

    jQuery('.search-cont:visible').fadeOut(800);
  }
});

// конец //

$('.user-form > .user-form-input > label > input[required]:eq(0)').focus(function()
{
  $(this).css('borderColor', '#818385');
  $('.user-form > .user-form-input:eq(0)').removeClass('user-form-input-fail');
});

$('.user-form > .user-form-input > label > input[required]:eq(1)').focus(function()
{
  $(this).css('borderColor', '#818385');
  $('.user-form > .user-form-input:eq(1)').removeClass('user-form-input-fail');
});

$('.user-form > .user-form-input > label > input[required]:eq(3)').focus(function()
{
  $(this).css('borderColor', '#818385');
  $('.user-form > .user-form-input:eq(4)').removeClass('user-form-input-fail');
});

$('.user-form > .user-form-input > label > input[required]:eq(0)').blur(function()
{
  if($(this).val() == '') {
    $(this).css('borderColor', 'rgb(210, 86, 71)');
    $('.user-form > .user-form-input:eq(0)').addClass('user-form-input-fail');
    $(this).attr('placeholder', 'Введите Ваш логин');
  }
});

$('.user-form > .user-form-input > label > input[required]:eq(1)').blur(function()
{
  if($(this).val() == '') {
    $(this).css('borderColor', 'rgb(210, 86, 71)');
    $('.user-form > .user-form-input:eq(1)').addClass('user-form-input-fail');
    $(this).attr('placeholder', 'Введите Ваше имя');
  }
});

$('.user-form > .user-form-input > label > input[required]:eq(3)').blur(function()
{
  if($(this).val() == '') {
    $(this).css('borderColor', 'rgb(210, 86, 71)');
    $('.user-form > .user-form-input:eq(4)').addClass('user-form-input-fail');
    $(this).attr('placeholder', 'Введите Вашу фамилию');
  }
});

$('.user-form > .user-form-button > button').click(function()
{
  var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

  if($('.user-form > .user-form-input > label > input[required]:eq(0)').val() == "Ваш логин") 
  {
    $('.user-form > .user-form-input > .wrong-input:eq(0)').text('Это имя к сожалению занято.');
    $('.user-form > .user-form-input > .wrong-input:eq(0)').removeClass('unactive');
  } else if($('.user-form > .user-form-input > label > input[required]:eq(0)').val() == "")
  {
    $('.user-form > .user-form-input > .wrong-input:eq(0)').text('Введите логин');
    $('.user-form > .user-form-input > .wrong-input:eq(0)').removeClass('unactive');
  } else 
  {
    $('.user-form > .user-form-input > .wrong-input:eq(0)').addClass('unactive');
  }

  if($('.user-form > .user-form-input > label > input[type="email"]').val() == "") 
  {
    $('.user-form > .user-form-input > .wrong-input:eq(1)').text('Введите email');
    $('.user-form > .user-form-input > .wrong-input:eq(1)').removeClass('unactive');
  } else if(!pattern.test($('.user-form > .user-form-input > label > input[type="email"]').val()))
  {
    $('.user-form > .user-form-input > .wrong-input:eq(1)').text('Не верно введен email');
    $('.user-form > .user-form-input > .wrong-input:eq(1)').removeClass('unactive');
  } else if($('.user-form > .user-form-input > label > input[type="email"]').val() == "username@email.com")
  {
    $('.user-form > .user-form-input > .wrong-input:eq(1)').text('Этот email к сожалению занят.');
    $('.user-form > .user-form-input > .wrong-input:eq(1)').removeClass('unactive');
  } else
  {
    $('.user-form > .user-form-input > .wrong-input:eq(1)').addClass('unactive');
  }
  
  console.log($('.user-form > .user-form-input > label > input[type="tel"]').val());

  if($('.user-form > .user-form-input > label > input[type="tel"]').val() == "+38 (012) 345-67-89")
  {
    $('.user-form > .user-form-input > .wrong-input:eq(2)').text('Этот номер телефона уже зарегистрирован.');
    $('.user-form > .user-form-input > .wrong-input:eq(2)').removeClass('unactive');
  } else
  {
    $('.user-form > .user-form-input > .wrong-input:eq(2)').addClass('unactive');
  }
});

// удаление избраные курсы (Даниил Б) //

$('.main-profile-modules .profile-group-flag').mouseover(function()
{
  $(this).append('<div class="profile-group-flag-delete">Удалить из избранного</div>');
})

$('.main-profile-modules .profile-group-flag').mouseout(function()
{
  $(this).empty();
});

$('.main-profile-modules .profile-group-flag').click(function()
{
  $(this).parent().parent().css('display', 'none');
});

// конец //

// затемнение картинки при наведении на избранную статью (Даниил Б) //

$('.profile-news-and-blog-article').mouseover(function()
{
  $(this).css('box-shadow', '0 0 38px 0.5px rgba(0, 0, 0, 0.14)')
  $(this).children('a').children('.module-img-shadow').css('opacity', '.35');
});

$('.profile-news-and-blog-article').mouseout(function()
{
  $(this).css('box-shadow', '0 0 15.5px 0.5px rgba(0, 0, 0, 0.1)')
  $(this).children('a').children('.module-img-shadow').css('opacity', '0');
});

// конец //

// открытие календаря на планшетах (Данил Б) //

$('.mobile-nav-menu-list').find('a:eq(5)').click(function(e)
{
  e.preventDefault();
  jQuery('.calendar-win').fadeIn(800);
  // return false;
  jQuery('.calendar-slider').slick({
    // dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
    // arrows: false
  });
});

// наведение на эелемент результата поиска (Роман К) //

$('.module-search-result').mouseover(function() {
  $(this).find('span:eq(0)').css('color', '#5891dd');
})

$('.module-search-result').mouseout(function() {
  $(this).find('span:eq(0)').css('color', 'black');
})
/*custom checkbox*/
if(!$('.login-remember span').length > 0){
	$('#rememberme').after('<span></span>');
}
function deleteImg(){
jQuery('.closeImg').on('click',function(){
	jQuery('#blah').attr('src','');
	jQuery('input[name="current_user_avatar"]').attr('value', '');
	jQuery('.closeImg').remove();
	return false;
})
}
deleteImg();
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            jQuery('#blah').attr('src', e.target.result);
						if(!jQuery('.wpum-uploaded-files label .closeImg').length > 0){
							jQuery('<a class="closeImg" href="#"><span>Удалить аватарку</span></a>').appendTo('.wpum-uploaded-files label');
						}
						deleteImg();
        }
        reader.readAsDataURL(input.files[0]);
    }
}
jQuery("#user_avatar").change(function(){
    readURL(this);
});
jQuery('.wpum-uploaded-files label').click(function(){
	readURL(jQuery(this).next().val());
});			
// конец //