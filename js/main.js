!(function (a) {
  "use strict";
  a(".carousel-inner .item:first-child").addClass("active"),
    a(".mainmenu-area #mainmenu li a").on("click", function () {
      a(".navbar-collapse").removeClass("in");
    }),
    new WOW().init({ mobile: !0 }),
    a.scrollUp({ scrollText: '<i class="fas fa-angle-up"></i>', easingType: "linear", scrollSpeed: 900, animation: "fade" }),
    a(".testimonials").owlCarousel({ loop: !0, margin: 0, responsiveClass: !0, nav: !0, autoplay: !0, autoplayTimeout: 4e3, smartSpeed: 1e3, navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'], items: 1 }),
    a(".screen-slider").owlCarousel({ loop: !0, margin: 0, responsiveClass: !0, nav: !0, autoplay: !0, autoplayTimeout: 4e3, smartSpeed: 1e3, navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'], items: 1, animateIn: "fadeIn", animateOut: "fadeOut", center: !0 }),
    a(".clients").owlCarousel({ loop: !0, margin: 30, responsiveClass: !0, nav: !0, autoplay: !0, autoplayTimeout: 4e3, smartSpeed: 1e3, navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'], responsive: { 0: { items: 3 }, 600: { items: 4 }, 1000: { items: 6 } } });
  function e(e) {
    e.each(function () {
      var e = a(this),
        i = e.data("animation");
      e.addClass(i).one("webkitAnimationEnd animationend", function () {
        e.removeClass(i);
      });
    });
  }
  a(".work-popup").magnificPopup({
    type: "image",
    removalDelay: 300,
    mainClass: "mfp-with-zoom",
    gallery: { enabled: !0 },
    zoom: {
      enabled: !0,
      duration: 300,
      easing: "ease-in-out",
      opener: function (a) {
        return a.is("img") ? a : a.find("img");
      },
    },
  }),
    a(".header-area").parallax("50%", -0.4),
    a(".price-area").parallax("50%", -0.5),
    a(".testimonial-area").parallax("10%", -0.2),
    a("#accordion .panel-title a").prepend("<span></span>");
  var i = a(".caption-slider"),
    n = i.find(".item:first").find("[data-animation ^= 'animated']");
  i.carousel(),
    e(n),
    i.carousel("pause"),
    i.on("slide.bs.carousel", function (i) {
      e(a(i.relatedTarget).find("[data-animation ^= 'animated']"));
    }),
    a('.mainmenu-area a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function (e) {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
          var i = a(this.hash);
          (i = i.length ? i : a("[name=" + this.hash.slice(1) + "]")).length &&
            (e.preventDefault(),
            a("html, body").animate({ scrollTop: i.offset().top }, 1e3, function () {
              var e = a(i);
              if ((e.focus(), e.is(":focus"))) return !1;
              e.attr("tabindex", "-1"), e.focus();
            }));
        }
      }),
    a(window).on("load", function () {
      a(".preloader").fadeOut(500);
    });
})(jQuery);
