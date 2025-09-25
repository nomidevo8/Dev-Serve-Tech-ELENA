jQuery(function($) {

    $('.eeb-toggle').on('click', function() {
        const box = $(this).closest('.eeb-box');
        const content = box.find('.eeb-content');

        if (content.is(':visible')) {
            content.slideUp();
        } else {
            content
                .css('display', 'flex') // set flex before animation
                .hide()
                .slideDown();
        }
        box.toggleClass('open');
    });

});