// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.querySelector(".modal-btn");
var ref = document.querySelector(".single-ref");


// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


let button = document.querySelector('.menu-toggle');

( function() {

    const siteNavigation = document.querySelector( '.main-menu' );

      // Return early if the navigation doesn't exist.
      if ( ! siteNavigation ) {
          return;
      }
  
  button.addEventListener( 'click', function() {
    siteNavigation.classList.toggle( 'toggled' );
  } );
  
  // Remove the .toggled class when the user clicks outside the navigation.
  document.addEventListener( 'click', function( event ) {
    const isClickInside = siteNavigation.contains( event.target );
  
    if ( ! isClickInside ) {
      siteNavigation.classList.remove( 'toggled' );
    }
  } );
  
}() );


let selectElement = document.querySelector(".cat-list_item");
var page = 8;
var taxomonie = '';
jQuery(function($) {
  $('body').on('click', '.js-load-photos', function() {
    page = -1;
    var data = {
      'action': $(this).data('action'),
      'taxomonie': taxomonie,
      'page': page,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        //$('.catalogue-photo').append(response);
        $('.catalogue-photo').html(response);
      } else {
        $('.js-load-photos').hide();
      }
    });
  });
});

jQuery(function($) {
  $('body').on('change', '.cat-list_item', function() {
    taxomonie = selectElement.value;
    page = 8;
    var data = {
      'action': $(this).data('action'),
      'taxomonie': taxomonie,
      'page': page,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        //$('.catalogue-photo').append(response);
        $('.catalogue-photo').html(response);
      } else {
        $('.js-load-photos').hide();
      }
    });
  });
});