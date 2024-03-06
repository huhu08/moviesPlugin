jQuery(document).ready(function ($) {
    // Hide movie information by default
    $('.movie-info').hide();

    // Toggle movie information visibility on button click
    $('.toggle-movie-info').on('click', function () {
        $('.movie-info').slideToggle();
    });
});
