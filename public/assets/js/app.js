$(function () {
	'use strict'
	// search bar
	$('.search-btn-mobile').on('click', function () {
		$('.search-bar').addClass('full-search-bar')
	})
	$('.search-arrow-back').on('click', function () {
		$('.search-bar').removeClass('full-search-bar')
	})
	$(document).ready(function () {
		$(window).on('scroll', function () {
			if ($(this).scrollTop() > 300) {
				$('.top-header').addClass('sticky-top-header')
			} else {
				$('.top-header').removeClass('sticky-top-header')
			}
		})
		$('.back-to-top').on('click', function () {
			$('html, body').animate(
				{
					scrollTop: 0,
				},
				600,
			)
			return false
		})
	})
	// Tooltips
	jQuery(document).ready(function ($) {
		$('.metismenu-card').metisMenu({
			toggle: false,
			triggerElement: '.card-header',
			parentTrigger: '.card',
			subMenu: '.card-body',
		})
	})

	// Tooltips
	jQuery(document).ready(function ($) {
		$('[data-toggle="tooltip"]').tooltip()
	})

	// Metishmenu card collapse
	jQuery(document).ready(function ($) {
		$('.card-collapse').metisMenu({
			toggle: false,
			triggerElement: '.card-header',
			parentTrigger: '.card',
			subMenu: '.card-body',
		})
	})
	// toggle menu button
	$('.toggle-btn').click(function () {
		if ($('.wrapper').hasClass('toggled')) {
			// unpin sidebar when hovered
			$('.wrapper').removeClass('toggled')
			$('.sidebar-wrapper').unbind('hover')
		} else {
			$('.wrapper').addClass('toggled')
			$('.sidebar-wrapper').hover(
				function () {
					$('.wrapper').addClass('sidebar-hovered')
				},
				function () {
					$('.wrapper').removeClass('sidebar-hovered')
				},
			)
		}
	})
	$('.toggle-btn-mobile').on('click', function () {
		$('.wrapper').removeClass('toggled')
	})
	// chat toggle

	// email toggle

	// === sidebar menu activation js
	jQuery(document).ready(function ($) {
		for (
			var i = window.location,
			o = $('.metismenu li a')
				.filter(function () {
					return this.href == i
				})
				.addClass('')
				.parent()
				.addClass('mm-active');
			;

		) {
			if (!o.is('li')) break
			o = o.parent('').addClass('mm-show').parent('').addClass('mm-active')
		}
	}),
		// metismenu
		jQuery(document).ready(function ($) {
			$('#menu').metisMenu()
		})
	/* Back To Top */
	$(document).ready(function () {
		$(window).on('scroll', function () {
			if ($(this).scrollTop() > 300) {
				$('.back-to-top').fadeIn()
			} else {
				$('.back-to-top').fadeOut()
			}
		})
		$('.back-to-top').on('click', function () {
			$('html, body').animate(
				{
					scrollTop: 0,
				},
				600,
			)
			return false
		})
	})
	/*switcher*/
	$('.switcher-btn').on('click', function () {
		$('.switcher-wrapper').toggleClass('switcher-toggled')
	})
	$('#darkmode').on('click', function () {
		$('html').addClass('dark-theme')
		sessionStorage.setItem('darktheme', 'dark-theme')
	})
	$('#lightmode').on('click', function () {
		$('html').removeClass('dark-theme')
		sessionStorage.removeItem('darktheme')
	})
})
/* perfect scrol bar */
