(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });


// ************* online / offline toggle div **********************



  $('.button-left').ready(function() {
    $('#online').hide();
    $('#offline').show();
    $(".button-left").css({"background-color": "black", "color": "white"});
    $(".button-right").css({"background-color": "#e9e9e9", "color": "#a9a9a9"});
  });

  $('.button-left').click(function() {
    $('#online').hide(500);
    $('#offline').show(500);
    $(".button-left").css({"background-color": "black", "color": "white"});
    $(".button-right").css({"background-color": "#e9e9e9", "color": "#a9a9a9"});
  });

  $('.button-right').click(function() {
    $('#offline').hide(500);
    $('#online').show(500);
    $(".button-left").css({"background-color": "#e9e9e9", "color": "#a9a9a9"});
    $(".button-right").css({"background-color": "black", "color": "white"});
  });


  // *************** chart ONLINE *********************

  
  var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

  /* large line chart */
  var chartOnLine = document.getElementById("chartOnLine");
  var chartDataOnline = {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      data: [70, 85, 90, 83, 86, 92, 80],
      backgroundColor: 'transparent',
      borderColor: colors[0],
      borderWidth: 4,
      pointBackgroundColor: colors[0]
    },
      {
        data: [36.2, 36.8, 36.9, 36.2, 37, 36.5, 36.8],
        backgroundColor: colors[3],
        borderColor: colors[1],
        borderWidth: 4,
        pointBackgroundColor: colors[1]
      }]
  };

  if (chartOnLine) {
    new Chart(chartOnLine, {
      type: 'line',
      data: chartDataOnline,
      options: {
        animation: {
          duration: 0
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  }


  // *************** chart offline *********************


  var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

  /* large line chart */
  var chartOffLine = document.getElementById("chartOffLine");
  var chartDataOffline = {
    labels: ["S", "M", "T", "W", "T", "F", "S"],
    datasets: [{
      data: [120, 100, 90, 98, 86, 100, 86],
      backgroundColor: 'transparent',
      borderColor: colors[0],
      borderWidth: 4,
      pointBackgroundColor: colors[0]
    },
      {
        data: [39.8, 38.8, 37.5, 36.2, 37, 38.2, 38.9],
        backgroundColor: colors[3],
        borderColor: colors[1],
        borderWidth: 4,
        pointBackgroundColor: colors[1]
      }]
  };

  if (chartOffLine) {
    new Chart(chartOffLine, {
      type: 'line',
      data: chartDataOffline,
      options: {
        animation: {
          duration: 0
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  }



// ********** range datapicker ****************






})(jQuery); // End of use strict

