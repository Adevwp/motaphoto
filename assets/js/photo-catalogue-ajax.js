// LOAD MORE PHOTOS
jQuery(document).ready(function($) {
    const ajaxurl = photo_catalogue_ajax_params.ajaxurl;
    let page = 2; // Begin at page 2, 1 already load

    $('#loadmore-btn').click(function() {
        const data = {
            'action': 'loadmore_photos',
            'query': photo_catalogue_ajax_params.posts, // Parameter for the initial
            'page': page
        };

        $.post(ajaxurl, data, function(response) {
            if(response.success) {
                $("#photos-list").append(response.data.content);
                page++;
            } else {
                $('#loadmore-btn').hide();
                $("#photos-list").append('<p class="noresult">' + response.data.message + '</p>');

            }
        }, 'json');
        
    });
});

// FILTER PHOTOS
jQuery(document).ready(function($) {
    $('#photo-category-select, #photo-format-select, #filter-section_date-sort').change(function() {
        const category = $('#photo-category-select').val();
        const format = $('#photo-format-select').val();
        const order = $('#filter-section_date-sort').val();
        const ajaxurl = photo_catalogue_ajax_params.ajaxurl;

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                order: order
            },
            success: function(response) {
                if(response.success) {
                    $("#photos-list").html(response.data.content);
                }
            },
            dataType: 'json'
        });
    });
});