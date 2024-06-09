(function ($) {
    $(document).ready(function () { 
        let paged = 2; 

        // Chargement des photos en Ajax
        $('.js-load-photos').on('click', function (e) {
            e.preventDefault();

            const ajaxurl = $(this).data('url');
            const nonce = $(this).data('nonce');

            const data = {
                action: 'load_photos',
                nonce: nonce,
                paged: paged
            };

            console.log("Envoi de la requête AJAX avec les données :", data);

            // Cacher le message au début de chaque requête
            $('.photos-message').hide();

            $.post(ajaxurl, data, function (response) {

                if (response.success) {
                    $('.galerie-photos__column').append(response.data);
                    paged++;
                } else {
                    $('.photos-message').text(response.data).show(); 

                    // Délai pour cacher le message après 10 secondes
                    setTimeout(function() {
                        $('.photos-message').fadeOut('slow');
                    }, 10000);

                    if (response.data === "Il n'y a plus de photos à charger.") {
                        $('.js-load-photos').hide();
                    }
                }
            });
        });
    });
})(jQuery);