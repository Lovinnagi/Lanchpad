(function ($) {       
    AOS.init({     
      easing: 'ease-out',     
      once:true
    });
     
    $(document).scroll(function() {
      var windowHeight= $( document ).height();
      var y = $(this).scrollTop();
      if (y > (windowHeight/3)) {
        $('#pagescroller').fadeIn();
      } else {
        $('#pagescroller').fadeOut();
      }
    });
    $(document).ready(function () {
        $(document).foundation();
        if($('.evo_metarow_tix').length ) {
            $('.evo_metarow_tix .evo_h3').text('Tickets');
        }       
        $('.toggler').click(function(){
            $('.slide-mobile-menu').toggleClass('slide-menu');
        });
        $('.closer').click(function(){
            $('.slide-mobile-menu').removeClass('slide-menu');
        });
        $('#pagescroller').on('click',function(){
            $("html, body").animate({ scrollTop: 0 }, "slow");   
        });
        $('.owl-carousel').owlCarousel({
                autoplay:true,
                autoplayTimeout:2000,
                loop: true,
                margin: 10,
                responsiveClass: true,					
                nav: false,
				items: 5,
                responsive: {
                  0: {
                    items: 1,
                  
                  },
                  360: {
                    items: 1,
                  
                  },
                  600: {
                    items: 3,
                  
                  },
				  700: {
                    items: 4,
                  
                  },
                  1024: {
                    items: 5,                   
                  },
                  
                }
              });
        $('#eventWines').owlCarousel({
                autoplay:true,
                autoplayTimeout:2000,
                loop: true,  
				margin:10,	
                responsiveClass: true,					
                nav: false,
				items: 5,
                responsive: {
                  0: {
                    items: 1,                  
                  },
                  360: {
                    items: 1,
                  
                  },
                  600: {
                    items: 3,
                  
                  },
				  700: {
                    items: 4,
                  
                  },
                  1024: {
                    items: 5,
                  },
                  
                }
              });
              owl = $('.owl-carousel').owlCarousel();
$(".prev").click(function () {
    owl.trigger('next.owl.carousel');
});

$(".next").click(function () {
    owl.trigger('prev.owl.carousel');
});


    });
   
$(window).load(function(){
        var hgt1 = $(".table-1").height();
        var hgt2 = $(".table-2").height();
        if(hgt1 > hgt2){
            $(".table-2").height(hgt1);
        }else{
            $(".table-1").height(hgt2);
        }
        var eve1 = $(".event-big").height();
        var eve2 = $(".event-small").height();
        if(eve1 > eve2){
            $(".event-small").height(eve1);
        }else{
            $(".event-big").height(eve2);
        }/*
        var colh1 = $(".head-1").height();
        var colh2 = $(".head-2").height();
        var colh3 = $(".head-3").height();
        console.log(colh1);
        console.log(colh2);
        console.log(colh2);
        if(colh1 >= colh2 && colh1 >= colh3){
            $('.content-head').height(colh1);
        }
        if(colh2 >= colh1 && colh2 >= colh3){
            $('.content-head').height(colh2);
        }
        if(colh3 >= colh1 && colh3 >= colh2){
            $('.content-head').height(colh3);
        }*/
   
    if($('#top-nav-bar .mega-menu-megamenu').length){
        var menuoffset  = $('#top-nav-bar .mega-menu-megamenu .mega-sub-menu').offset();
        var menuwidth = document.body.clientWidth;
        $( "#top-nav-bar .mega-menu-megamenu .mega-sub-menu" ).css({
            'width':menuwidth+'px',
            'left':'-'+(menuoffset.left)+'px'
            });
    }
   
    var bodyWidth = document.body.clientWidth;
    var margins = (bodyWidth-$('.head-container').width())/2;
   
    var bigover = $('.big-image .overlay').width()+ margins;
    $('.big-image .overlay').width(bigover);
   
    var smallover = $('.small-image .overlay').width()+ margins;
    $('.small-image .overlay').width(smallover);
   
    if($('.fit-image').length){
        var colWidth = $('.fit-image').parent('.columns').width(),
        imgHeight = colWidth;
        if(colWidth<400){
        $('.fit-image img').height(imgHeight+'px');
        }
    }
    $('#menu-top-mobile-menu > li.menu-item-has-children').append('<span class= "fa fa-caret-down"></span>');
    $('#menu-top-mobile-menu li.menu-item-has-children li.menu-item-has-children').append('<span class= "fa fa-plus"></span>');
    $('#menu-top-mobile-menu > li.menu-item-has-children > span').click(function(){
            if($(this).hasClass('fa-caret-down')){
            $(this).removeClass('fa-caret-down').addClass('fa-caret-up');
        }else{
            $(this).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
    });
    $('#menu-top-mobile-menu li.menu-item-has-children span').click(function(){
       
        $(this).parent('li').toggleClass('toggl-sub');
    });
    if($('.evorow ').length ) {
       
        }
});
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: true,
    directionNav: false,
    slideshowSpeed: 2000,
    animationSpeed: 600
  });
 
  $('.fullwidth-slider-container').flexslider({
    animation: "fade",
    controlNav: true,
    directionNav: true,
	prevText: "",
	nextText: "", 
    slideshowSpeed: 2000,
    animationSpeed: 600
  });
  $('.video').parent().click(function () {
    if($(this).children(".video").get(0).paused){
        $(this).children(".video").get(0).play();
        $(this).children(".playpause").fadeOut();
    }else{
       $(this).children(".video").get(0).pause();
        $(this).children(".playpause").fadeIn();
    }
});
})(jQuery); 