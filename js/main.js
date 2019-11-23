$(document).ready(function () {
    $('.filter').addClass('filter-shown');
    var numberOfProjects=0;
    var pages=0;
    var activePage=1;
    $('.filter-shown').each(function(el){
        if(0 <= el && el <= 7){
            $(this).show();
        }
        else{
            $(this).hide();

        }
    });
    // if(activePage==1){
    //     $(".a-left").hide();
    // }
    
    $('.filter-shown').each(function(el){
        numberOfProjects++;
         if (numberOfProjects<8){
            $('.pagination').hide();
         }else{
            $('.pagination').show();
           
         }
    });
    pages=numberOfProjects/8;
    pages= Math.ceil(pages);
    
    $('.page-numbers').html('');
    for (i = 0; i < pages; i++){
        let page=i+1;
        if (page == activePage){
            $('.page-numbers').append('<a class="page-link active" href="#">'+page+'</a>');
        }else{
            $('.page-numbers').append('<a class="page-link" href="#">'+page+'</a>');
        }
        
    }
    // document.addEventListener('contextmenu', event => event.preventDefault());

    // EASE SCROLL

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 800);
    });
    // CUSTOM SCROLLBAR
    $(window).on("load", function () {
        $(".content").mCustomScrollbar({
            theme: "dark"
        });
    });
    (jQuery);
    // ANIMATION 

    function animation() {
        var windowHight = $(window).height();
        var scroll = $(window).scrollTop();
        $('.animation').each(function () {
            var position = $(this).offset().top;
            var animation = $(this).attr('data-animation');
            //var delay = $(this).attr('data-delay');
            if (position < scroll + windowHight - 60) {
                $(this).addClass(animation);
                //$(this).css('animation-delay', delay);
            }
        });
    }//end of animation function

    animation();
    $(window).scroll(function () {
        animation();
    });
    $('.controls').on('click', '.controls--next', function () {
        $('.image_active').css({ "background-image": "url('img/mbstudio-slider-img-2.jpg')" });
        $('.image_active').css({ "background-image": "url('img/mbstudio-slider-img-3.jpg')" });
    });
    if ($('.owl-carousel').length > 0) {
        $('.image').owlCarousel({
            items: 1,
            nav: true,
            loop: true,
            navText: ["<img src='img/arrow_slider_left-01.svg'>", "<img src='img/arrow_slider_right-01.svg'>"]
        });
        $('.process-services-photo').owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            loop: true,
            navText: ["<img src='img/arrow_slider_left-01.svg'>", "<img src='img/arrow_slider_right-01.svg'>"]
        });
        $('.process-modal-gallery').owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            loop: true,
            navText: ["<img src='img/arrow_slider_left-01.svg'>", "<img src='img/arrow_slider_right-01.svg'>"]
        });
        $('.single-work-gallery').owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            loop: true,
            navText: ["<img src='img/arrow_slider_left-01.svg'>", "<img src='img/arrow_slider_right-01.svg'>"]
        });
    }

    if ($('#fullpage').length > 0) {
        $('#fullpage').fullpage({
            autoScrolling: false
        });
    }


    TweenMax.from(".featured-slider-title", 1, { opacity: 0, x: 300 });
    TweenMax.from(".featured-slider-info", 1, { opacity: 0, x: -300 });
    //    TweenMax.staggerFrom(".services-item", 0.5, {opacity: 0, y: 200}, 0.2);
   

        
    $("button[data-filter='all'").click(function (){
        $(this).addClass('act');
        $("button[data-filter='exterior'").removeClass('act');
        $("button[data-filter='interior'").removeClass('act');
        $("button[data-filter='multi-residental'").removeClass('act');
    });

    $("button[data-filter='exterior'").click(function (){
        $(this).addClass('act');
        $("button[data-filter='all'").removeClass('act');
        $("button[data-filter='interior'").removeClass('act');
        $("button[data-filter='multi-residental'").removeClass('act');
    });

    $("button[data-filter='interior'").click(function (){
        $(this).addClass('act');
        $("button[data-filter='exterior'").removeClass('act');
        $("button[data-filter='all'").removeClass('act');
        $("button[data-filter='multi-residental'").removeClass('act');
    });

    $("button[data-filter='multi-residental'").click(function (){
        $(this).addClass('act');
        $("button[data-filter='all'").removeClass('act');
        $("button[data-filter='interior'").removeClass('act');
        $("button[data-filter='exterior'").removeClass('act');
    });


    if(activePage == 1) {
        $('.a-left').addClass('arrow-disabled');
    }

    
    $(".filter-button").click(function () {
        numberOfProjects=0;
        activePage=1;
        var value = $(this).attr('data-filter');
        
        
        if (value == "all") {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
            $('.filter').removeClass('filter-removed');
            $('.filter').addClass('filter-shown');

        } else {
            //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
            //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.' + value).hide('3000');
            $(".filter").not('.' + value).addClass('filter-removed');
            $(".filter").not('.' + value).removeClass('filter-shown');

            $('.filter').filter('.' + value).show('3000');
            $('.filter').filter('.' + value).addClass('filter-shown');
            $(".filter").filter('.' + value).removeClass('filter-removed');
        }
       
        $('.filter-shown').each(function(el){
            numberOfProjects++;
             if (numberOfProjects<8){
                $('.pagination').hide();
             }else{
                $('.pagination').show();
             }
        });
        pages=numberOfProjects/8;
        pages= Math.ceil(pages);
        


        leftArrow();
        // if(activePage==1){
        //     $(".a-left").hide()
        // }
        // if(activePage==pages){
        //     $(".a-right").hide()
        // }
        $('.page-numbers').html('');
    for (i = 0; i < pages; i++){
        let page=i+1;
        if (page == activePage){
            $('.page-numbers').append('<a class="page-link active" href="#">'+page+'</a>');
        }else{
            $('.page-numbers').append('<a class="page-link" href="#">'+page+'</a>');
        }
        
    }
    });
    function leftArrow(){
       

        $('.filter-shown').hide();
        if(pages>1){
            $(".a-right").removeClass('arrow-disabled');
        }
        if(activePage!=1){
            $(".a-left").removeClass('arrow-disabled');
            activePage--;
            if(activePage==1){  
                $(".a-left").addClass('arrow-disabled');
            }
        }

        let toShowLast= activePage*8;
        let toShowFirst= toShowLast-8;
        $('.filter-shown').each(function(el){
            if(toShowFirst <= el + 1 && el + 1 <= toShowLast){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
        $('.page-link').removeClass('active');
        $('.page-link').each(function() {
            if ($(this).text() == activePage){
                $(this).addClass('active');
            }
        }); 
        // $('.page-link').text(activePage);

    };
    function rightArrow(){
       

        $('.filter-shown').hide();
        if(activePage==pages){
            $(".a-left").removeClass('arrow-disabled');
        }
        if(activePage!=pages){
            $(".a-left").removeClass('arrow-disabled');
            if(activePage!=1){
                $(".a-left").removeClass('arrow-disabled');
            }
            activePage++;
            if(activePage==pages){  
                $(".a-right").addClass('arrow-disabled');
            }
        }
        else{
            $(".a-right").addClass('arrow-disabled');
        }
        let toShowLast= activePage*8;
        let toShowFirst= toShowLast-8;
        $('.filter-shown').each(function(el){
            if(toShowFirst <= el && el <= toShowLast){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
        // if(activePage>1){
        //     $(".a-left").show();
        // }
        // if(activePage==pages){
        //     $(".a-right").hide()
        // }
        // $('.page-link').text(activePage);
        $('.page-link').removeClass('active');
        $('.page-link').each(function() {
            if ($(this).text() == activePage){
                $(this).addClass('active');
            }
        }); 
    }
    $(".a-left").click(function (){
        leftArrow();
    });

    $(".a-right").click(function () {
        rightArrow();
    });


    $(function () {
        var controller = new ScrollMagic.Controller();

        var servicesTween = TweenMax.staggerFrom(".servicesScene", 0.5, { opacity: 0, y: 200 }, 0.2);
        var containerScene = new ScrollMagic.Scene({
            triggerElement: '#container',
            triggerHook: 'onEnter',
            offset: 203
        })
            .setTween(servicesTween)
            .addTo(controller);


        var servicesTween = TweenMax.from("#services-img", 2, { opacity: 0 });
        var servicesImgScene = new ScrollMagic.Scene({
            triggerElement: '#services-img',
            triggerHook: 'onEnter',
            offset: 203
        })
            .setTween(servicesTween)
            .addTo(controller);

        var socialTween = TweenMax.staggerFrom(".socialScene", 0.5, { opacity: 0, y: 200 }, 0.2);
        var SocialScene = new ScrollMagic.Scene({
            triggerElement: '.social',
            triggerHook: 'onEnter',
            offset: 203
        })
            .setTween(socialTween)
            .addTo(controller);


        var processTween = TweenMax.staggerFrom(".processScene", 0.5, { opacity: 0, y: 200 }, 0.2);
        var processScene = new ScrollMagic.Scene({
            triggerElement: '#process',
            triggerHook: 'onEnter',
            offset: 203
        })
            .setTween(processTween)
            .addTo(controller);

        var aboutTween = TweenMax.staggerFrom(".aboutScene", 0.5, { opacity: 0, y: 200 }, 0.2);
        var aboutScene = new ScrollMagic.Scene({
            triggerElement: '#aboutTween',
            triggerHook: 'onEnter',
            offset: 203
        })
            .setTween(aboutTween)
            .addTo(controller);
    });


    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
    });

    $('input').focus(function () {
        $(this).parents('.form-group').addClass('focused');
    });

    $('input').blur(function () {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    })

}
);//end document.ready


