import * as $ from '../utils/dom';

export let init = () => {
    $('[data-role="image-slider"]').forEach((elem) => {
        new SliderImage(elem);
    });
};

class SliderImage {
    $container: any;
    $imgLeft: any;
    $imgRight: any;
    $splitter: any;
    $ranger: any;

    constructor(container) {
        let width = container.getAttribute('data-width');
        let height = container.getAttribute('data-height');
        let position = container.getAttribute('data-position');
        let filter = container.getAttribute('data-filter');

        this.$container = $(container);
        this.$imgLeft = this.$container.select('.img-left');
        this.$imgRight = this.$container.select('.img-right');
        this.$splitter = this.$container.select('.slider-bar');
        this.$ranger = this.$container.select('input[type=range].slider-range');

        this.$container.css('width', width + 'px');
        this.$container.css('height', height + 'px');
        this.$imgLeft.css('width', width + 'px');
        this.$imgLeft.css('height', height + 'px');
        this.$imgRight.css('width', width + 'px');
        this.$imgRight.css('height', height + 'px');
        this.$ranger.css('width', width + 'px');
        this.$ranger.value = position;

        if (filter) {
            this.$imgLeft.css('-webkit-filter', filter);
            this.$imgLeft.css('filter', filter);
        }

        this.setPosition(position);

        this.$ranger.on('input', (e) => {
            this.setPosition(e.target.value);
        });
    }

    setPosition(value) {
        this.$imgRight.css('-webkit-clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$imgRight.css('clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$splitter.css('left', value + '%');
    }
}

init();