$(function () {
	$("#buglist tbody tr:not(.buglist-footer)").each(function(){										
		var linkHref = $(this).find("td.column-id a").attr("href");
		var bugName = $(this).find("td.column-summary").text();
		if(typeof linkHref != 'undefined'){
			$(this).find("td.column-summary").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
		}
	});
});