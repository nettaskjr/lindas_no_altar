/**
 * @version $Id: mslider.js 77 2016-07-07 09:36:59Z szymon $
 * @package DJ-MediaTools
 * @subpackage DJ-MediaTools mslider layout
 * @copyright Copyright (C) 2012 DJ-Extensions.com, All rights reserved.
 * @license DJ-Extensions.com Proprietary Use License
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 */
!function(i){var e=window.DJImageMslider=window.DJImageMslider||function(i,e){this.options={autoplay:0,transition:"linear",duration:800,delay:3e3,ifade_multiplier:2,visible:3,lag:100},this.init(i,e)};e.prototype=Object.create(DJImageSlideshow.prototype),e.prototype.init=function(e,t){var s=this;jQuery.extend(s.options,t),s.visible=s.options.visible,s.sliderIn=i("#"+e).find(".dj-mslider-in").first(),s.offset=100*(s.options.width+s.options.spacing)/parseInt(s.sliderIn.css("max-width")),DJImageSlideshow.prototype.init.call(s,e,t),s.last=s.slides.length-s.slides.length%s.visible,s.last==s.slides.length&&(s.last-=s.visible)},e.prototype.setEffectsOptions=function(){var i=this;switch(DJImageSlideshow.prototype.setEffectsOptions.call(i),i.options.slider_type){case"up":case"down":i.options.lag&&(i.startEffect.top*=2,i.backEffect.top*=2);break;case"left":case"right":i.startEffect.left*=i.visible,i.backEffect.left*=i.visible,i.options.lag&&(i.startEffect.left*=2,i.backEffect.left*=2)}if(i.options.desc_effect)switch(i.options.desc_effect){case"left":case"right":i.desc_startEffect.marginLeft*=i.visible}},e.prototype.loadFirstSlide=function(){var e=this;e.slider.find(".dj-slides").first().css("opacity",0);for(var t=0;t<e.visible;t++)if(e.exist(t)){var s=i(e.slides[t]).find("img.dj-image").first(),o=function(i,s){i.length>1&&(s=i[1],i=i[0]),i.off("load",o),e.firstSlideLoaded(t)}.bind(e,[s,t]);s.on("load",o),e.preloadImage(t,!1)}},e.prototype.firstSlideLoaded=function(){var i=this;if(i.loading){for(var e=0;e<i.visible;e++)if(!i.slides[e].loaded)return;i.loader.fadeOut(200),i.slider.find(".dj-slides").first().animate({opacity:1},200),setTimeout(function(){i.autoPlay()},i.options.delay+500);for(var e=i.visible;e<2*i.visible;e++)i.exist(e)&&i.preloadImage(e,!1);i.loading=0}},e.prototype.setSlidesEffects=function(){for(var e=this,t=0;t<e.slides.length;t++)t<e.current+e.visible?i(e.slides[e.current+t]).css(e.endEffect):(i(e.slides[t]).css("visibility","hidden"),i(e.slides[t]).css(e.startEffect)),i(e.slides[t]).css("margin-left",e.offset*(t%e.visible)+"%");if("ifade"==e.options.slider_type){e.images=[];for(var s=e.transform?e.transform+" "+e.options.duration/2+"ms cubic-bezier(0.190, 1.000, 0.220, 1.000)":!1,t=0;t<e.slides.length;t++)e.images[t]=i(e.slides[t]).find(".dj-image").first(),e.images[t].length&&(s?(e.images[t].css(e.transition,s),t>=e.current+e.visible&&e.images[t].css(e.transform,"scale("+e.options.ifade_multiplier+")")):e.images[t].css("max-width","none"))}if(e.options.desc_effect)for(t=0;t<e.descriptions.length;t++)t<e.current+e.visible?i(e.descriptions[e.current+t]).css(e.desc_endEffect):(i(e.descriptions[t]).css("visibility","hidden"),i(e.descriptions[t]).css(e.desc_startEffect))},e.prototype.setIndicators=function(){var e=this;e.indicators=e.slider.find(".dj-indicators .dj-load-button"),e.indicators.length&&e.indicators.each(function(t){indicator=i(this),indicator.on("click",e.loadSlide.bind(e,t*e.visible))})},e.prototype.prevSlide=function(){var i=this;i.current<i.visible?i.loadSlide(i.last):i.loadSlide(i.current-i.visible)},e.prototype.nextSlide=function(){var i=this;i.current>=i.last?i.loadSlide(0):i.loadSlide(i.current+i.visible)},e.prototype.preloadImage=function(e,t){var s=this,o=i(s.slides[e]).find("img.dj-image").first();if(!s.slides[e].loaded){if(s.slides[e].loaded=!0,o.removeAttr("src"),t){s.loading++,s.loader.fadeIn(200);var r=function(i,e){i.length>1&&(e=i[1],i=i[0]),s.loading--,s.loading||(s.loader.fadeOut(200),e-=e%s.visible,s.loadSlide(e)),i.off("load",r)}.bind(s,[o,e]);o.on("load",r)}o.data();var a=o.data("sizes"),d=o.data("srcset"),l=o.data("src");o.removeAttr("data-sizes data-srcset data-src"),a&&d?(o.attr("sizes",a),o.attr("srcset",d),picturefill({elements:[o[0]]})):o.attr("src",l)}},e.prototype.loadSlide=function(e){var t=this;if(t.current!=e&&!t.loading){for(var s=!0,o=e;o<e+t.visible;o++)if(t.exist(o)){var r=i(t.slides[o]).find("img.dj-image").first();r.length&&!t.slides[o].loaded&&(t.preloadImage(o,!0),s=!1)}if(s){t.slider.find(".dj-slides").first().css("min-height","");for(var a=t.current,d=0,o=0;o<t.visible;o++)setTimeout(function(i,e){i.length>1&&(e=i[1],i=i[0]),t.slide(i,e)}.bind(t,[a+o,e+o]),o*t.options.lag),i(t.slides[e+o]).outerHeight()>d&&(d=i(t.slides[e+o]).outerHeight());t.slider.find(".dj-slides").first().css("min-height",d);for(var o=e+t.visible;o<e+2*t.visible;o++)t.exist(o)&&t.preloadImage(o,!1);t.setCurrentSlide(e)}}},e.prototype.setCurrentSlide=function(e){var t=this;i(t.slides[t.current]).removeClass("dj-active"),i(t.slides[e]).addClass("dj-active"),t.indicators.length&&(i(t.indicators[Math.ceil(t.current/t.visible)]).removeClass("dj-load-button-active"),i(t.indicators[Math.ceil(e/t.visible)]).addClass("dj-load-button-active")),t.playButton.length&&t.pauseButton.length&&(t.playButton.animate({opacity:0},200),t.pauseButton.animate({opacity:0},200)),t.current=e},e.prototype.responsive=function(){var e=this;e.slider.find(".dj-slides").first().css("min-height","");for(var t=0,s=0;s<e.visible;s++)i(e.slides[e.current+s]).outerHeight()>t&&(t=i(e.slides[e.current+s]).outerHeight());e.slider.find(".dj-slides").first().css("min-height",t),DJImageSlideshow.prototype.responsive.call(e)}}(jQuery);