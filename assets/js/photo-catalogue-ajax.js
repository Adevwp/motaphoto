jQuery(document).ready(function($) {
    const ajaxurl = photo_catalogue_ajax_params.ajaxurl;
    let page = 1;

    $('#loadmore-btn').click(function() {
        const data = {
            'action': 'loadmore_photos',
            'query': photo_catalogue_ajax_params.posts,
            'page': page
        };

        $.post(ajaxurl, data, function(response) {
            if(response !== 'no_more_posts') {
                $("#photos-list").append(response);
                page++;
            } else {
                $('#loadmore-btn').hide();
            }
        });
    });
});
