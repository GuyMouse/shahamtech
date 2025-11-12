jQuery(document).ready(function ($) {

    function isMobile() {
        return ($(window).width() < 1024);
    }

    const fixedPattern = [
        [1, 3, 1, 2, 1, 1, 2, 1],
        [3, 1, 1, 1, 2, 1, 1, 3],
        [1, 1, 1, 1, 2, 1, 1, 3],
        [2, 1, 3, 1, 1, 3, 2, 1],
        [3, 3, 1, 3, 1, 1, 1, 2],
    ];

    const ROWS = 5, COLS = 8;
    const tiles = $('#tiles');


    function build() {
        tiles.empty();
        for (let r = 0; r < ROWS; r++) {
            for (let c = 0; c < COLS; c++) {
                tiles.append(`<div class="tile" data-r="${r}" data-c="${c}"></div>`);
            }
        }
    }

    build();

    resizeElement('.glassbox', $('.tile').height() * 3, $('.tile').width() * 6);
    resizeVideos();

    function resizeElement(target, height, width) {
        const elements = $(target);
        elements.css({ height: `${height}px`, width: `${width}px` });
    }

    function resizeVideos() {
        const width = $('.tile').width();
        const height = $('.tile').height();

        $('.glassbox .glassbox-videos .image-wrapper').each(function (i, el) {
            resizeElement(el, height, width);
        });
    }

    $(window).on('resize', function () {
        const width = $('.tile').width();
        const height = $('.tile').height();

        resizeElement('.glassbox', height * 3, width * 6);
        resizeVideos();
    });



});