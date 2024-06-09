	/* Modale formulaire de contact */
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
   
    
    function toggleModal() {
      modal.classList.toggle("show-modal");
    }
    
    function windowOnClick(event) {
      if (event.target === modal) {
        toggleModal();
      }
    }
    
    trigger.addEventListener("click", toggleModal);
        
    window.addEventListener("click", windowOnClick);


    /* Affichage miniature photo page single photo au dessus des flèches */
    document.addEventListener("DOMContentLoaded", function() {
      const prevLink = document.querySelector('.prev-link');
      const nextLink = document.querySelector('.next-link');
      const thumbnail = document.querySelector('.photo-miniature-gauche');
      const thumbnailNext = document.querySelector('.photo-miniature-droite');

      thumbnail.style.display = 'none';
      thumbnailNext.style.display = 'none';

      prevLink.addEventListener('mouseover', function() {
          thumbnail.style.display = 'block';
      });
  
      prevLink.addEventListener('mouseout', function() {
          thumbnail.style.display = 'none';
      });
  
      nextLink.addEventListener('mouseover', function() {
          thumbnailNext.style.display = 'block';
      });
  
      nextLink.addEventListener('mouseout', function() {
          thumbnailNext.style.display = 'none';
      });
  });


/* Activation des filtres photos de la page d'acceuil */ 
(function ($) {
    $(document).ready(function () {
        // Gestion des changements dans les sélecteurs
        $('.form-select').change(function () {
            filtrer_photos();
        });

        // Fonction pour filtrer et trier les photos
        function filtrer_photos() {
            var categorie = $('#select-categories').val();
            var format = $('#select-formats').val();
            var tri = $('#select-tri').val();            

            // Envoyer une requête AJAX pour récupérer les photos filtrées et triées
            const nonce = $('#nonce').val();

            // Données à envoyer via AJAX
            var ajaxData = {
                action: 'filtrer_photos',
                nonce: nonce,
                categorie: categorie,
                format: format,
                tri: tri
            };

            console.log('Données AJAX :', ajaxData);
            const ajaxurlll = $("#ajaxurl").val();

            $.ajax({
                url: ajaxurlll,
                type: 'post',
                datatype: 'html',
                data: ajaxData,
                success: function (response) {
                    // Mettre à jour le contenu de la galerie avec les nouveaux résultats
                    $('.galerie-photos').html(response);                
                },
                error: function(xhr, status, error) {
                }
            });
        }
    });
})(jQuery);



/* Affichage menu mobile à partir du format tablette */
document.addEventListener('DOMContentLoaded', function () {
    let burgerMenu = document.getElementById('burger-menu');
    let overlay = document.getElementById('menu-mobile');
    
    burgerMenu.addEventListener('click', function () {
        this.classList.toggle("close");
        overlay.classList.toggle("overlay");
        console.log("burgerMenu classes: ", this.classList);
        console.log("overlay classes: ", overlay.classList);
    });
});


/* Boutons "select" page d'accueil */
(function ($) {
    $(document).ready(function() {
    $('select').niceSelect();
});
})(jQuery);


/* Bouton btn page Single photo - Fonction pour la référence de la photo dans le formulaire de contact */
const single_contact_btns = document.querySelectorAll (".bandeau-cta__btn");

single_contact_btns.forEach((single_contact_btn) => {
    single_contact_btn.addEventListener("click", () => {
        toggleModal();
        const reference = document.querySelector(".reference_value").innerHTML;
        const modal_ref_input = document.getElementById("ref-photo");
        modal_ref_input.value = reference;
    });
});
