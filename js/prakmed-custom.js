jQuery(function($) {

	$(".activate a").on("click", function(e) {
		e.preventDefault;

		//	VARIABLES DEFINED
		var grabID = $(this).attr("href");
		var grabIDnew = $(this).attr("href").replace('#', 'active-');
		var div = '.toggle';
		var target = div + grabID;

		//	RESET DIVS
		$(div).not(target).addClass('hide');
		$("body").removeClass("active-course-progress-bar");
		$("li.menu-item").removeClass("current-menu-item");

		// 	CHECK ELEMENT
		if($(target).is('.hide')) {
			$(target).toggleClass("hide");
			$(this).parent().addClass("current-menu-item");

			if(grabID == '#course-progress-bar') {
				$("body").toggleClass(grabIDnew);
			} else if(grabID != '#course-progress-bar') {
				$("body").removeClass(grabIDnew);
			}
		}
		else {
			$(target).toggleClass("hide");
			$(this).parent().removeClass("current-menu-item");
			$("body").removeClass("active-course-progress-bar");
		}
	});

	// RENDER TABLE OF CONTENT BASED ON H1 HEADLINES IN ARTICLE
	$(".article-content h2").each(function( ) {
		var _this = $(this);
		var value = $(this).text();
		_this.attr("id", value);

		$(".course-progress-bar ul").append('<li><a href="#'+ value +'">'+value+'</li>');

	});

	// WHEN TABLE OF CONTENT IS OPEN AND YOU CLICK A ELEMENT
	$("ul li a").on("click", function() {
		$("body").removeClass("active-course-progress-bar");
		$(".course-progress-bar").addClass("hide");
		var goTo = $(this).text();
		$('html, body').animate({scrollTop: $("#"+goTo+"").offset().top -60 }, 'slow');
	});

});
