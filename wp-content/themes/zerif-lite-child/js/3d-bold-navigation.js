jQuery(document).ready(function($){
	//open navigation clicking the menu icon
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		toggleNav(true);
	});
	//close the navigation
	$('.cd-close-nav, .cd-overlay').on('click', function(event){
		event.preventDefault();
		toggleNav(false);
	});
	//select a new section
	$('.cd-nav li').on('click', function(event){
		event.preventDefault();
		var target = $(this),
			//detect which section user has chosen
			sectionTarget = target.data('menu');
        
      
        
		if( !target.hasClass('cd-selected') ) {
            
              if(target.hasClass('home')){
                    event.preventDefault();
                    target.siblings('.cd-selected').removeClass('cd-selected');
                    window.location.replace("http://localhost:8080/wordpress/");

                }
            
			//if user has selected a section different from the one alredy visible
			//update the navigation -> assign the .cd-selected class to the selected item
			target.addClass('cd-selected').siblings('.cd-selected').removeClass('cd-selected');
			//load the new section
			loadNewContent(sectionTarget);
        
            
		} else {
			// close navigation
			toggleNav(false);
		}
	});

	function toggleNav(bool) {
		$('.cd-nav-container, .cd-overlay').toggleClass('is-visible', bool);
		$('main').toggleClass('scale-down', bool);
	}

	function loadNewContent(newSection) {
		//create a new section element and insert it into the DOM
		var section = $('<section class="cd-section '+newSection+'"></section>').appendTo($('main'));
		//load the new content from the proper html file
       
        
        if(newSection === 'archive') {
		section.load('http://localhost:8080/wordpress/projects/ .cd-section > *', function(event){
			//add the .cd-selected to the new section element -> it will cover the old one
			section.addClass('cd-selected').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                 window.history.pushState('object or string', 'Test', '/wordpress/projects');
				//close navigation
				toggleNav(false);
			});
			section.prev('.cd-selected').remove();
                if ($('.single-post')[0]){
                    $( '.single-post' ).remove();
                } else if ($('.single-page')[0]) {
                    $( '.single-page' ).remove();
                } 
           
		});
            
        }
        
        if(newSection === 'about') {
		section.load('http://localhost:8080/wordpress/sample-page/ .cd-section > *', function(event){
			//add the .cd-selected to the new section element -> it will cover the old one
			section.addClass('cd-selected').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                 window.history.pushState('object or string', 'Test', '/wordpress/sample-page');
				//close navigation
				toggleNav(false);
			});
			section.prev('.cd-selected').remove();
            
                if ($('.single-post')[0]){
                    $( '.single-post' ).remove();
                } else if ($('.cd-section .archive')[0]) {
                    $( '.cd-section .archive' ).remove();
                } 
           
		});
            
        }

		$('main').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			//once the navigation is closed, remove the old section from the DOM
			section.prev('.cd-section').remove();
		});

		if( $('.no-csstransitions').length > 0 ) {
			//if browser doesn't support transitions - don't wait but close navigation and remove old item
			toggleNav(false);
			section.prev('.cd-section').remove();
		}
	}
});