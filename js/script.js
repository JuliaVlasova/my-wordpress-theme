jQuery(document).ready(function($) {
    $('.tab-button').on('click', function(e) {
        e.preventDefault();

        let tabId = $(this).data('tab');

        $('.tab-button').removeClass('active');
        $('.tabs-content__item').removeClass('active');

        $(this).addClass('active');
        $('#tab-' + tabId).addClass('active');
    });
});