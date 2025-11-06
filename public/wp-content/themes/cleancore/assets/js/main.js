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
    const transitionedPattern = [
        [1, 6, 4, 5, 1, 4, 5, 4],
        [3, 1, 1, 1, 5, 1, 1, 6],
        [1, 6, 4, 1, 5, 1, 1, 6],
        [5, 4, 6, 1, 1, 3, 2, 1],
        [6, 3, 1, 3, 1, 4, 1, 5],
    ];

    const ROWS = 5, COLS = 8;
    const tiles = $('#tiles');
    const tilesInverse = $('#tiles-inverse');

    function build(pattern, tilesDiv) {
        tilesDiv.empty();
        for (let r = 0; r < ROWS; r++) {
            for (let c = 0; c < COLS; c++) {
                const val = pattern[r][c];
                tilesDiv.append(`<div class="tile tile-${val}" data-r="${r}" data-c="${c}"></div>`);
            }
        }
    }

    build(fixedPattern, tiles);
    build(transitionedPattern, tilesInverse);

    setInterval(() => {
        tiles.fadeToggle(500);
    }, 2000)

});