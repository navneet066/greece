//var HOST = "http://127.0.0.1/greece/";
var HOST = "http://localhost/greece/";
jQuery(function () {
	var availableTags = [
		"SDL Trados",
		"Studio 2011/2014",
		"MemoQ",
		"WordFast",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
	];

	function split(val) {
		return val.split(/,\s*/);
	}

	function extractLast(term) {
		return split(term).pop();
	}

	jQuery("#catTools")
		// don't navigate away from the field on tab when selecting an item
		.bind("keydown", function (event) {
			if (event.keyCode === $.ui.keyCode.TAB &&
				$(this).autocomplete("instance").menu.active) {
				event.preventDefault();
			}
		}).autocomplete({
			minLength: 0,
			source: function (request, response) {
				// delegate back to autocomplete, but extract the last term
				response($.ui.autocomplete.filter(
					availableTags, extractLast(request.term)));
			},
			focus: function () {
				// prevent value inserted on focus
				return false;
			},
			select: function (event, ui) {
				var terms = split(this.value);
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push(ui.item.value);
				// add placeholder to get the comma-and-space at the end
				terms.push("");
				this.value = terms.join(", ");
				return false;
			}
		});
	jQuery(document).ready(function () {

		jQuery('#reload').click(function () {
			var captcha = $("#captcha_image");
			captcha.attr('src', captcha.attr('src') + '?' + Math.random());
			return false;
		});

	});
});

jQuery(function () {
	var availableIndustry = [
		"Automotive",
		"Life Sciences",
		"Pharma",
		"Engineering",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
	];

	function split(val) {
		return val.split(/,\s*/);
	}

	function extractLast(term) {
		return split(term).pop();
	}

	jQuery("#Industry")
		// don't navigate away from the field on tab when selecting an item
		.bind("keydown", function (event) {
			if (event.keyCode === $.ui.keyCode.TAB &&
				$(this).autocomplete("instance").menu.active) {
				event.preventDefault();
			}
		}).autocomplete({
			minLength: 0,
			source: function (request, response) {
				// delegate back to autocomplete, but extract the last term
				response($.ui.autocomplete.filter(
					availableIndustry, extractLast(request.term)));
			},
			focus: function () {
				// prevent value inserted on focus
				return false;
			},
			select: function (event, ui) {
				var terms = split(this.value);
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push(ui.item.value);
				// add placeholder to get the comma-and-space at the end
				terms.push("");
				this.value = terms.join(", ");
				return false;
			}
		});
});
jQuery(function (data) {
	var formObjectBox = jQuery("div#updateFormBox");
	jQuery(formObjectBox).html(data);
});
