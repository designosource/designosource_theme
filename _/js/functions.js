// Browser detection for when you get desparate.
// http://rog.ie/post/9089341529/html5boilerplatejs

 // var b = document.documentElement;
 // b.setAttribute('data-useragent',  navigator.userAgent);
 // b.setAttribute('data-platform', navigator.platform);


// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function($){
/* trigger when page is ready */
$(document).ready(function (){

    //Mobile detection
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };


$(function() {

  // Tweaked from: https://gist.github.com/mattstauffer/3835881
  // No guarantees
  // 1. include Isotope.js
  // 2. include this file
  // 3. customize Isotope options at the bottom of this file
  // 4. add "margin: 0 auto" to the isotope container

  $.Isotope.prototype._getMasonryGutterColumns = function() {
    var gutter = this.options.masonry.gutterWidth || 0;
    containerWidth = this.element.parent().width();
    this.masonry.columnWidth = this.options && this.options.masonry.columnWidth ||
      this.$filteredAtoms.outerWidth(true) ||
      containerWidth;
    this.masonry.columnWidth += gutter;
    this.masonry.cols = Math.floor(containerWidth / this.masonry.columnWidth);
    this.masonry.cols = Math.max(this.masonry.cols, 1);

  };

  $.Isotope.prototype._masonryReset = function() {
    this.masonry = {};
    this._getMasonryGutterColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  $.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    this._getMasonryGutterColumns();
    return ( this.masonry.cols !== prevColCount );
  };

  $.Isotope.prototype._masonryGetContainerSize = function() {
    var gutter = this.options.masonry.gutterWidth || 0;
    var unusedCols = 0,
      i = this.masonry.cols;
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    return {
      height : Math.max.apply( Math, this.masonry.colYs ),
      width : ((this.masonry.cols - unusedCols) * this.masonry.columnWidth) - gutter
    };
  };

  $('#columns').isotope({
    itemSelector: '.post',
    masonry: {
      columnWidth: 0,
      gutterWidth: 10
    }
  });

  $("#columns").css("min-height", ($(window).height() - 200));
  $('#columns').isotope( 'reLayout' );
});



$(window).smartresize(function(){
    $('#columns').isotope( 'reLayout');

    $("#columns").css("min-height", ($(window).height() - 200));

});

$(window).on("scroll", function(){

    if($(window).scrollTop() > 425){
      $("#ssba").css({
        "position": "fixed"
      });
    }
    else
    {
      $("#ssba").css({
        "position": "absolute"
      });
    }


});


var s,
Skroller = {

    //Initialize skrollr
    initSkrollr: function(){
        var sk = skrollr.init({
            forceHeight: false,
            smoothScrolling: false,
            render: function(data) {
               //console.log(data.curTop);
           }
        });
    }


};
//If not mobile initialize parallax
if(!isMobile.any() && $(window).width() >= 1024){
    //Initialize skrollr
    Skroller.initSkrollr();
}

//ts = timeliner settings
var tsstats,
TimelinerStats = {

    settings : {
        windowWidth : $(window).width(),
        cheight : 75
    },

    init: function(){
        //Set settings
        tsstats = this.settings;

        //Initialize timeliner
        this.initializeTimeliner();
    },

    initializeTimeliner: function(){
        $('#stats').timeliner({
            containerwidth: tsstats.windowWidth,
            containerheight: tsstats.cheight,
            controls_always_visible: false,
            timelinewidth: tsstats.windowWidth / 2,
            timelineheight: 0,
            showtimedisplay: false,
            timedisplayposition: false,
            showtotaltime: false,
            showtooltiptime: false,
            tooltipposition: "below",
            keyboard: false,
            interval: 15,
            timelineposition: "bottom",
            transition: 'slide'
        });
    }

};

TimelinerStats.init();

});

/* optional triggers

$(window).load(function() {

});

$(window).resize(function() {

});

*/


})(jQuery);

