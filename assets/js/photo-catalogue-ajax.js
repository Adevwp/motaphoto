jQuery(document).ready(function($) {
    const ajaxurl = photo_catalogue_ajax_params.ajaxurl;
    let page = 2; // Commence à la page 2 car la première page est déjà chargée todo
console.log(page); // todo supp

    $('#loadmore-btn').click(function() {
        console.log("Bouton cliqué"); // todo supp
        const data = {
            'action': 'loadmore_photos',
            'query': photo_catalogue_ajax_params.posts, // Les paramètres de la requête initiale tot
            'page': page
        };
        console.log("Envoi des données : ", data); // todo supp

        $.post(ajaxurl, data, function(response) {
            console.log("Réponse reçue : ", response); // todo supp
            if(response) {
                $("#photos-list").append(response); // Ajoute les nouveaux posts à la liste todo
                page++; // Incrémente le numéro de page
            } else {
                $('#loadmore-btn').hide(); // Cache le bouton s'il n'y a plus de posts à charger
            }
        });
    });
});
