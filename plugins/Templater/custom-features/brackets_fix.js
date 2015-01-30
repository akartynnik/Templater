$(function () {
	$(".bracket-link").each(function(){
		$(this).html($(this).html().replace(/\[/g,"").replace(/\]/g,""));
	});
});