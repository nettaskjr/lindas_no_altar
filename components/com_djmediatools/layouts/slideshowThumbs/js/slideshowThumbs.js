/**
 * @version $Id: slideshowThumbs.js 78 2016-07-07 09:48:03Z szymon $
 * @package DJ-MediaTools
 * @subpackage DJ-MediaTools slideshowThumbs layout
 * @copyright Copyright (C) 2012 DJ-Extensions.com, All rights reserved.
 * @license DJ-Extensions.com Proprietary Use License
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 */
!function(t){var i=window.DJImageSlideshowThumbs=window.DJImageSlideshowThumbs||function(t,i){this.options={autoplay:0,transition:"linear",duration:800,delay:3e3,ifade_multiplier:2},this.init(t,i)};i.prototype=Object.create(DJImageSlideshow.prototype),i.prototype.setIndicators=function(){var i=this;DJImageSlideshow.prototype.setIndicators.call(this),i.indicatorBox=i.slider.find(".dj-indicators-in").first(),i.indicatorBox.length&&i.indicators.length&&(i.thumb_width=t(i.indicators[0]).outerWidth(!0))},i.prototype.setCurrentSlide=function(i){var o=this;if(o.indicatorBox.length&&o.indicators.length){o.thumb_width=t(o.indicators[0]).outerWidth(!0);var e=o.getSize(o.slider.find("div").first()).x,n=-i*o.thumb_width+(e-o.thumb_width)/2;t(o.indicators[i]).position().left<e/2||o.indicators.length*o.thumb_width<e?n=0:t(o.indicators[i]).position().left+o.thumb_width>o.indicators.length*o.thumb_width-e/2&&(n=-o.indicators.length*o.thumb_width+e-t(o.indicators[0]).position().left),o.indicatorBox.animate({left:n},o.options.duration)}DJImageSlideshow.prototype.setCurrentSlide.call(o,i)}}(jQuery);