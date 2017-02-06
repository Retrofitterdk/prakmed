
jQuery(function($) {
$(".activate a").on("click", function(e) {
e.preventDefault;
/*==============================================================
VARIABLES DEFINED
================================================================*/
var grabID = $(this).attr("data-toggled");
if(grabID == 'course-progress-bar') {
  $("body").toggleClass("active-course-progress-bar");
}
var div = '.toggle';
var target = div + "#"+ grabID;
console.log("target", target);

/*==============================================================
RESET DIVS
================================================================*/
$(div).not(target).addClass('hide');
$(".entry-author-article-list").removeClass('hide');
$(".author-menu-items a").removeClass('active');
$("a:contains('Recent articles')").addClass("active");
$(document).find(".activate").removeClass("active");

/*==============================================================
CHECK ELEMENT
================================================================*/
if( $(target).is('.hide') ) {
  $(target).toggleClass("hide");
  $(this).parent().toggleClass("active");
} else {
  $(target).toggleClass("hide");
}
});

	// RENDER TABLE OF CONTENT BASED ON H1 HEADLINES IN ARTICLE
	$(".article-content h2").each(function( ) {
		var _this = $(this);
		var value = $(this).text();
		_this.attr("id", value);

		$(".course-progress-bar ul").append('<li><a href="#'+ value +'">'+value+'</li>');

	});


/* ===== MAKE TABLE OF CONTENT IN DESKTOP FOLLOW SCROLL ==== */
	var stickySidebar = $('#secondary').offset().top;
	$(window).scroll(function() {
	    if ($(window).scrollTop() > stickySidebar) {
	        $('#secondary').addClass('follow-me');
	    }
	    else {
	        $('#secondary').removeClass('follow-me');
	    }
	});

	// WHEN TABLE OF CONTENT IS OPEN AND YOU CLICK A ELEMENT
	$("ul li a").on("click", function() {
		$("body").removeClass("active-course-progress-bar");
		parent_element = $(this).parent().parent().parent().attr("id");
		console.log(parent_element);
		if(parent_element == 'course-progress-bar') {
			$(".course-progress-bar").addClass("hide");
		}
		var goTo = $(this).text();
		$('html, body').animate({scrollTop: $("#"+goTo+"").offset().top -60 }, 'slow');
	});

});
