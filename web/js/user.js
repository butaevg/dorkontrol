/* tablesorter */
$(document).ready(function() 
    { 
        $("#machine_table").tablesorter(); 
    } 
);


/* fancybox */
$(document).ready(function() {
	$(".fancybox").fancybox({
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