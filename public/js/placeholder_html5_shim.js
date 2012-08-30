/*

EXAMPLE USAGE:

placeholderize('placeholder-on', document);

EXAMPLE CSS:
.placeholder-on {
	color: #85929C !important;
}
:-moz-placeholder {
	color: #85929C !important;
}
::-webkit-input-placeholder {
	color: #85929C !important;
}
:placeholder {
	color: #85929C !important;
}

*/
function placeholderize(cssClassName, parent) {
	
	var testInput = document.createElement('input');
	var testTexarea = document.createElement('textarea');
	
	if (!('placeholder' in testInput) || !('placeholder' in testTexarea)) {
		setup();
	}	
	
	function setup() {
		parent = parent || document;
		var cssClassNameRegex = new RegExp('\\b' + cssClassName + '\\b', 'g');
		var i = 0;
		var input; 
		var inputs;
		if (!('placeholder' in testInput)) {
			inputs = parent.getElementsByTagName('input');
			while ((input = inputs[i++])) {
				if ( !! input.getAttribute('placeholder')) {
					setupElement(input);
				}
			}
			i = 0;
		}
		if (!('placeholder' in testTexarea)) {
			inputs = parent.getElementsByTagName('textarea');
			while ((input = inputs[i++])) {
				if ( !! input.getAttribute('placeholder')) {
					setupElement(input);
				}
			}
		}
		
		// shortcut to add listeners
		function listen(el, type, fn) {
			if (document.addEventListener) {
				el.addEventListener(type, fn, false);
			} else if (document.attachEvent) {
				el.attachEvent('on' + type, fn);
			}
		}

		function setupElement(input) {
			if (input.placeholderized) {
				return;
			}
			input.placeholderized = true;
			// style
			stylePlaceholder(input);
			// observers
			if (input.type == 'password') {
				setupPassword(input);
			} else {
				setupText(input);
			}
			if (input.form && input.form.tagName) {
				listen(input.form, 'submit', function() {
					clearIfPlaceholder(input);
				});
			}
		}

		function setupPassword(input) {
			var passwordInput = input;
			var parent = passwordInput.parentNode;
			var textInput = document.createElement('input');
			var copyAttr = function (dest, source, attr) {
				var name, i = 0;
				while ((name = attr[i++])) {
					dest.setAttribute(name, source.getAttribute(name));
				}
			};
			var showText = function () {
				// if password value is empty, show text input with placeholder
				if (passwordInput.value == '' && passwordInput.parentNode) {
					textInput.value = passwordInput.getAttribute('placeholder');
					parent.replaceChild(textInput, passwordInput);
				}
			};
			var showPassword = function () {
				// show password input
				if (textInput.parentNode) {
					parent.replaceChild(passwordInput, textInput);
					window.setTimeout(function () {
						// IE needs a moment to add the password to the DOM tree before focusing (tested on IE8)
						passwordInput.focus();
					}, 10);
				}
			};
			textInput.type = 'text';
			copyAttr(textInput, passwordInput, 'id class style title size maxlength'.split(' '));
			stylePlaceholder(passwordInput);
			listen(textInput, 'focus', showPassword);
			listen(passwordInput, 'blur', showText);
			showText();
		}

		function setIfEmpty(input) {
			if (input.value == '' || input.value == input.getAttribute('placeholder')) {
				input.value = input.getAttribute('placeholder');
				stylePlaceholder(input);
			} else {
				styleInput(input);
			}
		}
		
		function clearIfPlaceholder(input) {
			if (input.value == input.getAttribute('placeholder')) {
				input.value = '';
				styleInput(input);
			}
		}

		function setupText(input) {
			// add listeners
			listen(input, 'focus', function() {
				clearIfPlaceholder(input);
			});
			listen(input, 'blur', function() {
				setIfEmpty(input);
			});
			// initialize placeholders
			clearIfPlaceholder(input);
			setIfEmpty(input);
		}

		function stylePlaceholder(input) {
			if (cssClassName) {
				addCssClass(input);
			}
			else {
				input.style.color = '#A9A9A9';
			}
		}

		function styleInput(input) {
			if (cssClassName) {
				removeCssClass(input);
			}
			else {
				input.style.color = '';
			}		
		}
		
		function removeCssClass(input) {
			input.className = input.className.replace(cssClassNameRegex, '').replace(/^\s*(\S*(\s+\S+)*)\s*$/, "$1");
		}
		
		function addCssClass(input) {
			removeCssClass(input);
			input.className = (input.className.length > 0 ? input.className + ' ' : '') + cssClassName;
		}
			
	}

}