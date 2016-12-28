/* menu */
$(function()
{
	$('.menu_hor').liMenuHor();
});


/* tablesorter */
$(document).ready(function() 
    { 
        $("#pogoda_table").tablesorter(); 
    } 
);


/* fancybox */
$(document).ready(function() 
{
	$('.fancybox').fancybox();
	});
	
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'elastic'
	});
});