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

( function() {
  let dropdowns = document.querySelectorAll(".drop-down");

  dropdowns.forEach( function(dropdown) {
    dropdown.onclick = function() {
      dropdown.childNodes[3].classList.toggle( 'ghost' );
      this.querySelector('.first_item i').classList.toggle('fa-chevron-down');
      this.querySelector('.first_item i').classList.toggle('fa-chevron-up');
    }

    document.addEventListener( 'click', function( event ) {
      const isClickInside = dropdown.contains( event.target );
    
      if ( ! isClickInside ) {
        dropdown.childNodes[3].classList.remove( 'ghost' );
        // if ( dropdown.querySelector('.first_item i').classList.contains('fa-chevron-up') === true) {
        //   dropdown.querySelector('.first_item i').classList.replace('fa-chevron-up', 'fa-chevron-down');
        //   console.log( dropdown.querySelector('.first_item i').classList.contains('fa-chevron-up'));
        //   console.log(dropdown.childNodes[3]);
        // }
      }
    });
  });
}() );


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
    })
    .then( () => {
      $.getScript('wp-content/themes/motaphoto/js/lightbox-scripts.js', function() {
      // Une fois que le script est chargé, exécutez le code spécifique que vous souhaitez
      // par exemple, si lightbox-scripts.js a une fonction nommée initLightbox(), vous pouvez l'appeler ici
        initLightbox();
      });
    });
  });

  $('.cat-list_item li').each( function(catElement) {
    $(this).on('click', function() {
      category = $(this).attr('value');
      page = 8;
      var data = {
        'action': 'capitaine_load_photos',
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
      })
      .then( () => {
        $.getScript('wp-content/themes/motaphoto/js/lightbox-scripts.js', function() {
        // Une fois que le script est chargé, exécutez le code spécifique que vous souhaitez
        // par exemple, si lightbox-scripts.js a une fonction nommée initLightbox(), vous pouvez l'appeler ici
          initLightbox();
        });
      });
    });
  });

  $('.format-list_item li').each( function(formatElement) {
    $(this).on('click', function() {
      format = $(this).attr('value');
      page = 8;
      var data = {
        'action': 'capitaine_load_photos',
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
      })
      .then( () => {
        $.getScript('wp-content/themes/motaphoto/js/lightbox-scripts.js', function() {
        // Une fois que le script est chargé, exécutez le code spécifique que vous souhaitez
        // par exemple, si lightbox-scripts.js a une fonction nommée initLightbox(), vous pouvez l'appeler ici
          initLightbox();
        });
      });
    });
  });

  $('.date-list_item li').each( function(orderElement) {
    $(this).on('click', function() {
      order = $(this).attr('value');
      var data = {
        'action': 'capitaine_load_photos',
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
      })
      .then( () => {
        $.getScript('wp-content/themes/motaphoto/js/lightbox-scripts.js', function() {
        // Une fois que le script est chargé, exécutez le code spécifique que vous souhaitez
        // par exemple, si lightbox-scripts.js a une fonction nommée initLightbox(), vous pouvez l'appeler ici
          initLightbox();
        });
      });
    });
  });
});