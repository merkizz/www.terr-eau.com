function SliderImg(options) {
    var opts = options || {};
    this.options = {
        'width': opts.width || 940,
        'height': opts.height || 706,
        'initial': opts.initial || 50,
        'filter': {
            'active': opts.filter.active || false,
            'effect': opts.filter.effect || false
        }
    };
    SliderImg.prototype.createSlider = function (id) {
        var self = this;
        var container = document.getElementById(id);
        var children = container.children;
        var leftImg = children[0];
        var rightImg = children[1];
        var splitter = children[2];
        var ranger = children[3];
        // INITIAL STYLINGS
        container.style.height = self.options.height + 'px';
        leftImg.style.width = self.options.width + 'px';
        leftImg.style.height = self.options.height + 'px';
        rightImg.style.width = self.options.width + 'px';
        rightImg.style.height = self.options.height + 'px';
        ranger.style.top = rightImg.getBoundingClientRect().height + 'px';
        ranger.style.width = rightImg.width + 'px';
        ranger.value = self.options.initial;
        // initial overlap
        var initialClip = rightImg.width * self.options.initial / 100;
        splitter.style.left = initialClip + 'px';
        if (isWebkit()) {
            rightImg.style.webkitClipPath = 'inset(0px 0px 0px ' + initialClip + 'px)';
        }
        else {
            rightImg.style.clip = 'rect(0px, ' + initialClip + 'px, ' + self.options.height + 'px, 0px)';
        }
        if (self.options.filter.active) {
            if (isWebkit()) {
                leftImg.style.webkitFilter = self.options.filter.effect;
            }
            else {
                leftImg.style.filter = self.options.filter.effect;
            }
        }
        ranger.addEventListener('input', function () {
            var width = rightImg.width;
            var slidedWith = width * ranger.value / 100;
            if (isWebkit()) {
                rightImg.style.webkitClipPath = 'inset(1px 0px 0px ' + slidedWith + 'px)';
            }
            else {
                rightImg.style.clip = 'rect(0px, ' + slidedWith + 'px, 450px, 0px)';
            }
            splitter.style.left = slidedWith + 'px';
        });
    };
    var isWebkit = function () {
        return (/webkit/).test(window.navigator.userAgent.toLowerCase());
    };
}