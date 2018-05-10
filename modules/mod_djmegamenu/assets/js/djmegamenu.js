/**
 * @version $Id: djmegamenu.js 49 2016-01-14 03:18:06Z szymon $
 * @package DJ-MegaMenu
 * @copyright Copyright (C) 2013 DJ-Extensions.com, All rights reserved.
 * @license DJ-Extensions.com Proprietary Use License
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 */
(function($){var j=function(a,b){this.options={openDelay:250,closeDelay:500,animIn:'fadeIn',animOut:'fadeOut',animSpeed:'normal',duration:450,wrap:null,direction:'ltr',event:'mouseenter',touch:(('ontouchstart'in window)||(navigator.MaxTouchPoints>0)||(navigator.msMaxTouchPoints>0)),offset:0,wcag:1};this.init(a,b)};j.prototype.init=function(c,d){var f=this;f.options=Object.merge(f.options,d);if(!c)return;f.options.menu=c;switch(f.options.animSpeed){case'fast':f.options.duration=250;break;case'slow':f.options.duration=650;break}c.addClass(f.options.animSpeed);var g=c.getChildren('li.dj-up');f.kids=[];if(!f.options.wrap)f.options.wrap=c;else f.options.wrap=$(f.options.wrap);if(f.options.touch)c.addEvent('touchstart',function(e){e.stopPropagation()});g.each(function(a,b){f.kids[b]=new l(a,0,f,f.options)});if(f.options.fixed==1&&!f.options.touch){window.addEvent('load',f.makeSticky.bind(f,c))}};j.prototype.makeSticky=function(a){var b=this;b.sticky=false;var c=new Element('div',{id:a.get('id')+'sticky'});c.addClass('dj-megamenu');c.addClass('dj-megamenu-'+b.options.theme);c.addClass('dj-megamenu-sticky');c.setStyles({position:'fixed',top:parseInt(b.options.offset),left:0,width:'100%',display:'none'});c.inject(a,'after');var d=$(a.get('id')+'stickylogo');if(d){d.inject(c);d.setStyle('display','block')}var e=a.getPosition().y-parseInt(b.options.offset);var f=a.clone(true);f.set('id',a.get('id')+'placeholder');f.setStyles({display:'none',opacity:0});f.inject(a,'before');var g=b.options.direction=='rtl'?'right':'left';window.addEvent('scroll',b.scroll.bind(b,c,a,f,e,g,false));window.addEvent('resize',b.scroll.bind(b,c,a,f,e,g,true))};j.prototype.scroll=function(a,b,c,d,e,f){var g=this;if(window.getScroll().y>d){if(!g.sticky){var h=b.getCoordinates();var i=e=='left'?h.left:window.getSize().x-h.left-h.width;b.setStyle(e,i);c.setStyle('display','');a.setStyle('display','');b.inject(a);g.sticky=true}else if(f){var h=c.getCoordinates();var i=e=='left'?h.left:window.getSize().x-h.left-h.width;b.setStyle(e,i)}}else if(g.sticky){a.setStyle('display','none');c.setStyle('display','none');b.inject(c,'after');b.setStyle(e,'');g.sticky=false}};var l=function(a,b,c,d){this.options={};this.init(a,b,c,d)};l.prototype.init=function(b,c,d,f){var g=this;g.options=Object.merge(g.options,f);g.menu=b;g.level=c;g.parent=d;g.timer=null;g.blurTimer=null;g.sub=g.menu.getElement('> .dj-subwrap');var h='mouseenter';if(g.options.touch||g.options.event=='click_all'){h=g.options.touch?h:'click';var i=g.menu.getElement('> a');if(i){if(g.menu.hasClass('separator'))i.setStyle('cursor','pointer');function checkAnchor(e){if(g.sub&&!g.menu.hasClass('hover')){e.preventDefault();if(e.type=='touchend')g.menu.fireEvent('click')}};if(g.options.touch)i.addEvent('touchend',checkAnchor);i.addEvent('click',checkAnchor)}}else if(g.options.event=='click'&&g.menu.hasClass('separator')){var i=g.menu.getElement('> a');if(i)i.setStyle('cursor','pointer');h='click'}if(g.options.touch){g.menu.addEvent('click',g.showSub.bind(g));$(document).addEvent('touchstart',function(){if(g.menu.hasClass('hover'))g.menu.fireEvent('mouseleave')})}g.menu.addEvent(h,g.showSub.bind(g));g.menu.addEvent('mouseleave',g.hideSub.bind(g));if(g.options.wcag==1){var i=g.menu.getElement('> a');if(i){i.addEvent('focus',g.showSub.bind(g));i.addEvent('blur',function(){g.blurTimer=setTimeout(function(){if(!g.options.menu.getElement('a:focus')){var a=g;while(a.level>0){a.hideSub();a=a.parent}a.hideSub()}},1000)});i.addEvent('keydown',function(){g.focusNearest(event)})}g.options.menu.addEvent('click',function(){clearTimeout(g.blurTimer)})}if(g.sub){g.kids=[];g.initKids()}};l.prototype.focusNearest=function(c){var d=this;var e='which'in c?c.which:c.keyCode;var f=d.menu.getCoordinates();min={x:1024,y:1024},nearest=null;var g=function(a){if(!a.menu||!a.menu.getElement('> a'))return;var k=a.menu.getCoordinates();var b={x:Math.abs(k.top-f.top),y:Math.abs(k.left-f.left)};if((e==37&&k.left<f.left)||(e==39&&k.left>f.left)){if(b.x<min.x||(b.x==min.x&&b.y<min.y)){min=b;nearest=a}}else if((e==38&&k.top<f.top)||(e==40&&k.top>f.top)){if(b.y<min.y||(b.y==min.y&&b.x<min.x)){min=b;nearest=a}}};d.parent.kids.each(function(a){g(a)});if(!nearest){g(d.parent);if(d.sub){d.kids.each(function(a){g(a)})}}if(nearest){c.preventDefault();c.stopPropagation();nearest.menu.getElement('> a').focus()}};l.prototype.showSub=function(){var a=this;clearTimeout(a.timer);if(a.menu.hasClass('hover')&&!a.sub.hasClass(a.options.animOut)){return}if(a.sub){a.sub.setStyle('display','none')}a.timer=setTimeout(function(){clearTimeout(a.animTimer);a.menu.addClass('hover');a.hideOther();if(a.sub){a.sub.setStyle('display','');a.sub.removeClass(a.options.animOut);a.checkDir();a.sub.addClass(a.options.animIn)}},a.options.openDelay)};l.prototype.hideSub=function(){var a=this;clearTimeout(a.timer);if(a.sub){a.timer=setTimeout(function(){a.sub.removeClass(a.options.animIn);a.sub.addClass(a.options.animOut);a.animTimer=setTimeout(function(){a.menu.removeClass('hover')},a.options.duration)},a.options.closeDelay)}else{a.menu.removeClass('hover')}};l.prototype.checkDir=function(){var a=this;a.sub.setStyle('left','');a.sub.setStyle('right','');a.sub.setStyle('margin-left','');a.sub.setStyle('margin-right','');var b=a.sub.getCoordinates();var c=a.options.wrap.getCoordinates();if(a.options.wrap.hasClass('dj-megamenu')){var d=$(a.options.wrap.get('id')+'placeholder');if(d&&a.options.wrap.getElement('.dj-megamenu'))c=d.getCoordinates()}if(a.options.direction=='ltr'){var e=b.left+b.width-c.width-c.left;if(e>0||a.sub.hasClass('open-left')){if(a.level){a.sub.setStyle('right',a.menu.getSize().x);a.sub.setStyle('left','auto')}else{if(a.sub.hasClass('open-left')){a.sub.setStyle('right',a.menu.getStyle('left'));a.sub.setStyle('left','auto')}else{a.sub.setStyle('margin-left',-e)}}}}else if(a.options.direction=='rtl'){var e=b.left-c.left;if(e<0||a.sub.hasClass('open-right')){if(a.level){a.sub.setStyle('left',a.menu.getSize().x);a.sub.setStyle('right','auto')}else{if(a.sub.hasClass('open-right')){a.sub.setStyle('left',a.menu.getStyle('right'));a.sub.setStyle('right','auto')}else{a.sub.setStyle('margin-right',e)}}}}};l.prototype.initKids=function(){var c=this;var d=c.sub.getChildren('.dj-subwrap-in > .dj-subcol > ul.dj-submenu > li');d.each(function(a,b){c.kids[b]=new l(a,c.level+1,c,c.options)})};l.prototype.hideOther=function(){var b=this;b.parent.kids.each(function(a){if(a.menu.hasClass('hover')&&a!=b){if(a.sub){a.hideOtherSub();a.sub.removeClass(a.options.animIn);a.sub.addClass(a.options.animOut);a.animTimer=setTimeout(function(){a.menu.removeClass('hover')},b.options.duration)}else{a.menu.removeClass('hover')}}})};l.prototype.hideOtherSub=function(){var b=this;b.kids.each(function(a){if(a.sub){a.hideOtherSub();a.sub.removeClass(a.options.animIn);a.sub.removeClass(a.options.animOut)}a.menu.removeClass('hover')})};window.addEvent('domready',function(){$$('.dj-megamenu[data-options]').each(function(a){a.getElements('.dj-hideitem').destroy();var b=JSON.decode(a.getProperty('data-options'));a.removeProperty('data-options');new j(a,b)})})})(document.id);