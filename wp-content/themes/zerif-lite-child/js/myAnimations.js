//IMPORTANT! The jQuery library included with WordPress is set to the noConflict() mode, the global $ shortcut for jQuery is not available
// '$' is replaced with 'jQuery'

jQuery( window ).load(function() { 
       //TweenLite.set(".carousel-inner", {transformPerspective:200});
       //TweenLite.set(".item .active", {transformStyle:"preserve-3d"});
               TweenLite.set(jQuery('.latestnews-box'), {
                   transformStyle: "preserve-3d",
                   transformPerspective: 400
        }); 
        TweenMax.from(".intro-text", 2, {opacity:0, y:100, delay:1.5});
        TweenMax.from(".buttons", 2, {opacity:0, delay:3.5, scale:0.8});
        var carousel = jQuery('.item .active');
        var controller = new ScrollMagic.Controller();
        var contactScene = new ScrollMagic.Scene({triggerElement: "#contact"}).addTo(controller);
        var projectsScene = new ScrollMagic.Scene({triggerElement: "#latestnews"}).addTo(controller);
       
        //TweenMax.set(carousel, {css:{transformPerspective:200}});
       
        //var projectsTween = TweenMax.staggerFrom(".latestnews-box", 1.3, {y:125, opacity:0, delay: 0.3}, 0.4);
        var projectsTween = TweenMax.staggerFrom(".latestnews-box", 1, {rotationY:90, transformOrigin:"left top"}, 0.5)
        var contactTween = TweenMax.from(".pirate_forms_wrap", 1.3, {x:120, opacity:0});
        projectsScene.setTween(projectsTween);
        contactScene.setTween(contactTween);
   });