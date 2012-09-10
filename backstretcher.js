/* backstretcher v1.0
   Stretches a picture to cover the background of a div or BODY.
   Copyright (C) 2011 paul pham <http://aquaron.com/jquery/backstretcher>

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
(function($) {
$.fn.backstretcher = function($o) {
	var _o = $.extend({
		width: '',
		height: '100%',
		bgs: [
			'landing.jpg'
		]
	},$o);

	var __ = {
		calculate: function($box) {
			if ($box.parent().get(0).tagName === 'BODY') {
				$('body').css({overflowY: 'auto'});
			}

			var _w = $box.width();
			var _h = parseInt(_w / (_o.ow / _o.oh), 10);

			if ($box.parent().get(0).tagName === 'BODY') {
				if (_h > $(window).height()) {
					$('body').css({overflowY: 'scroll'});
					_w = $box.width();
					_h = parseInt(_w / (_o.ow / _o.oh), 10);
				}
			}

			return [_w, _h];
		},

		loadimage: function($box) {
			var _img = $box.find('img');

			if (_img.length) {
				_img.hide();
				var _dim = __.calculate($box);
				_img.css({width: _dim[0], height: _dim[1]}).fadeIn();
				return false;
			} else {
				_img = $('<img\/>').attr('src', _o.bgs[_o.index]).hide()
					.appendTo($box);
			}

			_img.load(function() {
				_o.ow = $(this).width();
				_o.oh = $(this).height();

				var _dim = __.calculate($box);

				$(this).css({
					position: 'absolute',
					top: 0, left: 0,
					width: _dim[0], height: _dim[1]})
				.fadeIn('slow')
				.parent()
				.css({ height: _dim[1] });
			});
		},

		handler: function($box) {
			var _tmr = null;
			$(window).resize(function() {
				if (_tmr) {
					clearTimeout(_tmr);
				}
				_tmr = setTimeout(function() { __.loadimage($box); },500);
			});
		}
	};

	return this.each(function() {
		_o.index = Math.floor(Math.random() * _o.bgs.length);

		var _box = $('<div class="aqBackStretcher"><\/div>')
		.css({width: _o.width, height: _o.height, position: 'relative'})
		.appendTo(this);

		$(this).css({padding: 0, margin: 0});

		__.loadimage(_box);
		__.handler(_box);

		return true;
	});
};
})(jQuery);
