import * as $ from '../utils/dom';

export let init = () => {
    $('[data-role="image-slider"]').forEach((elem) => {
        new SliderImage(elem);
    });
};

class SliderImage {
    $containerHtml: any;
    $container: any;
    $imgLeft: any;
    $imgRight: any;
    $tagRight: any;
    $splitter: any;
    $ranger: any;

    $width: number;
    $height: number;
    $position: number;
    $filter: string;

    $containerWidth: number;
    $containerHeight: number;

    constructor(container) {
        this.$containerHtml = container;
        this.$container = $(this.$containerHtml);
        this.$imgLeft = this.$container.select('.img-wrapper.left .img');
        this.$imgRight = this.$container.select('.img-wrapper.right .img');
        this.$tagRight = this.$container.select('.img-wrapper.right .tag');
        this.$splitter = this.$container.select('.slider-bar');
        this.$ranger = this.$container.select('input[type=range].slider-range');

        this.$width = container.getAttribute('data-width');
        this.$height = container.getAttribute('data-height');
        this.$position = container.getAttribute('data-position');
        this.$filter = container.getAttribute('data-filter');

        this.$imgLeft.css('width', this.$width + 'px');
        this.$imgLeft.css('height', this.$height + 'px');
        this.$imgRight.css('width', this.$width + 'px');
        this.$imgRight.css('height', this.$height + 'px');
        this.$ranger.css('width', this.$width + 'px');
        this.$ranger.value = this.$position;

        if (this.$filter) {
            this.$imgLeft.css('-webkit-filter', this.$filter);
            this.$imgLeft.css('filter', this.$filter);
        }

        let baseImg = container.getElementsByTagName('img')[0];
        this.$containerWidth = baseImg.getBoundingClientRect().width;
        this.$containerHeight = this.$containerWidth * this.$height / this.$width;

        this.$container.css('width', this.$containerWidth + 'px');
        this.$container.css('height', this.$containerHeight + 'px');

        this.setPosition(this.$position);

        this.$ranger.on('input', (e) => {
            this.setPosition(e.target.value);
        });
    }

    setPosition(value) {
        this.$imgRight.css('-webkit-clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$imgRight.css('clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$splitter.css('left', 'calc(' + value + '% - ' + (value == 0 ? 5 : 0) + 'px)');

        let tagRightClipPath = 110 - (this.$containerWidth - this.$splitter.css('left'));
        this.$tagRight.css('-webkit-clip-path', 'inset(0px 0px 0px ' + tagRightClipPath + 'px)');
        this.$tagRight.css('clip-path', 'inset(0px 0px 0px ' + tagRightClipPath + 'px))');
    }
}

init();