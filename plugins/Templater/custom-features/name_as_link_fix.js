$(function () {
	$("#buglist tr:not(.row-category):not(.spacer)").each(function(){										
		var linkHref = $(this).find("td:not(.form-title) a").attr("href");
		var bugName = $(this).find("td:not(.form-title).left").text();
		if(typeof linkHref != 'undefined'){
			$(this).find("td:not(.form-title):not([colspan]).left").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
		}
	});
});