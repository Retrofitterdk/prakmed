jQuery(function($) {

		$(".activate a").on("click", function(e) {
		e.preventDefault;

	//	VARIABLES DEFINED
		var grabID = $(this).attr("href");
		var grabIDnew = $(this).attr("href").replace('#', 'active-');
		var div = '.toggle';
		var target = div + grabID;
		console.log(target);

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

});
