import * as $ from '../utils/dom';
import * as userAgent from '../boot/user-agent';

export let init = () => {
    new HeaderMain($('[data-role="main-header"]')[0]);
};

export const DATA_ROLE = {
    NAV_TOGGLER: 'nav-toggler',
    NAV_SLIDE: 'nav-slide',
};

class HeaderMain {
    $header: any;
    $toggler: any;
    $navSlide: any;

    constructor(header) {
        this.$header = $(header);
        this.$toggler = $(this.$header.select(`[data-role="${DATA_ROLE.NAV_TOGGLER}"]`)[0]);
        this.$navSlide = $(this.$header.select(`[data-role="${DATA_ROLE.NAV_SLIDE}"]`)[0]);

        if (userAgent.isIE() && userAgent.getIEVersion() <= 9) {
            this.$navSlide.addClass('old-ie');
        }

        this.$toggler.on('click', (e) => {
            e.preventDefault();
            this.toggle();
        });
    }

    toggle() {
        if (this.$navSlide.hasClass('active')) {
            $('body').removeClass('fixed');
            this.$navSlide.removeClass('active');
            this.$toggler.selectByClass('burger').removeClass('open');
        } else {
            $('body').addClass('fixed');
            this.$navSlide.addClass('active');
            this.$toggler.selectByClass('burger').addClass('open');
        }
    }
}

init();