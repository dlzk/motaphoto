// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.querySelector(".modal-btn");


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
    const site = document.querySelector( 'body' );

      // Return early if the navigation doesn't exist.
      if ( ! siteNavigation ) {
          return;
      }
  
  button.addEventListener( 'click', function() {
    siteNavigation.classList.toggle( 'toggled' );
    site.classList.toggle( 'stop-scroll' );
  } );
  
  // Remove the .toggled class when the user clicks outside the navigation.
  document.addEventListener( 'click', function( event ) {
    const isClickInside = siteNavigation.contains( event.target );
  
    if ( ! isClickInside ) {
      siteNavigation.classList.remove( 'toggled' );
      site.classList.remove( 'stop-scroll' );
    }
  } );
  
}() );


let catElement = document.querySelector(".cat-list_item");
let formatElement = document.querySelector(".format-list_item");
let orderElement = document.querySelector(".date_item");
let order = 'ASC';
let page = 8;
let category = '';
let format = '';
jQuery(function($) {
  $('body').on('click', '.js-load-photos', function() {
    page = page+8;
    var data = {
      'action': $(this).data('action'),
      'category': category,
      'format': format,
      'page': page,
      'order': order,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        $('.catalogue-photo').html(response);
        $('.catalogue-photo').show();
      } else {
        $('.catalogue-photo').hide();
      }
    });
  });

  $('body').on('change', '.cat-list_item', function() {
    category = catElement.value;
    page = 8;
    var data = {
      'action': $(this).data('action'),
      'category': category,
      'format': format,
      'page': page,
      'order': order,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        $('.catalogue-photo').html(response);
        $('.catalogue-photo').show();
      } else {
        $('.catalogue-photo').hide();
      }
    });
  });

  $('body').on('change', '.format-list_item', function() {
    format = formatElement.value;
    page = 8;
    var data = {
      'action': $(this).data('action'),
      'category': category,
      'format': format,
      'page': page,
      'order': order,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        $('.catalogue-photo').html(response);
        $('.catalogue-photo').show();
      } else {
        $('.catalogue-photo').hide();
      }
    });
  });

  $('body').on('change', '.date_item', function() {
    order = orderElement.value;
    var data = {
      'action': $(this).data('action'),
      'category': category,
      'format': format,
      'page': page,
      'order': order,
      'security': blog.security
    };
    console.log(blog.ajaxurl);
    console.log(data);
 
    $.post(blog.ajaxurl, data, function(response) {
      if($.trim(response) != '') {
        $('.catalogue-photo').html(response);
        $('.catalogue-photo').show();
      } else {
        $('.catalogue-photo').hide();
      }
    });
  });
});