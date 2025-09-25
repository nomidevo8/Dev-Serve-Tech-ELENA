jQuery(function($) {
    $('.eeb-toggle').on('click', function() {
        const toggle = $(this);
        const box = toggle.closest('.eeb-box');
        const content = box.find('.eeb-content');
        const isOpen = content.is(':visible');

        if (isOpen) {
            content.slideUp(function() {
                // After closing, set the closed text
                toggle.text('VIEW MORE ▼');
            });
        } else {
            content
                .css('display', 'flex') // keep flex
                .hide()
                .slideDown(function() {
                    // After opening, set the open text
                    toggle.text('VIEW LESS ▲');
                });
        }

        box.toggleClass('open');
    });
});