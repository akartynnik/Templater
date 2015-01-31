$(function () {
	$(".bracket-link").each(function(){
		$(this).html($(this).html().replace(/\[/g,"").replace(/\]/g,""));
	});
	
	$(".timeline .date-range").each(function(){
		$(this).html($(this).html().replace(/\[/g,"").replace(/\]/g,""));
	});
	
	$(".timeline p").each(function(){
		$(this).html($(this).html().replace(/\[/g,"").replace(/\]/g,""));
	});
});