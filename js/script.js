jQuery(document).ready(function ($) {
    $('.tab-button').on('click', function (e) {
        e.preventDefault();

        let tabId = $(this).data('tab');

        $('.tab-button').removeClass('active');
        $('.tabs-content__item').removeClass('active');

        $(this).addClass('active');
        $('#tab-' + tabId).addClass('active');
    });


    $('#load-more-btn').on('click', function () {
        let btn = $(this);
        let postId = btn.data('post-id');
        let offset = btn.data('offset');
        let limit = 3; 

        btn.text('Загрузка...').prop('disabled', true);

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_gallery_items',
                post_id: postId,
                offset: offset,
                limit: limit
            },
            success: function (response) {
                if (response.success) {
                    if (response.data.html) {
                        $('.my-awesome-gallery').append(response.data.html);
                       
                    }

                    btn.data('offset', parseInt(offset) + parseInt(limit));

                    if (!response.data.has_more) {   
                        btn.hide();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error, xhr.responseText); 
                alert('Ошибка загрузки: ' + error);
            },
            complete: function () {
                btn.text('Загрузить ещё').prop('disabled', false);
            }
        });
    });
});