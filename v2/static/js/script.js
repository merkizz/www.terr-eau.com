(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
/*
 * Google page speed use an old version of chrome,
 * so we check it before it wreck our stats
 */
exports.isGgPageSpeed = function () {
    return !!navigator.userAgent.match(/Google Page Speed Insights/gi);
};
exports.isGgBot = function () {
    return !!navigator.userAgent.match(/Googlebot/gi);
};
exports.isWindowsPhone7 = function () {
    return !!navigator.userAgent.match(/Windows Phone OS 7.5/gi);
};
exports.isBot = function () {
    return exports.isGgPageSpeed() || exports.isGgBot();
};
exports.isIE8 = function () {
    return window.RTLNET_IE8_BROWSER || false;
};
exports.isIE = function () {
    return navigator.userAgent.toLowerCase().indexOf('msie') != -1;
};
exports.getIEVersion = function () {
    return exports.isIE() ? parseInt(navigator.userAgent.toLowerCase().split('msie')[1]) : null;
};

},{}],2:[function(require,module,exports){
"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var $ = require("../utils/dom");
var userAgent = require("../boot/user-agent");
exports.init = function () {
    new HeaderMain($('[data-role="main-header"]')[0]);
};
exports.DATA_ROLE = {
    NAV_TOGGLER: 'nav-toggler',
    NAV_SLIDE: 'nav-slide',
};
var HeaderMain = /** @class */ (function () {
    function HeaderMain(header) {
        var _this = this;
        this.$header = $(header);
        this.$toggler = $(this.$header.select("[data-role=\"" + exports.DATA_ROLE.NAV_TOGGLER + "\"]")[0]);
        this.$navSlide = $(this.$header.select("[data-role=\"" + exports.DATA_ROLE.NAV_SLIDE + "\"]")[0]);
        if (userAgent.isIE() && userAgent.getIEVersion() <= 9) {
            this.$navSlide.addClass('old-ie');
        }
        this.$toggler.on('click', function (e) {
            e.preventDefault();
            _this.toggle();
        });
    }
    HeaderMain.prototype.toggle = function () {
        if (this.$navSlide.hasClass('active')) {
            $('body').removeClass('fixed');
            this.$navSlide.removeClass('active');
            this.$toggler.selectByClass('burger').removeClass('open');
        }
        else {
            $('body').addClass('fixed');
            this.$navSlide.addClass('active');
            this.$toggler.selectByClass('burger').addClass('open');
        }
    };
    return HeaderMain;
}());
exports.init();

},{"../boot/user-agent":1,"../utils/dom":5}],3:[function(require,module,exports){
"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var $ = require("../utils/dom");
exports.init = function () {
    $('[data-role="image-slider"]').forEach(function (elem) {
        new SliderImage(elem);
    });
};
var SliderImage = /** @class */ (function () {
    function SliderImage(container) {
        var _this = this;
        this.$containerHtml = container;
        this.$container = $(this.$containerHtml);
        this.$imgLeft = this.$container.select('.img-left');
        this.$imgRight = this.$container.select('.img-right');
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
        var baseImg = container.getElementsByClassName('img-left')[0];
        var containerWidth = baseImg.getBoundingClientRect().width;
        var containerHeight = containerWidth * this.$height / this.$width;
        console.log(baseImg);
        console.log(baseImg.getBoundingClientRect());
        console.log('w=' + containerWidth + ', h=' + containerHeight);
        this.$container.css('width', containerWidth + 'px');
        this.$container.css('height', containerHeight + 'px');
        // console.log('container : w=' + containerWidth + ', h=' + containerHeight);
        this.setPosition(this.$position);
        this.$ranger.on('input', function (e) {
            _this.setPosition(e.target.value);
        });
    }
    SliderImage.prototype.setPosition = function (value) {
        this.$imgRight.css('-webkit-clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$imgRight.css('clip-path', 'inset(0px 0px 0px ' + value + '%)');
        this.$splitter.css('left', value + '%');
    };
    return SliderImage;
}());
exports.init();

},{"../utils/dom":5}],4:[function(require,module,exports){
require('./module/header');
require('./module/image-slider');

},{"./module/header":2,"./module/image-slider":3}],5:[function(require,module,exports){
(function (global){
var utils = require('./utils');
var domCss = require('./dom/css');
var classes = require('./dom/classes');
var api = require('./dom/api');
/**
 * Work in progress, added features as needed. Inspired by :
 * - jquery
 * - https://github.com/bevacqua/dominus
 * - https://github.com/npm-dom/domquery
 * - https://github.com/component/dom
 * Aims to provide simple dom handling methods compatible with testing and browserify
 */
// default method is select at document level
module.exports = function (selector) {
    if (utils.isElement(selector)) {
        return augmentArray([selector]);
    }
    else {
        return augmentArray(select(document, selector));
    }
};
/**
 * method called 'select' not to get confused with Array.find method
 */
module.exports.select = module.exports;
module.exports.selectByClass = function (clazz) {
    return augmentArray(selectByClass(document, clazz));
};
function select(context, selector) {
    return utils.toArray(context.querySelectorAll(selector));
}
/**
 * selecting by class (getElementsByClassName) is a bit easier and faster than querySelectorAll
 * but doesn't work on ie <= i8 (http://caniuse.com/#search=getElementsByClassName)
 * http://stackoverflow.com/questions/30473141/difference-between-getelementsbyclassname-and-queryselectorall
 */
function selectByClass(context, clazz) {
    return utils.toArray(context.getElementsByClassName(clazz));
}
function augmentArray(array) {
    array.selectByMatcher = array_selectByMatcher;
    array.select = array_select;
    array.selectByClass = array_selectByClass;
    array.parent = array_parent;
    array.firstChild = array_firstChild;
    array.children = array_children;
    array.index = array_index;
    array.isEmpty = array_isEmpty;
    array.clear = array_clear;
    array.text = array_api_call.bind(array, api.text);
    array.html = array_api_call.bind(array, api.html);
    array.value = array_api_call.bind(array, api.value);
    array.data = array_data;
    array.attr = array_attr;
    array.removeAttr = array_removeAttr;
    array.css = array_css;
    array.bounds = array_bounds;
    array.addClass = array_classes_call.bind(array, classes.add);
    array.removeClass = array_classes_call.bind(array, classes.remove);
    array.hasClass = array_hasClass;
    array.before = array_insertAdjacentHTML.bind(array, 'beforebegin');
    array.prepend = array_insertAdjacentHTML.bind(array, 'afterbegin');
    array.append = array_insertAdjacentHTML.bind(array, 'beforeend');
    array.after = array_insertAdjacentHTML.bind(array, 'afterend');
    // migrated from renaissance dom api. This is akward here since it only happend on first selected node
    array.appendTag = array_append_tag;
    array.on = array_on;
    return array;
}
/**
 * Augmented array methods
 */
var array_selectByMatcher = function (selector, matcher) {
    var result = [];
    this.forEach(function (element) {
        result = result.concat(matcher(element, selector));
    });
    return augmentArray(result);
};
var array_select = function (selector) {
    return this.selectByMatcher(selector, select);
};
var array_selectByClass = function (selector) {
    return this.selectByMatcher(selector, selectByClass);
};
var array_isEmpty = function () {
    return this.length == 0;
};
var array_clear = function () {
    this.forEach(function (element) {
        element.innerHTML = "";
    });
};
var array_data = function (name) {
    return this.isEmpty() ? null : this[0].getAttribute('data-' + name);
};
var array_parent = function (selector) {
    if (this.isEmpty()) {
        return augmentArray([]);
    }
    var element = this[0];
    if (selector) {
        while (!element.matches(selector)) {
            element = element.parentNode;
            if (!element) {
                return augmentArray([]);
            }
        }
        return augmentArray([element]);
    }
    else {
        return element.parentNode ? augmentArray([element.parentNode]) : augmentArray([]);
    }
};
var array_firstChild = function (selector) {
    if (this.isEmpty()) {
        return augmentArray([]);
    }
    var element = this[0];
    if (selector) {
        return augmentArray([element.getElementsByClassName(selector)[0]]);
    }
};
var array_children = function (selector) {
    if (this.isEmpty()) {
        return augmentArray([]);
    }
    var element = this[0];
    if (selector) {
        return augmentArray(element.querySelectorAll(selector));
    }
    else {
        return element.children ? augmentArray(element.children) : augmentArray([]);
    }
};
var array_index = function (selector) {
    for (var index = 0; index < this.length; index++) {
        if (classes.contains(this[index], selector)) {
            return index;
        }
    }
    return -1;
};
var array_api_call = function (api, value) {
    var getter = arguments.length < 2;
    if (getter) {
        return this.length ? api(this[0]) : '';
    }
    else {
        this.forEach(function (element) {
            api(element, value);
        });
        return this;
    }
};
var array_attr = function (name, value) {
    var hash = name && typeof name === 'object';
    var set = hash ? setMany : setSingle;
    var setter = hash || arguments.length > 1;
    if (setter) {
        this.forEach(set);
        return this;
    }
    else {
        return this.length ? api.getAttr(this[0], name) : null;
    }
    function setMany(element) {
        api.manyAttr(element, name);
    }
    function setSingle(element) {
        api.attr(element, name, value);
    }
};
var array_removeAttr = function (name) {
    this.forEach(function (element) {
        element.removeAttribute(name);
    });
};
var array_css = function (name, value) {
    var props;
    var many = name && typeof name === 'object';
    var getter = !many && typeof value === 'undefined';
    if (getter) {
        return this.length ? domCss.getCss(this[0], name) : null;
    }
    if (many) {
        props = name;
    }
    else {
        props = {};
        props[name] = value;
    }
    this.forEach(domCss.setCss(props));
    return this;
};
var EMPTY_BOUNDS = { x: 0, y: 0, left: 0, right: 0, top: 0, bottom: 0, width: 0, height: 0 };
Object.freeze(EMPTY_BOUNDS);
var array_bounds = function () {
    return this.length ? this[0].getBoundingClientRect() : EMPTY_BOUNDS;
};
var array_classes_call = function (api, value) {
    this.forEach(function (element) {
        api(element, value);
    });
    return this;
};
var array_hasClass = function (value) {
    return this.some(function (element) {
        return classes.contains(element, value);
    });
};
var array_append_tag = function (tag, options) {
    options = options || {};
    var child = global.document.createElement(tag);
    var childWrapper = module.exports.select(child);
    if (options.classes) {
        childWrapper.addClass(options.classes);
    }
    if (options.text) {
        childWrapper.text(options.text);
    }
    this[0].appendChild(child);
    return childWrapper;
};
var array_insertAdjacentHTML = function (where, html) {
    this.forEach(function (element) {
        if (utils.isElement(element)) {
            element.insertAdjacentHTML(where, html);
        }
    });
    return this;
};
var array_on = function (type, delegateSelector, callback, capture) {
    var useDelegate = false;
    if (arguments.length == 2) {
        callback = delegateSelector;
    }
    else if (arguments.length == 3) {
        if (typeof delegateSelector == 'function') {
            capture = callback;
            callback = delegateSelector;
        }
        else {
            useDelegate = true;
        }
    }
    else if (arguments.length == 4) {
        useDelegate = true;
    }
    this.forEach(function (element) {
        element.addEventListener(type, function (e) {
            if (useDelegate) {
                var target = e.target;
                while (target && target != element) {
                    if (target.matches(delegateSelector)) {
                        callback(e, target);
                        break;
                    }
                    target = target.parentNode;
                }
            }
            else {
                callback(e, element);
            }
        }, capture || false);
    });
};

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{"./dom/api":6,"./dom/classes":7,"./dom/css":8,"./utils":9}],6:[function(require,module,exports){
var utils = require('../utils');
exports.html = function (elem, html) {
    var getter = arguments.length < 2;
    if (getter) {
        return elem.innerHTML;
    }
    else {
        elem.innerHTML = html;
    }
};
/**
 * Using innerText if defined, textContent otherwise
 * Beware of http://perfectionkills.com/the-poor-misunderstood-innerText/
 */
exports.text = function (elem, text) {
    var checkable = utils.isCheckable(elem);
    var getter = arguments.length < 2;
    if (getter) {
        return checkable ? elem.value : elem.innerText || elem.textContent;
    }
    else if (checkable) {
        elem.value = text;
    }
    else {
        elem.innerText = elem.textContent = text;
    }
};
exports.value = function (el, value) {
    var getter = arguments.length < 2;
    if (getter) {
        return el.value;
    }
    else {
        el.value = value;
    }
};
exports.attr = function (el, name, value) {
    if (!utils.isElement(el)) {
        return;
    }
    if (value === null || value === void 0) {
        el.removeAttribute(name);
        return;
    }
    var camel = utils.hyphenToCamel(name);
    if (camel in el) {
        el[camel] = value;
    }
    else {
        var hyphenate = utils.hyphenate(name);
        el.setAttribute(hyphenate, value);
    }
};
exports.getAttr = function (el, name) {
    var camel = utils.hyphenToCamel(name);
    if (camel in el) {
        return el[camel];
    }
    else if (el.getAttribute) {
        return el.getAttribute(name);
    }
    return null;
};
exports.manyAttr = function (elem, attrs) {
    Object.keys(attrs).forEach(function (attr) {
        exports.attr(elem, attr, attrs[attr]);
    });
};

},{"../utils":9}],7:[function(require,module,exports){
var trim = /^\s+|\s+$/g;
var whitespace = /\s+/;
var utils = require('../utils');
function interpret(input) {
    return typeof input === 'string' ? input.replace(trim, '').split(whitespace) : input;
}
function classes(el) {
    if (utils.isElement(el)) {
        return el.className ? el.className.replace(trim, '').split(whitespace) : [];
    }
    return [];
}
function set(el, input) {
    if (utils.isElement(el)) {
        el.className = interpret(input).join(' ');
    }
}
function add(el, input) {
    var current = remove(el, input);
    var values = interpret(input);
    current.push.apply(current, values);
    set(el, current);
    return current;
}
function remove(el, input) {
    var current = classes(el);
    var values = interpret(input);
    values.forEach(function (value) {
        var i = current.indexOf(value);
        if (i !== -1) {
            current.splice(i, 1);
        }
    });
    set(el, current);
    return current;
}
function contains(el, input) {
    var current = classes(el);
    var values = interpret(input);
    return values.every(function (value) {
        return current.indexOf(value) !== -1;
    });
}
module.exports = {
    add: add,
    remove: remove,
    contains: contains,
    set: set,
    get: classes
};

},{"../utils":9}],8:[function(require,module,exports){
var utils = require('../utils');
var numericCssProperties = {
    'column-count': true,
    'fill-opacity': true,
    'flex-grow': true,
    'flex-shrink': true,
    'font-weight': true,
    'line-height': true,
    'opacity': true,
    'order': true,
    'orphans': true,
    'widows': true,
    'z-index': true,
    'zoom': true
};
var numeric = /^\d+$/;
exports.getCss = function (el, prop) {
    if (!utils.isElement(el)) {
        return null;
    }
    var hprop = utils.hyphenate(prop);
    var result = window.getComputedStyle(el)[hprop];
    if (prop === 'opacity' && result === '') {
        return 1;
    }
    if (result.substr(-2) === 'px' || numeric.test(result)) {
        return parseFloat(result, 10);
    }
    return result;
};
exports.setCss = function (props) {
    var mapped = Object.keys(props).filter(bad).map(expand);
    function bad(prop) {
        var value = props[prop];
        return value !== null && value === value;
    }
    function expand(prop) {
        var hprop = utils.hyphenate(prop);
        var value = props[prop];
        if (typeof value === 'number' && !numericCssProperties[hprop]) {
            value += 'px';
        }
        return {
            name: hprop, value: value
        };
    }
    return function (el) {
        if (!utils.isElement(el)) {
            return;
        }
        mapped.forEach(function (prop) {
            el.style[prop.name] = prop.value;
        });
    };
};

},{"../utils":9}],9:[function(require,module,exports){
/**
 * Determines if an element is displayed using offsetWidth and offsetHeight.
 */
exports.isVisible = function (elem) {
    var w = elem.offsetWidth;
    var h = elem.offsetHeight;
    return (w == 0 && h == 0) ? false : (w > 0 && h > 0) ? true : elem.style.display != 'none';
};
/**
 * ie8+ compatible
 * See http://toddmotto.com/a-comprehensive-dive-into-nodelists-arrays-converting-nodelists-and-understanding-the-dom/
 */
exports.toArray = function (nodeList) {
    var array = [];
    for (var i = nodeList.length; i--; array.unshift(nodeList[i]))
        ;
    return array;
};
var elementObjects = typeof HTMLElement === 'object';
exports.isElement = function (obj) {
    return elementObjects ? obj instanceof HTMLElement : isElementObject(obj);
};
exports.isArray = function (array) {
    return Object.prototype.toString.call(array) === '[object Array]';
};
exports.isCheckable = function (elem) {
    return 'checked' in elem && elem.type === 'radio' || elem.type === 'checkbox';
};
function isElementObject(obj) {
    return obj &&
        typeof obj === 'object' &&
        typeof obj.nodeName === 'string' &&
        obj.nodeType === 1;
}
exports.hyphenToCamel = function (hyphens) {
    var part = /-([a-z])/g;
    return hyphens.replace(part, function (g, m) {
        return m.toUpperCase();
    });
};
exports.hyphenate = function (text) {
    var camel = /([a-z])([A-Z])/g;
    return text.replace(camel, '$1-$2').toLowerCase();
};

},{}]},{},[4]);
