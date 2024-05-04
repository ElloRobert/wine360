$(function() { // wait for document ready

    $('.select-lang .dropdown').click(function(){
        if($('.select-lang .dropdown ul').css('display') == 'block'){
            $('.select-lang .dropdown ul').hide();
        }else{
            $('.select-lang .dropdown ul').show();
        }
    });

    //Scroll to on click

    $(".go-to").click(function() {
        $('html,body').animate({
                scrollTop: $("#one").offset().top
            },
            1900);
    });
    /*$(".login-btn").click(function() {
        $('html,body').animate({
                scrollTop: $("#five").offset().top
            },
            2500);
    });*/
    $("#one .next").click(function() {
        $('html,body').animate({
                scrollTop: $("#two").offset().top
            },
            1900);
    });
    $("#two .prev").click(function() {
        $('html,body').animate({
                scrollTop: $("#one").offset().top
            },
            1900);
    });
    $("#two .next").click(function() {
        $('html,body').animate({
                scrollTop: $("#three").offset().top
            },
            1900);
    });
    $("#three .prev").click(function() {
        $('html,body').animate({
                scrollTop: $("#two").offset().top
            },
            1900);
    });
    $("#three .next").click(function() {
        $('html,body').animate({
                scrollTop: $("#four").offset().top
            },
            1900);
    });
    $("#four .prev").click(function() {
        $('html,body').animate({
                scrollTop: $("#three").offset().top
            },
            1900);
    });
    $("#four .next").click(function() {
        $('html,body').animate({
                scrollTop: $("#five").offset().top
            },
            1900);
    });
    // Close other boxes if opened
    $("#first_one.info-box .cta img").click(function() {
        if ($('#second_one.info-box .text').is(':visible')) {
            $('#second_one.info-box .text').toggle('slow');
        }
        if ($('#third_one.info-box .text').is(':visible')) {
            $('#third_one.info-box .text').toggle('slow');
        }
        $('#first_one.info-box .text').toggle('slow');
    });
    $("#second_one.info-box .cta img").click(function() {
        if ($('#first_one.info-box .text').is(':visible')) {
            $('#first_one.info-box .text').toggle('slow');
        }
        if ($('#third_one.info-box .text').is(':visible')) {
            $('#third_one.info-box .text').toggle('slow');
        }
        $('#second_one.info-box .text').toggle('slow');
    });
    $("#third_one.info-box .cta img").click(function() {
        if ($('#first_one.info-box .text').is(':visible')) {
            $('#first_one.info-box .text').toggle('slow');
        }
        if ($('#second_one.info-box .text').is(':visible')) {
            $('#second_one.info-box .text').toggle('slow');
        }
        $('#third_one.info-box .text').toggle('slow');
    });
    $("#first_two.info-box .cta img").click(function() {
        if ($('#second_one.info-box .text').is(':visible')) {
            $('#second_one.info-box .text').toggle('slow');
        }
        if ($('#third_one.info-box .text').is(':visible')) {
            $('#third_one.info-box .text').toggle('slow');
        }
        if ($("#second_two.info-box .text").is(':visible')) {
            $("#second_two.info-box .text").toggle('slow');
        }
        $('#first_two.info-box .text').toggle('slow');
    });
    $("#second_two.info-box .cta img").click(function() {
        if ($('#first_one.info-box .text').is(':visible')) {
            $('#first_one.info-box .text').toggle('slow');
        }

        if ($('#second_one.info-box .text').is(':visible')) {
            $('#second_one.info-box .text').toggle('slow');
        }
        if ($('#third_one.info-box .text').is(':visible')) {
            $('#third_one.info-box .text').toggle('slow');
        }
        if ($("#first_two.info-box .text").is(':visible')) {
            $("#first_two.info-box .text").toggle('slow');
        }
        $('#second_two.info-box .text').toggle('slow');
    });
    $("#first_three.info-box .cta img").click(function() {
        if ($('#first_one.info-box .text').is(':visible')) {
            $('#first_one.info-box .text').toggle('slow');
        }

        if ($('#second_one.info-box .text').is(':visible')) {
            $('#second_one.info-box .text').toggle('slow');
        }
        if ($('#third_one.info-box .text').is(':visible')) {
            $('#third_one.info-box .text').toggle('slow');
        }
        if ($("#first_two.info-box .text").is(':visible')) {
            $("#first_two.info-box .text").toggle('slow');
        }
        $('#first_three.info-box .text').toggle('slow');
    });
    // init
    if ($(window).width() > 990) {
        TweenMax.set("#one .car", { yPercent: 0, xPercent: -100 });
        TweenMax.set("#two .car", { yPercent: 0, xPercent: 100 });
        TweenMax.set("#three .car", { yPercent: 0, xPercent: -100 });
        TweenMax.set("#four .car", { yPercent: 0, xPercent: 100 });
        // Controllers
        var controller = new ScrollMagic.Controller();
        var controllerParallax = new ScrollMagic.Controller();


        // Logo float and disappear
        var logoFloat = new TimelineMax()
            .add([
                TweenMax.fromTo(".logo-block", 1, { y: 0, opacity: 1, display: 'block' }, { y: 50, opacity: 0, display: 'none' })
            ]);

        // Logo float scene
        var floatLogo = new ScrollMagic.Scene({
                triggerHook: 0,
                offset: 90,
                duration: 350
            }).setTween(logoFloat)
            //.addIndicators({ name: "Logo float", colorStart: 'red', colorEnd: 'red', indent: 350 })
            .addTo(controller);


        // Car moves
        //Scene One
        var carTween = new TimelineMax();
        carTween.to("#one .car", 2, { left: "120%", xPercent: -50 });
        carTween.to("#one .cloud", 1, { opacity: 1 }, "-=1.75");
        //carTween.to("#one .car", 1, { left: "100%", xPercent: -100 }, "+=2");
        //Scene Two 
        var carTween2 = new TimelineMax();
        carTween2.to("#two .car", 2, { right: "50%", xPercent: 50 });
        carTween2.to("#two .car", 2, { right: "130%", xPercent: 100 }, "+=2");
        carTween2.to("#two .cloud", 1, { opacity: 1 }, "-=4.75");
        //Scene Three
        var carTween3 = new TimelineMax();

        carTween3.to("#three .car", 1, { left: "35%", xPercent: 10 });
        carTween3.to("#three .car", 0.01, { css: { className: "+=lift" } });
        carTween3.to("#three .car", 1, { yPercent: -65 }, "+=1");
        carTween3.to("#three .car", 1, { yPercent: 0 }), "+=1";
        carTween3.to("#three .cloud", 1, { opacity: 1 }, "-=4.75");
        carTween3.to("#three .sticky", 1.5, { right: "8%" }, "-=4.75");
        //Scene Four
        var width = $(window).width();
        var carTween4 = new TimelineMax();
        if ($(window).width() > 1700) {
            console.log("big");
            carTween4.to("#four .car", 1, { right: "18%", xPercent: -35 });

        }
        if ($(window).width() > 1380 && $(window).width() < 1700) {
            console.log("amen");
            carTween4.to("#four .car", 1, { right: "20%", xPercent: -15 });
        }
        if ($(window).width() < 1380) {
            console.log("true");
            carTween4.to("#four .car", 1, { right: "20%", xPercent: -10 });
        } else {
            console.log('else');
        }

        carTween4.to("#four .cloud", 1, { opacity: 1 }, "-=0.75");
        // *********
        // Scenes 
        // *********
        var carSceneOne = new ScrollMagic.Scene({
                triggerElement: "#one",
                triggerHook: "onLeave",
                duration: "200%"
            })
            .setPin("#one")
            .setTween(carTween)
            //.addIndicators({ name: "Car #one", colorStart: "white", indent: 50 })
            .addTo(controller);
        var carSceneTwo = new ScrollMagic.Scene({
                triggerElement: "#two",
                triggerHook: "onLeave",
                duration: "300%"
            })
            .setPin("#two")
            .setTween(carTween2)
            //.addIndicators({ name: "Car #two", colorStart: "silver", colorEnd: "silver", indent: 70 })
            .addTo(controller);

        var carSceneThree = new ScrollMagic.Scene({
                triggerElement: "#three",
                triggerHook: "onLeave",
                duration: "250%"
            })
            .setPin("#three")
            .setTween(carTween3)
            //.addIndicators({ name: "Car #three", colorStart: "yellow", colorEnd: "yellow", indent: 50 })
            .addTo(controller);

        var carSceneFour = new ScrollMagic.Scene({
                triggerElement: "#four",
                triggerHook: "onLeave",
                duration: "200%"
            })
            .setPin("#four")
            .setTween(carTween4)
            //.addIndicators({ name: "Car #four", colorStart: "gold", colorEnd: "gold", indent: 70 })
            .addTo(controller);
        // Car moves scene

        // build scene


    }
    if ($(window).width() < 990) {

        // Controllers
        var controller = new ScrollMagic.Controller();
        var controllerParallax = new ScrollMagic.Controller();
        // Logo float and disappear
        var logoFloat = new TimelineMax()
            .add([
                TweenMax.fromTo(".logo-block", 1, { y: 0, opacity: 1, display: 'block' }, { y: 50, opacity: 0, display: 'none' })
            ]);
        // Logo float scene
        var floatLogo = new ScrollMagic.Scene({
                triggerHook: 0,
                offset: 90,
                duration: 350
            }).setTween(logoFloat)
            //.addIndicators({ name: "Logo float", colorStart: 'red', colorEnd: 'red', indent: 350 })
            .addTo(controller);
    }
});

//Buttons bounce
$(document).ready(function() {
    /*setInterval(function() {
        console.log('interval');
        $("#first_one.info-box .cta img").effect("bounce");
        $("#second_one.info-box .cta img").effect("bounce");
        $("#third_one.info-box .cta img").effect("bounce");
        $("#first_two.info-box .cta img").effect("bounce");
        $("#second_two.info-box .cta img").effect("bounce");
        $("#first_three.info-box .cta img").effect("bounce");
    }, 3000);*/
});