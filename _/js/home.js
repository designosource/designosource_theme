
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


    var s,
    Home = {

        settings: {
            //Set content wrap
            wrapper: $("#wrapper"),

            //Get page hash #home, #projecten...
            pageHash : window.location.hash,

            //Set random team member
            activeMember : Math.floor(Math.random() * (15 - 0 + 1)) + 0,

            //Prepare var for astronauts clicked
            person : "",
            clicked : false,


            //Endless scroll flip picture settings
            flipPicture : $("#flip-picture"),
            currentFlipPosition : "bottom",
            viewport : "",
            scrollY : 0,
            flipContent : $("body")
        },

        init: function() {
            s = this.settings;
            this.bindUIActions();

            //Functions to run on load

            //Scroll to hash
            setTimeout(this.setHomeScroll, 500);

            //Align big titles
            this.alignBigTitles();

            //Set and display random person
            s.person =  $("#astronauten img").eq(s.activeMember).attr("class");
            $("#astronauten ."+ s.person).addClass("active");
            this.displayTeamInfo(s.person);

            //Set viewport based on engine
            if($.browser.webkit){
                s.viewport = $("body");
            }
            else
            {
                s.viewport = $("html");
            }

            if(window.opera)
            {
                $("#contact").css("min-height", 0);
                $("#contact").css("margin-top", 1500);
            }

            //Init of these functions
            if(!isMobile.any()){
                this.resizeFlipPicture();
                this.updateFlipPicture();
                this.checkWrap();
            }


        },

        bindUIActions: function() {

            //Navigation handlers
            //$("nav .arrow").on("mouseover", this.openMenu);
            $("nav .arrow").on("click", this.handleMenu);

            //When clicking on red arrow, go to next section
            $(".red-arrow").on("click", this.nextSection);

            //Clicking astronaut
            $("#astronauten img").on("click", this.astronautClick);

            //Hovering astronaut
            $("#astronauten img").on("mouseover", this.astronautHover);
            $("#astronauten img").on("mouseout", this.astronautMouseOut);

            //If not mobile initialize heavy functions
            if(!isMobile.any()){

                //Clicking on a link makes a smoothscroll to the section
                $('nav a').smoothScroll({offset: -100, speed: 1000});

                //Functions on resize
                $(window).on("resize", function(){
                    Home.updateFlipPicture();
                    Home.resizeFlipPicture();
                    Home.checkWrap();
                });
            }
            else
            {
                //Mobile js functions
            }

            //Functions on scroll
            $(window).on("scroll", function(){
                Home.checkWrap();
                Home.updateFlipPicture();
            });

        },

        setHomeScroll: function(){
            //Reset url hash
            window.location.hash = "";

            //If previous hash was empty --> home
            if(s.pageHash == "" || s.pageHash == null || s.pageHash == "#"){
                s.pageHash = "#home";
            };

            //Scroll to home
            $.smoothScroll({
                scrollTarget: s.pageHash,
                offset: -100,
                speed: 1000
            });

        },

        //Animate opening of menu
        openMenu: function(){
            $("nav").animate({
                right: "20px"
            });

            $("nav .arrow").html("SLUIT");

            $("nav .arrow").animate({
                right: $("nav").width() + 75
            });

        },

        //Animate closing of menu
        closeMenu: function(){
            $("nav").animate({
                right: -200
            });

            $("nav .arrow").html("MENU");

            $("nav .arrow").animate({
                right: 20
            });
        },

        //If closed --> open, otherwise close
        handleMenu: function(){
            if($("nav .arrow").html() == "MENU"){
                Home.openMenu();
            }
            else
            {
                Home.closeMenu();
            }
        },

        //Scroll to next section
        nextSection: function(){
            if($(this).parent().next() !== ""){
                var id = "#" + $(this).parent().next().attr("id");
                $.smoothScroll({
                    scrollTarget: id,
                    offset: -25
                });
            }
        },

        //Align all the titles, was impossible to do crrectly with css
        alignBigTitles: function(){
            $(".big-title").each(function(){
                $(this).css("left", $("section").width()/2 - $(this).width()/2);
            });
        },

        //Display team info, expects firstname + first letter of lastname
        displayTeamInfo: function(p){
            //Combine selector
            var selector = "." + p;

            //Fadeout member info and profile picture
            $("#member-info ul").fadeOut(300);
            $("#bol-down img").fadeOut(500);

            //Fade in info and profile with a delay
            setTimeout(function(){
                $(selector).fadeIn(300);
                s.clicked = false;
            }, 500)

        },

        //When clicking an astronaut
        astronautClick: function(e){
            if(s.clicked == false)
            {
                s.clicked = true;

                //Remove any active class
                $("#astronauten img").removeClass("active");

                //Get clicked person
                s.person = $(this).attr('class');

                //Add active class to this person
                $(this).addClass("active");

                //Display info of this person
                Home.displayTeamInfo(s.person);
            }
        },

        //When hovering an astronaut
        astronautHover: function(e){

            $("#info").html($(this).attr("alt"));

        },

        astronautMouseOut: function(e){

            $("#info").html("");

        },

        //Resize the bottom/top picture for endless scroll
        resizeFlipPicture: function() {
            //No idea why 2000 but it works
            var height =  2000;

            //This makes sure the whole picture is in the screen before flipping
            s.flipPicture.css('height', height / 2 + $(window).height() / 2);

            //Sets the current position bottom/top as class
            s.flipPicture.attr('class', s.currentFlipPosition);

            //Correction for the height of the stars since they're outside the wrapper
            s.wrapper.css("top", s.flipPicture.height() - $("#sterren").height());
            s.wrapper.css("height",s.flipContent.outerHeight());

            //Move the stars lower than the flip picture
            $("#sterren").css("top", s.flipPicture.height());

            //Make the stars fill the screen
            $("#sterren").height = $(window).height()*1.2;
            $("#sterren").width = $(window).width()*1.2;

            //Make sure flip picture is at the bottom of the page
            $("#bottom-img").css("top", s.flipContent.outerHeight() - $("#bottom-img").height() - s.flipPicture.height() + 120);

            $("#lens-flare").css("top", s.flipContent.outerHeight() - s.flipPicture.height() - 115);
        },

        updateFlipPicture: function() {
            //Set the flip picture according to scroll
            if (s.viewport.scrollTop() < s.flipContent.outerHeight() / 2) {
                var newPosition = 'top';
            } else {
                var newPosition = 'bottom';
            }

            //If the posiiton has changed, change the class of the image
            if (newPosition != s.currentFlipPosition) {
                s.currentFlipPosition = newPosition;
                if (newPosition == 'top') {
                    var top = 0;
                    s.flipPicture.css("background-position", "bottom left");
                } else {
                    var top = s.flipContent.outerHeight() - s.flipPicture.height();
                    s.flipPicture.css("background-position", "");
                }
                s.flipPicture.attr('class', s.currentFlipPosition);
                s.flipPicture.css({
                    top: top
                });
            }
            s.flipPicture.show();
        },

        checkWrap: function() {
            //Checks whether the scroll has to be set to top or bottom

            var delta = s.viewport.scrollTop() - s.scrollY;
            var y = s.scrollY = s.viewport.scrollTop();

            if (Math.abs(delta) < 500) {
                if (y < 5 && delta < 0) {
                    Home.goToBottom();
                }
                if (y > s.flipContent.outerHeight() - $(window).height()-5 && delta > 0) {
                    Home.goToTop();
                }
            }
        },

        //Go to top
        goToTop: function() {
            s.viewport.scrollTop(5);
        },

        // Go to bottom
        goToBottom: function() {
            s.viewport.scrollTop(s.flipContent.outerHeight()-5);
        }

    };

    Home.init();

    //ts = timeliner settings
    var ts,
    Timeliner = {

        settings : {
            windowWidth : $(window).width(),
            cheight : $(window).width() / 2,
            marginleft : (1140 - $(window).width()) / 2
        },

        init: function(){
            //Set settings
            ts = this.settings;

            //Bind UI actions to timeliner
            this.bindUIActions();

            //Check height
            this.checkSizes();

            //Initialize timeliner
            this.initializeTimeliner();
        },

        bindUIActions: function(){

        },

        checkSizes: function(){
            //height can't be more than 700
            if(ts.cheight > 700)
            {
                ts.cheight = 700;
            }

            //Margin left can't be less than 0
            if(ts.marginleft > 0){
                ts.marginleft = 0;
            }
        },

        initializeTimeliner: function(){

            if(ts.windowWidth > 768){
                $("#projecten-timeline").css("margin-left", ts.marginleft);
                $("#projecten-timeline .project").css("margin-left", -ts.marginleft + 150);

                $('#projecten-timeline').timeliner({
                    containerwidth: ts.windowWidth,
                    containerheight: ts.cheight,
                    controls_always_visible: true,
                    timelinewidth: ts.windowWidth / 2,
                    timelineheight: 50,
                    showtimedisplay: false,
                    timedisplayposition: false,
                    showtotaltime: false,
                    showtooltiptime: false,
                    tooltipposition: "below",
                    autoplay: false,
                    keyboard: false,
                    interval: 100000000000000000000000,
                    timelineposition: "bottom",
                    transition: 'slide'
                });

                $("li.timeline").append("<div class='jaartal links'>2011</div>");
                $("li.timeline").append("<div class='jaartal rechts'>nu</div>");

                $(".node").on("click", function(){
                    $("#projecten-timeline .tekst").fadeOut(300, function(){
                        $("#projecten-timeline .tekst").fadeIn();
                    });
                });
            }
        }

    };

    //tvs = television settings
    //Television made by Nils Janssens - nlsjns.be
    var tvs,
    Television = {

        settings : {
            p1 : 3,
            p2 : 2,
            countoff : 1,
            intens : 0
        },

        init: function(){
            tvs = this.settings;

            this.bindUIActions();
        },

        bindUIActions: function(){
            $( ".leetplus" ).click(this.leetPlus);
            $( ".leetmin" ).click(this.leetMin);
            $( ".screenoff" ).click(this.screenToggle);
            $( ".screendark" ).click(this.screenDark);
            $( ".screenlight" ).click(this.screenLight);
        },

        leetMin: function(){
            if (tvs.p1 < 0) {
                tvs.p1 = tvs.p1 + 1;
            }
            if (tvs.p2 < 0) {
                tvs.p2 = tvs.p2 + 1;
            }
            tvs.p1 = tvs.p1 - 1;
            tvs.p2 = tvs.p2 - 1;
            $('.screenline').css('box-shadow', '0px 0px ' + tvs.p1 + 'px ' + tvs.p2 + 'px rgba(80, 200, 220, .4)');
        },

        leetPlus: function(){
            if (tvs.p1 > 7) {
                tvs.p1 = tvs.p1 - 1;
            }
            tvs.p1 = tvs.p1 + 1;
            if (tvs.p2 > 6) {
                tvs.p2 = tvs.p2 - 1;
            }
            tvs.p2 = tvs.p2 + 1;
            $('.screenline').css('box-shadow', '0px 0px ' + tvs.p1 + 'px ' + tvs.p2 + 'px rgba(80, 200, 220, .4)');
        },

        screenToggle: function(){
            if (tvs.countoff == 1) {
                tvs.countoff = 2;
                $('.screenslide1').css({
                   'animation' : 'screenslideon1 400ms linear forwards',
                   '-webkit-animation' : 'screenslideon1 400ms linear forwards'
                });
                $('.screenslide2').css({
                   'animation' : 'screenslideon2 400ms linear forwards',
                   '-webkit-animation' : 'screenslideon2 400ms linear forwards'
                });
            }
            else if (tvs.countoff == 2) {
                tvs.countoff = 1;
                $('.screenslide1').css({
                   'animation' : 'screenslideoff1 400ms linear forwards',
                   '-webkit-animation' : 'screenslideoff1 400ms linear forwards'
                });
                $('.screenslide2').css({
                   'animation' : 'screenslideoff2 400ms linear forwards',
                   '-webkit-animation' : 'screenslideoff2 400ms linear forwards'
                });
            }
        },

        screenDark: function(){
            tvs.intens = tvs.intens - 1;
            if (tvs.intens < -8) {
                tvs.intens = tvs.intens + 1;
            }
            Television.changeBrightness ();
        },

        screenLight: function(){
            tvs.intens = tvs.intens + 1;
            if (tvs.intens > 8) {
                tvs.intens = tvs.intens - 1;
            }
            Television.changeBrightness ();
        },

        changeBrightness: function(){
            if (tvs.intens < 0) {
                value = Math.abs(tvs.intens);
                $('.screenintes').css({
                   'background-image' : 'url(/wp/wp-content/themes/designosource/_/img/screen_dark.png)',
                   'opacity' : '0.' + value + ''
                });
            }
            else if (tvs.intens > 0) {
                value = tvs.intens;
                $('.screenintes').css({
                   'background-image' : 'url(/wp/wp-content/themes/designosource/_/img/screen_light.png)',
                   'opacity' : '0.' + tvs.intens + ''
                });
            }
        }
    }

    //Not needed on mobile
    if(!isMobile.any()){
        Television.init();
    }
    if($(window).width() >= 1024){
        Timeliner.init();
        $('#projecten-timeline').timeliner.prev();

        activeSlide();
    }

    $("#projecten-timeline .next").on("click", function(){
        activeSlide();
    });
    $("#projecten-timeline .previous").on("click", function(){
        activeSlide();
    });

    function activeSlide(){

        setTimeout(function(){
            $(".slide").removeClass("active");

            var slide = $('.slide').filter(function() {
              return $(this).css('opacity') == '1';
            });

            slide = slide[0];

            var attr = slide.className.split(/\s+/);

            $("." + attr[2]).addClass("active");
        }, 700);

    }

});

})(jQuery);
