$(function () {
	
	if( window.location.pathname == "/view_all_bug_page.php"){
		$("#buglist tbody tr:not(.buglist-footer)").each(function(){										
			var linkHref = $(this).find("td.column-id a").attr("href");
			var bugName = $(this).find("td.column-summary").text();
			if(typeof linkHref != 'undefined'){
				$(this).find("td.column-summary").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
			}
		});
	}
	
	if( window.location.pathname == "/my_view_page.php" ){
		$(".myview_boxes_area tr.my-buglist-bug").each(function(){										
			var linkHref = $(this).find("td.my-buglist-id span.small a:not(.edit)").attr("href");
			var bugName = $(this).find("td.my-buglist-description").html();
			if(typeof linkHref != 'undefined'){
				$(this).find("td.my-buglist-description").html("<a href=\"" + linkHref + "\" class=\"not-link-hover-underline\">" + bugName + "</a>");
			}
		});
	}
	
});