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


(function ($) {
  $(document).ready(function () {

    // Chargment des photos en Ajax
    $('.js-load-photos').click(function (e) {

      // Empêcher l'envoi classique du formulaire
      e.preventDefault();

      // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
      const ajaxurl = $(this).data('ajaxurl');

      // Les données de notre formulaire
			// ⚠️ Ne changez pas le nom "action" !
      const data = {
        action: $(this).data('action'), 
        nonce:  $(this).data('nonce'),
        postid: $(this).data('postid'),
    }

      // Pour vérifier qu'on a bien récupéré les données
      console.log(ajaxurl);
      console.log(data);

      // Requête Ajax en JS natif via Fetch
      fetch(ajaxurl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'Cache-Control': 'no-cache',
        },
        body: new URLSearchParams(data),
      })
      .then(response => response.json())
      .then(response => {
        console.log(response);

        // En cas d'erreur
        if (!response.success) {
          alert(response.data);
          return;
        }

        // Et en cas de réussite
        $(this).hide(); // Cacher le formulaire
        $('.catalogue-photo').html(response.data); // Et afficher le HTML
        console.log(response.data.query);
      });
    });
   
  });
})(jQuery);