$(function () {
	
	if( window.location.pathname == "/view_all_bug_page.php"){
		$("#buglist tr:not(.row-category):not(.spacer)").each(function(){										
			var linkHref = $(this).find("td:not(.form-title) a").attr("href");
			var bugName = $(this).find("td:not(.form-title).left").text();
			if(typeof linkHref != 'undefined'){
				$(this).find("td:not(.form-title):not([colspan]).left").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
			}
		});
	}
	
	if( window.location.pathname == "/my_view_page.php" ){
		$(".hide .width100 tr:not(.form-title)").each(function(){										
			var linkHref = $(this).find("td.center span.small a").attr("href");
			var bugName = $(this).find("td.left span.small").html();
			if(typeof linkHref != 'undefined'){
				$(this).find("td.left span.small").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
			}
		});
	}
	
});