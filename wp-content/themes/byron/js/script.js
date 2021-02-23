jQuery(document).ready(function($){

  $('.sidenav').sidenav().on('click tap', 'li a', () => {
     $('.sidenav').sidenav('close'); 
    });

  $('.sidenav-trigger').click(function() {
            // Problema sidenav safari
            $("body").css({'overflow':'visible', "position": "relative", "height": "100%"});
            $("html").css({'overflow':'visible', "position": "relative", "height": "100%"});
  });
});


// $(document).ready(function(){
//             $('#saopaulo').mouseenter(function(){
//               $('#msg-saopaulo').show();
//               $('#bases-saopaulo').show();    
//             });
//             $('#saopaulo').mouseleave(function(){
//               $('#msg-saopaulo').hide();
//               $('#bases-saopaulo').hide();     
//             });

//             $('#riograndedosul').mouseenter(function(){
//               $('#msg-rgs').show();
//               $('#bases-rgs').show(); 
//             });
//             $('#riograndedosul').mouseleave(function(){
//               $('#msg-rgs').hide();
//               $('#bases-rgs').hide(); 
//             });

//             $('#minasgerais').mouseenter(function(){
//               $('#msg-mg').show();
//             });
//             $('#minasgerais').mouseleave(function(){
//               $('#msg-mg').hide();
//             });

//             $('#toca').mouseenter(function(){
//               $('#msg-toca').show();
//             });
//             $('#toca').mouseleave(function(){
//               $('#msg-toca').hide();
//             });

//             $('#bahia').mouseenter(function(){
//               $('#msg-bahia').show();
//             });
//             $('#bahia').mouseleave(function(){
//               $('#msg-bahia').hide();
//             });

//             $('#parana').mouseenter(function(){
//               $('#msg-parana').show();
//             });
//             $('#parana').mouseleave(function(){
//               $('#msg-parana').hide();
//             });

//             $('#maranhao').mouseenter(function(){
//               $('#msg-maranhao').show();
//             });
//             $('#maranhao').mouseleave(function(){
//               $('#msg-maranhao').hide();
//             });

//             $('#ms').mouseenter(function(){
//               $('#msg-mgs').show();
//             });
//             $('#ms').mouseleave(function(){
//               $('#msg-mgs').hide();
//             });
// });

$(window).on("scroll", function() {
  AOS.refresh();
  if($(window).scrollTop() == 0) {
    $(".logo").addClass("logo-blue");
    $(".logo").removeClass("logo-black");
    $("nav").addClass("nav_white");
    $("nav").removeClass("nav_black");

  } else {
    $(".logo").addClass("logo-black");
    $(".logo").removeClass("logo-blue");
    $("nav").addClass("nav_black");
    $("nav").removeClass("nav_white");
  }
});
