/* ========================================================================
 * Bootstrap: transition.js v3.3.7
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
+ function($) {
	'use strict';
	// CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
	// ============================================================
	function transitionEnd() {
		var el = document.createElement('bootstrap')
		var transEndEventNames = {
			WebkitTransition: 'webkitTransitionEnd',
			MozTransition: 'transitionend',
			OTransition: 'oTransitionEnd otransitionend',
			transition: 'transitionend'
		}
		for (var name in transEndEventNames) {
			if (el.style[name] !== undefined) {
				return {
					end: transEndEventNames[name]
				}
			}
		}
		return false // explicit for ie8 (  ._.)
	}
	// http://blog.alexmaccaw.com/css-transitions
	$.fn.emulateTransitionEnd = function(duration) {
		var called = false
		var $el = this
		$(this).one('bsTransitionEnd', function() {
			called = true
		})
		var callback = function() {
			if (!called) $($el).trigger($.support.transition.end)
		}
		setTimeout(callback, duration)
		return this
	}
	$(function() {
		$.support.transition = transitionEnd()
		if (!$.support.transition) return
		$.event.special.bsTransitionEnd = {
			bindType: $.support.transition.end,
			delegateType: $.support.transition.end,
			handle: function(e) {
				if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
			}
		}
	})
}(jQuery);
/* ========================================================================
 * Bootstrap: dropdown.js v3.3.7
 * http://getbootstrap.com/javascript/#dropdowns
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
+ function($) {
	'use strict';
	// DROPDOWN CLASS DEFINITION
	// =========================
	var backdrop = '.dropdown-backdrop'
	var toggle = '[data-toggle="dropdown"]'
	var Dropdown = function(element) {
		$(element).on('click.bs.dropdown', this.toggle)
	}
	Dropdown.VERSION = '3.3.7'

	function getParent($this) {
		var selector = $this.attr('data-target')
		if (!selector) {
			selector = $this.attr('href')
			selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
		}
		var $parent = selector && $(selector)
		return $parent && $parent.length ? $parent : $this.parent()
	}

	function clearMenus(e) {
		if (e && e.which === 3) return
		$(backdrop).remove()
		$(toggle).each(function() {
			var $this = $(this)
			var $parent = getParent($this)
			var relatedTarget = {
				relatedTarget: this
			}
			if (!$parent.hasClass('open')) return
			if (e && e.type == 'click' && /input|textarea/i.test(e.target.tagName) && $.contains($parent[0], e.target)) return
			$parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))
			if (e.isDefaultPrevented()) return
			$this.attr('aria-expanded', 'false')
			$parent.removeClass('open').trigger($.Event('hidden.bs.dropdown', relatedTarget))
		})
	}
	Dropdown.prototype.toggle = function(e) {
		var $this = $(this)
		if ($this.is('.disabled, :disabled')) return
		var $parent = getParent($this)
		var isActive = $parent.hasClass('open')
		clearMenus()
		if (!isActive) {
			if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
				// if mobile we use a backdrop because click events don't delegate
				$(document.createElement('div')).addClass('dropdown-backdrop').insertAfter($(this)).on('click', clearMenus)
			}
			var relatedTarget = {
				relatedTarget: this
			}
			$parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))
			if (e.isDefaultPrevented()) return
			$this.trigger('focus').attr('aria-expanded', 'true')
			$parent.toggleClass('open').trigger($.Event('shown.bs.dropdown', relatedTarget))
		}
		return false
	}
	Dropdown.prototype.keydown = function(e) {
			if (!/(38|40|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return
			var $this = $(this)
			e.preventDefault()
			e.stopPropagation()
			if ($this.is('.disabled, :disabled')) return
			var $parent = getParent($this)
			var isActive = $parent.hasClass('open')
			if (!isActive && e.which != 27 || isActive && e.which == 27) {
				if (e.which == 27) $parent.find(toggle).trigger('focus')
				return $this.trigger('click')
			}
			var desc = ' li:not(.disabled):visible a'
			var $items = $parent.find('.dropdown-menu' + desc)
			if (!$items.length) return
			var index = $items.index(e.target)
			if (e.which == 38 && index > 0) index-- // up
				if (e.which == 40 && index < $items.length - 1) index++ // down
					if (!~index) index = 0
			$items.eq(index).trigger('focus')
		}
		// DROPDOWN PLUGIN DEFINITION
		// ==========================
	function Plugin(option) {
		return this.each(function() {
			var $this = $(this)
			var data = $this.data('bs.dropdown')
			if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
			if (typeof option == 'string') data[option].call($this)
		})
	}
	var old = $.fn.dropdown
	$.fn.dropdown = Plugin
	$.fn.dropdown.Constructor = Dropdown
		// DROPDOWN NO CONFLICT
		// ====================
	$.fn.dropdown.noConflict = function() {
			$.fn.dropdown = old
			return this
		}
		// APPLY TO STANDARD DROPDOWN ELEMENTS
		// ===================================
	$(document).on('click.bs.dropdown.data-api', clearMenus).on('click.bs.dropdown.data-api', '.dropdown form', function(e) {
		e.stopPropagation()
	}).on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle).on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown).on('keydown.bs.dropdown.data-api', '.dropdown-menu', Dropdown.prototype.keydown)
}(jQuery);
/* ========================================================================
 * Bootstrap: tab.js v3.3.7
 * http://getbootstrap.com/javascript/#tabs
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
+ function($) {
	'use strict';
	// TAB CLASS DEFINITION
	// ====================
	var Tab = function(element) {
		// jscs:disable requireDollarBeforejQueryAssignment
		this.element = $(element)
			// jscs:enable requireDollarBeforejQueryAssignment
	}
	Tab.VERSION = '3.3.7'
	Tab.TRANSITION_DURATION = 150
	Tab.prototype.show = function() {
		var $this = this.element
		var $ul = $this.closest('ul:not(.dropdown-menu)')
		var selector = $this.data('target')
		if (!selector) {
			selector = $this.attr('href')
			selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
		}
		if ($this.parent('li').hasClass('active')) return
		var $previous = $ul.find('.active:last a')
		var hideEvent = $.Event('hide.bs.tab', {
			relatedTarget: $this[0]
		})
		var showEvent = $.Event('show.bs.tab', {
			relatedTarget: $previous[0]
		})
		$previous.trigger(hideEvent)
		$this.trigger(showEvent)
		if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) return
		var $target = $(selector)
		this.activate($this.closest('li'), $ul)
		this.activate($target, $target.parent(), function() {
			$previous.trigger({
				type: 'hidden.bs.tab',
				relatedTarget: $this[0]
			})
			$this.trigger({
				type: 'shown.bs.tab',
				relatedTarget: $previous[0]
			})
		})
	}
	Tab.prototype.activate = function(element, container, callback) {
			var $active = container.find('> .active')
			var transition = callback && $.support.transition && ($active.length && $active.hasClass('fade') || !!container.find('> .fade').length)

			function next() {
				$active.removeClass('active').find('> .dropdown-menu > .active').removeClass('active').end().find('[data-toggle="tab"]').attr('aria-expanded', false)
				element.addClass('active').find('[data-toggle="tab"]').attr('aria-expanded', true)
				if (transition) {
					element[0].offsetWidth // reflow for transition
					element.addClass('in')
				} else {
					element.removeClass('fade')
				}
				if (element.parent('.dropdown-menu').length) {
					element.closest('li.dropdown').addClass('active').end().find('[data-toggle="tab"]').attr('aria-expanded', true)
				}
				callback && callback()
			}
			$active.length && transition ? $active.one('bsTransitionEnd', next).emulateTransitionEnd(Tab.TRANSITION_DURATION) : next()
			$active.removeClass('in')
		}
		// TAB PLUGIN DEFINITION
		// =====================
	function Plugin(option) {
		return this.each(function() {
			var $this = $(this)
			var data = $this.data('bs.tab')
			if (!data) $this.data('bs.tab', (data = new Tab(this)))
			if (typeof option == 'string') data[option]()
		})
	}
	var old = $.fn.tab
	$.fn.tab = Plugin
	$.fn.tab.Constructor = Tab
		// TAB NO CONFLICT
		// ===============
	$.fn.tab.noConflict = function() {
			$.fn.tab = old
			return this
		}
		// TAB DATA-API
		// ============
	var clickHandler = function(e) {
		e.preventDefault()
		Plugin.call($(this), 'show')
	}
	$(document).on('click.bs.tab.data-api', '[data-toggle="tab"]', clickHandler).on('click.bs.tab.data-api', '[data-toggle="pill"]', clickHandler)
}(jQuery);

/*
 *	jQuery dotdotdot 1.8.3
 *
 *	Copyright (c) Fred Heusschen
 *	www.frebsite.nl
 *
 *	Plugin website:
 *	dotdotdot.frebsite.nl
 *
 *	Licensed under the MIT license.
 *	http://en.wikipedia.org/wiki/MIT_License
 */
(function($, undef) {
	'use strict';
	if ($.fn.dotdotdot) {
		return;
	}
	$.fn.dotdotdot = function(o) {
		if (this.length === 0) {
			$.fn.dotdotdot.debug('No element found for "' + this.selector + '".');
			return this;
		}
		if (this.length > 1) {
			return this.each(function() {
				$(this).dotdotdot(o);
			});
		}
		var $dot = this;
		var orgContent = $dot.contents();
		if ($dot.data('dotdotdot')) {
			$dot.trigger('destroy.dot');
		}
		$dot.data('dotdotdot-style', $dot.attr('style') || '');
		$dot.css('word-wrap', 'break-word');
		if ($dot.css('white-space') === 'nowrap') {
			$dot.css('white-space', 'normal');
		}
		$dot.bind_events = function() {
			$dot.bind('update.dot', function(e, c) {
				$dot.removeClass("is-truncated");
				e.preventDefault();
				e.stopPropagation();
				switch (typeof opts.height) {
					case 'number':
						opts.maxHeight = opts.height;
						break;
					case 'function':
						opts.maxHeight = opts.height.call($dot[0]);
						break;
					default:
						opts.maxHeight = getTrueInnerHeight($dot);
						break;
				}
				opts.maxHeight += opts.tolerance;
				if (typeof c != 'undefined') {
					if (typeof c == 'string' || ('nodeType' in c && c.nodeType === 1)) {
						c = $('<div />').append(c).contents();
					}
					if (c instanceof $) {
						orgContent = c;
					}
				}
				$inr = $dot.wrapInner('<div class="dotdotdot" />').children();
				$inr.contents().detach().end().append(orgContent.clone(true)).find('br').replaceWith('  <br />  ').end().css({
					'height': 'auto',
					'width': 'auto',
					'border': 'none',
					'padding': 0,
					'margin': 0
				});
				var after = false,
					trunc = false;
				if (conf.afterElement) {
					after = conf.afterElement.clone(true);
					after.show();
					conf.afterElement.detach();
				}
				if (test($inr, opts)) {
					if (opts.wrap == 'children') {
						trunc = children($inr, opts, after);
					} else {
						trunc = ellipsis($inr, $dot, $inr, opts, after);
					}
				}
				$inr.replaceWith($inr.contents());
				$inr = null;
				if ($.isFunction(opts.callback)) {
					opts.callback.call($dot[0], trunc, orgContent);
				}
				conf.isTruncated = trunc;
				return trunc;
			}).bind('isTruncated.dot', function(e, fn) {
				e.preventDefault();
				e.stopPropagation();
				if (typeof fn == 'function') {
					fn.call($dot[0], conf.isTruncated);
				}
				return conf.isTruncated;
			}).bind('originalContent.dot', function(e, fn) {
				e.preventDefault();
				e.stopPropagation();
				if (typeof fn == 'function') {
					fn.call($dot[0], orgContent);
				}
				return orgContent;
			}).bind('destroy.dot', function(e) {
				e.preventDefault();
				e.stopPropagation();
				$dot.unwatch().unbind_events().contents().detach().end().append(orgContent).attr('style', $dot.data('dotdotdot-style') || '').removeClass('is-truncated').data('dotdotdot', false);
			});
			return $dot;
		}; //	/bind_events
		$dot.unbind_events = function() {
			$dot.unbind('.dot');
			return $dot;
		}; //	/unbind_events
		$dot.watch = function() {
			$dot.unwatch();
			if (opts.watch == 'window') {
				var $window = $(window),
					_wWidth = $window.width(),
					_wHeight = $window.height();
				$window.bind('resize.dot' + conf.dotId, function() {
					if (_wWidth != $window.width() || _wHeight != $window.height() || !opts.windowResizeFix) {
						_wWidth = $window.width();
						_wHeight = $window.height();
						if (watchInt) {
							clearInterval(watchInt);
						}
						watchInt = setTimeout(function() {
							$dot.trigger('update.dot');
						}, 100);
					}
				});
			} else {
				watchOrg = getSizes($dot);
				watchInt = setInterval(function() {
					if ($dot.is(':visible')) {
						var watchNew = getSizes($dot);
						if (watchOrg.width != watchNew.width || watchOrg.height != watchNew.height) {
							$dot.trigger('update.dot');
							watchOrg = watchNew;
						}
					}
				}, 500);
			}
			return $dot;
		};
		$dot.unwatch = function() {
			$(window).unbind('resize.dot' + conf.dotId);
			if (watchInt) {
				clearInterval(watchInt);
			}
			return $dot;
		};
		var opts = $.extend(true, {}, $.fn.dotdotdot.defaults, o),
			conf = {},
			watchOrg = {},
			watchInt = null,
			$inr = null;
		if (!(opts.lastCharacter.remove instanceof Array)) {
			opts.lastCharacter.remove = $.fn.dotdotdot.defaultArrays.lastCharacter.remove;
		}
		if (!(opts.lastCharacter.noEllipsis instanceof Array)) {
			opts.lastCharacter.noEllipsis = $.fn.dotdotdot.defaultArrays.lastCharacter.noEllipsis;
		}
		conf.afterElement = getElement(opts.after, $dot);
		conf.isTruncated = false;
		conf.dotId = dotId++;
		$dot.data('dotdotdot', true).bind_events().trigger('update.dot');
		if (opts.watch) {
			$dot.watch();
		}
		return $dot;
	};
	//	public
	$.fn.dotdotdot.defaults = {
		'ellipsis': '... ',
		'wrap': 'word',
		'fallbackToLetter': true,
		'lastCharacter': {},
		'tolerance': 0,
		'callback': null,
		'after': null,
		'height': null,
		'watch': false,
		'windowResizeFix': true,
		'maxLength': null
	};
	$.fn.dotdotdot.defaultArrays = {
		'lastCharacter': {
			'remove': [' ', '\u3000', ',', ';', '.', '!', '?'],
			'noEllipsis': []
		}
	};
	$.fn.dotdotdot.debug = function(msg) {};
	//	private
	var dotId = 1;

	function children($elem, o, after) {
		var $elements = $elem.children(),
			isTruncated = false;
		$elem.empty();
		for (var a = 0, l = $elements.length; a < l; a++) {
			var $e = $elements.eq(a);
			$elem.append($e);
			if (after) {
				$elem.append(after);
			}
			if (test($elem, o)) {
				$e.remove();
				isTruncated = true;
				break;
			} else {
				if (after) {
					after.detach();
				}
			}
		}
		return isTruncated;
	}

	function ellipsis($elem, $d, $i, o, after) {
		var isTruncated = false;
		//	Don't put the ellipsis directly inside these elements
		var notx = 'a, table, thead, tbody, tfoot, tr, col, colgroup, object, embed, param, ol, ul, dl, blockquote, select, optgroup, option, textarea, script, style';
		//	Don't remove these elements even if they are after the ellipsis
		var noty = 'script, .dotdotdot-keep';
		$elem.contents().detach().each(function() {
			var e = this,
				$e = $(e);
			if (typeof e == 'undefined') {
				return true;
			} else if ($e.is(noty)) {
				$elem.append($e);
			} else if (isTruncated) {
				return true;
			} else {
				$elem.append($e);
				if (after && !$e.is(o.after) && !$e.find(o.after).length) {
					$elem[$elem.is(notx) ? 'after' : 'append'](after);
				}
				if (test($i, o)) {
					if (e.nodeType == 3) // node is TEXT
					{
						isTruncated = ellipsisElement($e, $d, $i, o, after);
					} else {
						isTruncated = ellipsis($e, $d, $i, o, after);
					}
				}
				if (!isTruncated) {
					if (after) {
						after.detach();
					}
				}
			}
		});
		$d.addClass("is-truncated");
		return isTruncated;
	}

	function ellipsisElement($e, $d, $i, o, after) {
		var e = $e[0];
		if (!e) {
			return false;
		}
		var txt = getTextContent(e),
			space = (txt.indexOf(' ') !== -1) ? ' ' : '\u3000',
			separator = (o.wrap == 'letter') ? '' : space,
			textArr = txt.split(separator),
			position = -1,
			midPos = -1,
			startPos = 0,
			endPos = textArr.length - 1;
		//	Only one word
		if (o.fallbackToLetter && startPos === 0 && endPos === 0) {
			separator = '';
			textArr = txt.split(separator);
			endPos = textArr.length - 1;
		}
		if (o.maxLength) {
			txt = addEllipsis(txt.trim().substr(0, o.maxLength), o);
			setTextContent(e, txt);
		} else {
			while (startPos <= endPos && !(startPos === 0 && endPos === 0)) {
				var m = Math.floor((startPos + endPos) / 2);
				if (m == midPos) {
					break;
				}
				midPos = m;
				setTextContent(e, textArr.slice(0, midPos + 1).join(separator) + o.ellipsis);
				$i.children().each(function() {
					$(this).toggle().toggle();
				});
				if (!test($i, o)) {
					position = midPos;
					startPos = midPos;
				} else {
					endPos = midPos;
					//	Fallback to letter
					if (o.fallbackToLetter && startPos === 0 && endPos === 0) {
						separator = '';
						textArr = textArr[0].split(separator);
						position = -1;
						midPos = -1;
						startPos = 0;
						endPos = textArr.length - 1;
					}
				}
			}
			if (position != -1 && !(textArr.length === 1 && textArr[0].length === 0)) {
				txt = addEllipsis(textArr.slice(0, position + 1).join(separator), o);
				setTextContent(e, txt);
			} else {
				var $w = $e.parent();
				$e.detach();
				var afterLength = (after && after.closest($w).length) ? after.length : 0;
				if ($w.contents().length > afterLength) {
					e = findLastTextNode($w.contents().eq(-1 - afterLength), $d);
				} else {
					e = findLastTextNode($w, $d, true);
					if (!afterLength) {
						$w.detach();
					}
				}
				if (e) {
					txt = addEllipsis(getTextContent(e), o);
					setTextContent(e, txt);
					if (afterLength && after) {
						var $parent = after.parent();
						$(e).parent().append(after);
						if (!$.trim($parent.html())) {
							$parent.remove();
						}
					}
				}
			}
		}
		return true;
	}

	function test($i, o) {
		return ($i.innerHeight() > o.maxHeight || (o.maxLength && $i.text().trim().length > o.maxLength));
	}

	function addEllipsis(txt, o) {
		while ($.inArray(txt.slice(-1), o.lastCharacter.remove) > -1) {
			txt = txt.slice(0, -1);
		}
		if ($.inArray(txt.slice(-1), o.lastCharacter.noEllipsis) < 0) {
			txt += o.ellipsis;
		}
		return txt;
	}

	function getSizes($d) {
		return {
			'width': $d.innerWidth(),
			'height': $d.innerHeight()
		};
	}

	function setTextContent(e, content) {
		if (e.innerText) {
			e.innerText = content;
		} else if (e.nodeValue) {
			e.nodeValue = content;
		} else if (e.textContent) {
			e.textContent = content;
		}
	}

	function getTextContent(e) {
		if (e.innerText) {
			return e.innerText;
		} else if (e.nodeValue) {
			return e.nodeValue;
		} else if (e.textContent) {
			return e.textContent;
		} else {
			return "";
		}
	}

	function getPrevNode(n) {
		do {
			n = n.previousSibling;
		}
		while (n && n.nodeType !== 1 && n.nodeType !== 3);
		return n;
	}

	function findLastTextNode($el, $top, excludeCurrent) {
		var e = $el && $el[0],
			p;
		if (e) {
			if (!excludeCurrent) {
				if (e.nodeType === 3) {
					return e;
				}
				if ($.trim($el.text())) {
					return findLastTextNode($el.contents().last(), $top);
				}
			}
			p = getPrevNode(e);
			while (!p) {
				$el = $el.parent();
				if ($el.is($top) || !$el.length) {
					return false;
				}
				p = getPrevNode($el[0]);
			}
			if (p) {
				return findLastTextNode($(p), $top);
			}
		}
		return false;
	}

	function getElement(e, $i) {
		if (!e) {
			return false;
		}
		if (typeof e === 'string') {
			e = $(e, $i);
			return (e.length) ? e : false;
		}
		return !e.jquery ? false : e;
	}

	function getTrueInnerHeight($el) {
		var h = $el.innerHeight(),
			a = ['paddingTop', 'paddingBottom'];
		for (var z = 0, l = a.length; z < l; z++) {
			var m = parseInt($el.css(a[z]), 10);
			if (isNaN(m)) {
				m = 0;
			}
			h -= m;
		}
		return h;
	}
	//	override jQuery.html
	var _orgHtml = $.fn.html;
	$.fn.html = function(str) {
		if (str != undef && !$.isFunction(str) && this.data('dotdotdot')) {
			return this.trigger('update', [str]);
		}
		return _orgHtml.apply(this, arguments);
	};
	//	override jQuery.text
	var _orgText = $.fn.text;
	$.fn.text = function(str) {
		if (str != undef && !$.isFunction(str) && this.data('dotdotdot')) {
			str = $('<div />').text(str).html();
			return this.trigger('update', [str]);
		}
		return _orgText.apply(this, arguments);
	};
})(jQuery);
	/**
 * imagefill.js
 * Author & copyright (c) 2013: John Polacek
 * johnpolacek.com
 * https://twitter.com/johnpolacek
 *
 * Dual MIT & GPL license
 *
 * Project Page: http://johnpolacek.github.io/imagefill.js
 *
 * The jQuery plugin for making images fill their containers (and be centered)
 *
 * EXAMPLE
 * Given this html:
 * <div class="container"><img src="myawesomeimage" /></div>
 * $('.container').imagefill(); // image stretches to fill container
 *
 *
 */
 ;(function($) {

  $.fn.imagefill = function(options) {

    var $container = this,
        imageAspect = 1/1,
        containersH = 0,
        containersW = 0,
        defaults = {
          runOnce: false,
          target: 'img',
          throttle : 200  // 5fps
        },
        settings = $.extend({}, defaults, options);

    var $img = $container.find(settings.target).addClass('loading').css({'position':'absolute'});

    // make sure container isn't position:static
    var containerPos = $container.css('position');
    $container.css({'overflow':'hidden','position':(containerPos === 'static') ? 'relative' : containerPos});

    // set containerH, containerW
    $container.each(function() {
      containersH += $(this).outerHeight();
      containersW += $(this).outerWidth();
    });

    // wait for image to load, then fit it inside the container
      imageAspect = $img.width() / $img.height();
      $img.removeClass('loading');
      fitImages();
      if (!settings.runOnce) {
        checkSizeChange();
      }

    function fitImages() {
      containersH  = 0;
      containersW = 0;
      $container.each(function() {
        imageAspect = $(this).find(settings.target).width() / $(this).find(settings.target).height();
        var containerW = $(this).outerWidth(),
            containerH = $(this).outerHeight();
        containersH += $(this).outerHeight();
        containersW += $(this).outerWidth();

        var containerAspect = containerW/containerH;
        if (containerAspect < imageAspect) {
          // taller
          $(this).find(settings.target).css({
              width: 'auto',
              height: containerH,
              top:0,
              left:-(containerH*imageAspect-containerW)/2
            });
        } else {
          // wider
          $(this).find(settings.target).css({
              width: containerW,
              height: 'auto',
              top:-(containerW/imageAspect-containerH)/2,
              left:0
            });
        }
      });
    }

    function checkSizeChange() {
      var checkW = 0,
          checkH = 0;
      $container.each(function() {
        checkH += $(this).outerHeight();
        checkW += $(this).outerWidth();
      });
      if (containersH !== checkH || containersW !== checkW) {
        fitImages();
      }
      setTimeout(checkSizeChange, settings.throttle);
    }
    
    return this;
  };

}(jQuery));
