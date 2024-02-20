jQuery(document).ready(function($){
  //menu hamburguesa
  $(".menu-hamburguesa").slideUp();
  $('.menu').click(function(){
    $('.menu').toggleClass('is-active');
    $('.menu-hamburguesa').slideToggle();
  });

  
})

