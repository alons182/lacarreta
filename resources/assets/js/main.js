;(function($){

  var $btnMenu = $('#btn-menu'),
      $menu = $('.header-menu');

  $btnMenu.on('click', function (e) {
    
      $menu.toggle();

  });

 $menu.hoverIntent({
      over: function() {
          console.log('hover');
            $(this).find(">.sub-menu").slideDown(200 );
          },
      out:  function() {
            $(this).find(">.sub-menu").slideUp(200);
          },
      timeout: 200,
       selector: '.menu-item-has-children'

       });

 $(".owl-carousel").owlCarousel({
      items : 1,
      autoplay : true,
      loop : true
      /*slideSpeed : 300,
      paginationSpeed : 400,*/
      /*singleItem:true*/
  });

  

    
})(jQuery);