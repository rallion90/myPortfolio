new WOW().init();

function boxHeight(){
	//jQuery('.holder .how-section .how-wrap h3').matchHeight();
	//jQuery('.holder .how-section .how-wrap h4').matchHeight();
	jQuery('.holder .how-section .how-wrap .how-contents-txt').matchHeight();
	jQuery('.onboard-section .onboard-contents .numberd-content').matchHeight();
	jQuery('.onboard-section .onboard-contents .numberd-content h4').matchHeight();
	jQuery('.about-section .ab-contact-main .icon-description').matchHeight();
	jQuery('.support-section .column-inner .inner-wrapper p').matchHeight();
}

jQuery(document).ready(function(){

	//Treeview
	jQuery(".treeview").treeview({
		collapsed: true,
		animated: "medium",
	});

	//Moble Menu Script
	jQuery(".mobilemenuicon").click(function(){
		jQuery(this).toggleClass('opened');
		jQuery("body").toggleClass("mobile-menu-open");
	});
	jQuery(".menu-open-overlay").click(function(){
		jQuery("body").removeClass("mobile-menu-open");
		jQuery(".mobilemenuicon").removeClass('opened');
	});

	/* scroll bottom to top */
	if (jQuery(this).scrollTop() > 200) {
		jQuery('.scrollup').fadeIn();
	} else {
		jQuery('.scrollup').fadeOut();
	}
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
		if (jQuery(this).scrollTop() > 40) {
			jQuery('.scroll-down').fadeOut();
		} else {
			jQuery('.scroll-down').fadeIn();
		}
	});
	jQuery('.scrollup').click(function () {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

	/*Sticky Header*/
	jQuery(document).on("scroll", function() {
	  if (jQuery(document).scrollTop() > 0) {
		jQuery("body").addClass("header-fixed");
	  } else {
		jQuery("body").removeClass("header-fixed");
	  }
	});

	/*Testimonial Slider*/
	jQuery('.testimonial-slider').slick({
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  dots: true,
	  arrows: false,
	 responsive: [
	    {
	      breakpoint: 991,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	      }
	    },
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
	
	/*Solution Image Slider*/
	jQuery('.solution-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		cssEase: 'linear',
		fade: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 600
	});

	/*Generic Content Slider*/
	jQuery('.slider-btn-nav > ul').slick({
		dots: false,
		arrows: false,
		infinite: false,
		autoplay: false,
		speed: 500,
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-btn-for > ul',
		centerMode: true,
		centerPadding: '0',
		focusOnSelect: true
	});
	jQuery('.slider-btn-for > ul').slick({
		infinite: false,
		fade: false,
		autoplay: false,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		adaptiveHeight: true,
		asNavFor: '.slider-btn-nav > ul'
	});

	(function ($) {
		$('.owl-carousel-banner').owlCarousel({
			loop:true,
			lazyLoad:true,
			margin:0,
			autoplay:false,
			autoplayTimeout:10000,
			smartSpeed: 1000,		
			slideSpeed : 10000,
			touchDrag  : false,
			mouseDrag  : false,
			dots: false,
			nav: false,
			responsiveClass:true,
			responsive:{
				1366:{
					items:1,
				},
				1024:{
					items:1,
				},
				640:{
					items:1,
				},
				0:{
					items:1,
				}
			}
		})

		$('.owl-carousel-client').owlCarousel({
			loop:true,
			lazyLoad:true,
			margin:15,
			autoplay:true,
			autoplayTimeout:10000,
			smartSpeed: 1000,		
			slideSpeed : 10000,
			touchDrag  : true,
			mouseDrag  : true,
			dots: false,
			nav: true,
			responsiveClass:true,
			responsive:{
				1366:{
					items:3,
				},
				1024:{
					items:3,
				},
				768:{
					items:3,
				},
				640:{
					items:1,
				},
				0:{
					items:1,
				}
			}
		})

		$('.owl-carousel-customization').owlCarousel({
			loop:true,
			lazyLoad:true,
			margin:0,
			autoplay:true,
			autoplayTimeout:10000,
			smartSpeed: 2000,
			touchDrag  : true,
			mouseDrag  : true,
			dots: false,
			nav:true,
			center: true,
			responsiveClass:true,
			responsive:{
				1366:{
					items:3,
				},
				1024:{
					items:3,
				},
				640:{
					items:2,
				},
				0:{
					items:1,
				}
			}
		})

		$('.owl-carousel-clientreviews').owlCarousel({
			loop:true,
			lazyLoad:true,
			margin:20,
			autoplay:true,
			autoplayTimeout:10000,
			smartSpeed: 2000,
			touchDrag  : true,
			mouseDrag  : true,
			dots: true,
			nav:false,
			responsiveClass:true,
			responsive:{
				1366:{
					items:4,
				},
				1280:{
					items:4,
				},
				1024:{
					items:4,
				},
				640:{
					items:2,
				},
				0:{
					items:1,
				}
			}
		})
		
		$('.customer-slider').owlCarousel({
			loop: true,
			lazyLoad: true,
			margin: 20,
			autoplay: true,
			autoplayTimeout: 5000,
			smartSpeed: 2000,
			dots: true,
			nav: false,
			responsive:{
				1366:{
					items:1,
				},
				1024:{
					items:1,
				},
				640:{
					items:1,
				},
				0:{
					items:1,
				}
			}
		})
		
	})(jQuery);

});//ready over
jQuery(window).ready(function(){
	  if (jQuery(document).scrollTop() > 0) {
		jQuery("body").addClass("header-fixed");
	  } else {
		jQuery("body").removeClass("header-fixed");
	  }
	  boxHeight();
});
jQuery(window).resize(function(){
	boxHeight();
});
  
/**
 *
 * JQUERY EU COOKIE LAW POPUPS
 * version 1.1.1
 *
 * Code on Github:
 * https://github.com/wimagguc/jquery-eu-cookie-law-popup
 *
 * To see a live demo, go to:
 * http://www.wimagguc.com/2018/05/gdpr-compliance-with-the-jquery-eu-cookie-law-plugin/
 *
 * by Richard Dancsi
 * http://www.wimagguc.com/
 *
 */

(function($) {

// for ie9 doesn't support debug console >>>
if (!window.console) window.console = {};
if (!window.console.log) window.console.log = function () { };
// ^^^

$.fn.euCookieLawPopup = (function() {

	var _self = this;

	if ($("html").attr("lang") == "en") {
		var cookie_url = "privacy-policy.html";
		var cookie_text = "We use cookies. By clicking the «Accept» button you consent to the use of cookies, allowing us to deliver the best possible experience while you browse our site. More information about cookies and how LUCY uses them is available in our";
		var cookie_accept = "Accept";
		var cookie_policy = "privacy policy statement";
	}

	///////////////////////////////////////////////////////////////////////////////////////////////
	// PARAMETERS (MODIFY THIS PART) //////////////////////////////////////////////////////////////
	_self.params = {
		cookiePolicyUrl : cookie_url,
		popupPosition : 'top',
		colorStyle : 'default',
		compactStyle : false,
		//popupTitle : 'This website is using cookies',
		popupText : cookie_text,
		buttonContinueTitle : cookie_accept,
		buttonLearnmoreTitle : 'Learn&nbsp;more',
		buttonLearnmoreOpenInNewWindow : true,
		agreementExpiresInDays : 30,
		autoAcceptCookiePolicy : false,
		htmlMarkup : null
	};

	///////////////////////////////////////////////////////////////////////////////////////////////
	// VARIABLES USED BY THE FUNCTION (DON'T MODIFY THIS PART) ////////////////////////////////////
	_self.vars = {
		INITIALISED : false,
		HTML_MARKUP : null,
		COOKIE_NAME : 'EU_COOKIE_LAW_CONSENT'
	};

	///////////////////////////////////////////////////////////////////////////////////////////////
	// PRIVATE FUNCTIONS FOR MANIPULATING DATA ////////////////////////////////////////////////////

	// Overwrite default parameters if any of those is present
	var parseParameters = function(object, markup, settings) {

		if (object) {
			var className = $(object).attr('class') ? $(object).attr('class') : '';
			if (className.indexOf('eupopup-top') > -1) {
				_self.params.popupPosition = 'top';
			}
			else if (className.indexOf('eupopup-fixedtop') > -1) {
				_self.params.popupPosition = 'fixedtop';
			}
			else if (className.indexOf('eupopup-bottomright') > -1) {
				_self.params.popupPosition = 'bottomright';
			}
			else if (className.indexOf('eupopup-bottomleft') > -1) {
				_self.params.popupPosition = 'bottomleft';
			}
			else if (className.indexOf('eupopup-bottom') > -1) {
				_self.params.popupPosition = 'bottom';
			}
			else if (className.indexOf('eupopup-block') > -1) {
				_self.params.popupPosition = 'block';
			}
			if (className.indexOf('eupopup-color-default') > -1) {
				_self.params.colorStyle = 'default';
			}
			else if (className.indexOf('eupopup-color-inverse') > -1) {
				_self.params.colorStyle = 'inverse';
			}
			if (className.indexOf('eupopup-style-compact') > -1) {
				_self.params.compactStyle = true;
			}
		}

		if (markup) {
			_self.params.htmlMarkup = markup;
		}

		if (settings) {
			if (typeof settings.cookiePolicyUrl !== 'undefined') {
				_self.params.cookiePolicyUrl = settings.cookiePolicyUrl;
			}
			if (typeof settings.popupPosition !== 'undefined') {
				_self.params.popupPosition = settings.popupPosition;
			}
			if (typeof settings.colorStyle !== 'undefined') {
				_self.params.colorStyle = settings.colorStyle;
			}
			if (typeof settings.popupTitle !== 'undefined') {
				_self.params.popupTitle = settings.popupTitle;
			}
			if (typeof settings.popupText !== 'undefined') {
				_self.params.popupText = settings.popupText;
			}
			if (typeof settings.buttonContinueTitle !== 'undefined') {
				_self.params.buttonContinueTitle = settings.buttonContinueTitle;
			}
			if (typeof settings.buttonLearnmoreTitle !== 'undefined') {
				_self.params.buttonLearnmoreTitle = settings.buttonLearnmoreTitle;
			}
			if (typeof settings.buttonLearnmoreOpenInNewWindow !== 'undefined') {
				_self.params.buttonLearnmoreOpenInNewWindow = settings.buttonLearnmoreOpenInNewWindow;
			}
			if (typeof settings.agreementExpiresInDays !== 'undefined') {
				_self.params.agreementExpiresInDays = settings.agreementExpiresInDays;
			}
			if (typeof settings.autoAcceptCookiePolicy !== 'undefined') {
				_self.params.autoAcceptCookiePolicy = settings.autoAcceptCookiePolicy;
			}
			if (typeof settings.htmlMarkup !== 'undefined') {
				_self.params.htmlMarkup = settings.htmlMarkup;
			}
		}

	};

	var createHtmlMarkup = function() {

		if (_self.params.htmlMarkup) {
			return _self.params.htmlMarkup;
		}

		var html =
			'<div class="eupopup-container' +
			    ' eupopup-container-' + _self.params.popupPosition +
			    (_self.params.compactStyle ? ' eupopup-style-compact' : '') +
				' eupopup-color-' + _self.params.colorStyle + '">' +
				//'<div class="eupopup-head">' + _self.params.popupTitle + '</div>' +
				'<div class="eupopup-body">' + _self.params.popupText + " <a href=" + cookie_url + ">" + 
				cookie_policy + "</a>." + "</div>" +
				'<div class="eupopup-buttons">' +
				  '<a href="#" class="eupopup-button eupopup-button_1">' + _self.params.buttonContinueTitle + '</a>' +
				  //'<a href="' + _self.params.cookiePolicyUrl + '"' +
				 	//(_self.params.buttonLearnmoreOpenInNewWindow ? ' target=_blank ' : '') +
					//' class="eupopup-button eupopup-button_2">' + _self.params.buttonLearnmoreTitle + '</a>' +
				  '<div class="clearfix"></div>' +
				'</div>' +
				'<a href="#" class="eupopup-closebutton">x</a>' +
			'</div>';

		return html;
	};

	// Storing the consent in a cookie
	var setUserAcceptsCookies = function(consent) {
		var d = new Date();
		var expiresInDays = _self.params.agreementExpiresInDays * 24 * 60 * 60 * 1000;
		d.setTime( d.getTime() + expiresInDays );
		var expires = "expires=" + d.toGMTString();
		document.cookie = _self.vars.COOKIE_NAME + '=' + consent + "; " + expires + ";path=/";

		$(document).trigger("user_cookie_consent_changed", {'consent' : consent});
	};

	// Let's see if we have a consent cookie already
	var userAlreadyAcceptedCookies = function() {
		var userAcceptedCookies = false;
		var cookies = document.cookie.split(";");
		for (var i = 0; i < cookies.length; i++) {
			var c = cookies[i].trim();
			if (c.indexOf(_self.vars.COOKIE_NAME) !== -1) {
				userAcceptedCookies = c.substring(_self.vars.COOKIE_NAME.length + 1, c.length);
			}
		}

		return userAcceptedCookies;
	};

	var hideContainer = function() {
		// $('.eupopup-container').slideUp(200);
		$('.eupopup-container').animate({
			opacity: 0,
			height: 0
		}, 200, function() {
			$('.eupopup-container').hide(0);
		});
	};

	///////////////////////////////////////////////////////////////////////////////////////////////
	// PUBLIC FUNCTIONS  //////////////////////////////////////////////////////////////////////////
	var publicfunc = {

		// INITIALIZE EU COOKIE LAW POPUP /////////////////////////////////////////////////////////
		init : function(settings) {

			parseParameters(
				$(".eupopup").first(),
				$(".eupopup-markup").html(),
				settings);

			// No need to display this if user already accepted the policy
			if (userAlreadyAcceptedCookies()) {
        $(document).trigger("user_cookie_already_accepted", {'consent': true});
				return;
			}

			// We should initialise only once
			if (_self.vars.INITIALISED) {
				return;
			}
			_self.vars.INITIALISED = true;

			// Markup and event listeners >>>
			_self.vars.HTML_MARKUP = createHtmlMarkup();

			if ($('.eupopup-block').length > 0) {
				$('.eupopup-block').append(_self.vars.HTML_MARKUP);
			} else {
				$('BODY').append(_self.vars.HTML_MARKUP);
			}

			$('.eupopup-button_1').click(function() {
				setUserAcceptsCookies(true);
				hideContainer();
				return false;
			});
			$('.eupopup-closebutton').click(function() {
				setUserAcceptsCookies(true);
				hideContainer();
				return false;
			});
			// ^^^ Markup and event listeners

			// Ready to start!
			$('.eupopup-container').show();

			// In case it's alright to just display the message once
			if (_self.params.autoAcceptCookiePolicy) {
				setUserAcceptsCookies(true);
			}

		}

	};

	return publicfunc;
});

$(document).ready( function() {
	if ($(".eupopup").length > 0) {
		$(document).euCookieLawPopup().init({
			//'info' : 'YOU_CAN_ADD_MORE_SETTINGS_HERE',
			//'popupTitle' : 'This website is using cookies. ',
			//'popupText' : 'We use them to give you the best experience. If you continue using our website, we\'ll assume that you are happy to receive all cookies on this website.'
		});
	}
});

$(document).bind("user_cookie_consent_changed", function(event, object) {
	console.log("User cookie consent changed: " + $(object).attr('consent') );
});

}(jQuery));