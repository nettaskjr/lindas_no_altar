/**
 * @version $Id: tabber.js 77 2016-07-07 09:36:59Z szymon $
 * @package DJ-MediaTools
 * @subpackage DJ-MediaTools tabber layout
 * @copyright Copyright (C) 2012 DJ-Extensions.com, All rights reserved.
 * @license DJ-Extensions.com Proprietary Use License
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 */
!function(t){var i=window.DJImageTabber=window.DJImageTabber||function(t,i){this.options={autoplay:0,transition:"linear",duration:800,delay:3e3,ifade_multiplier:2,tab_height:45,tab_indicator:2},this.init(t,i)};i.prototype=Object.create(DJImageSlideshow.prototype),i.prototype.init=function(t,i){var o=this;jQuery.extend(o.options,i),DJImageSlideshow.prototype.init.call(o,t,i),o.slides.length&&o.setTabs()},i.prototype.setTabs=function(){var i=this;i.tabs=i.slider.find(".dj-tabs .dj-tab"),i.tabs.length&&i.tabs.each(function(o){t(this).on("click",i.loadSlide.bind(i,o))}),i.tabIndicator=i.slider.find(".dj-tab-indicator").first(),i.tabIndicatorBox=i.slider.find(".dj-tabs-in").first(),i.tabIndicatorBox.length&&i.tabs.length&&(i.options.tab_height=t(i.tabs[0]).outerHeight(),i.options.tab_height+=Math.max(0,parseInt(t(i.tabs[0]).css("margin-top")),parseInt(t(i.tabs[0]).css("margin-bottom"))))},i.prototype.setCurrentSlide=function(i){var o=this;o.tabs.length&&(t(o.tabs[o.current]).removeClass("dj-tab-active"),t(o.tabs[i]).addClass("dj-tab-active")),DJImageSlideshow.prototype.setCurrentSlide.call(o,i),o.responsive()},i.prototype.responsive=function(){var i=this;if(i.tabIndicatorBox.length&&i.tabs.length){var o=i.getSize(i.slider.find(".dj-tabs").first()).y,a=-i.current*i.options.tab_height+(o-i.options.tab_height)/2;t(i.tabs[i.current]).position().top<o/2||i.tabs.length*i.options.tab_height<o?a=0:t(i.tabs[i.current]).position().top+i.options.tab_height>i.tabs.length*i.options.tab_height-o/2&&(a=-i.tabs.length*i.options.tab_height+o-t(i.tabs[0]).position().top),i.tabIndicatorBox.animate({marginTop:a},i.options.duration),i.tabIndicator.length&&(2==i.options.tab_indicator?i.tabIndicator.animate({top:i.options.tab_height*i.current},i.options.duration/2):1==i.options.tab_indicator&&i.tabIndicator.css("top",i.options.tab_height*i.current))}DJImageSlideshow.prototype.responsive.call(i)}}(jQuery);