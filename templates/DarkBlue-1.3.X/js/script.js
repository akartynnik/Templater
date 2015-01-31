//добавляем шрифт
var link = document.createElement('link');
link.href = 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700&subset=cyrillic,cyrillic-ext,latin';
link.rel = 'stylesheet';
document.getElementsByTagName('head')[0].appendChild(link);

//меняем фавиконку
var link = document.createElement('link');
link.type = 'image/png';
link.rel = 'icon';
link.href = 'templates/DarkBlue/favicon.png';
document.getElementsByTagName('head')[0].appendChild(link);
	
$( document ).ready(function() {
	//меняем лого
	$("img[src*='mantis_logo.png']").attr("src","templates/DarkBlue/mantis_logo.png");
	
	//меняем rss-иконку
	$("img[src*='rss.png']").attr("src","templates/DarkBlue/rss.png");
	
	//плюс и минус у фильтра
	$("img[src*='plus.png']").attr("src","templates/DarkBlue/plus.png");
	$("img[src*='minus.png']").attr("src","templates/DarkBlue/minus.png");
	
	//вверх вниз списке багов
	$("img[src*='up.gif']").attr("src","templates/DarkBlue/up.png");
	$("img[src*='down.gif']").attr("src","templates/DarkBlue/down.png");
	$("img[src*='up.png']").css("padding","0 0 0 5px");
	$("img[src*='down.png']").css("padding","0 0 0 5px");
	
	//приоритеты багов
	$("#buglist tr:not(.row-category) td:not([colspan])").each(function(){										
		if($.trim($(this).html()) == '&nbsp;')
		{
			$(this).html("<img src=\"../../templates/DarkBlue/priority_1.png\">");
		}
	});
	$("img[src*='priority_normal.gif']").attr("src","templates/DarkBlue/priority_3.png");
	$("img[src*='priority_low_1.gif']").attr("src","templates/DarkBlue/priority_2.png");
	$("img[src*='priority_1.gif']").attr("src","templates/DarkBlue/priority_4.png");
	$("img[src*='priority_2.gif']").attr("src","templates/DarkBlue/priority_5.png");
	$("img[src*='priority_3.gif']").attr("src","templates/DarkBlue/priority_6.png");
	
	//меняем картинку редактирования
	$("img[src*='update.png']").attr("src","templates/DarkBlue/update.png");
	
	//удаляем лишние hr
	$("#footer hr").remove();
	
	//добаввляем стиль к копирайту
	$("address").eq(0).html($("address").eq(0).html() + "<span style=\"margin-left: 10px; font-size: 8pt\">Design by <a href=\"mailto:alex.kar.008@gmail.com\">alex.kar</a></span>");
	
	//убираем подчеркивание с анкоров
	$("a:not([href])").css("text-decoration","none").css("color", "black");
	
	//добавляем стиль к конкретным страницам
	if( window.location.pathname == "/bug_report_page.php" ){
		$("#report-bug-div").addClass("bug-report-page");
	}
	
	if( window.location.pathname == "/view.php" ){
		$("#content").addClass("bug-view-page");
	}
	
	if( window.location.pathname == "/billing_page.php" ){
		$("table.width100").not(':eq(0)').addClass("bug-billing-page");
	}
	
	if( window.location.pathname == "/login_page.php" ){
		$("label").css("background-color","white");
		$("span").css("background-color","white");
		$(".field-container").css("background-color","white").css("margin","15px 0 0 0 ").css("background-color","transparent");
		$("legend span").html("&nbsp;");
		$("#login-div").addClass("login-page");
		$(".field-container label span").addClass("login-page-category").css("margin","0 0 5px 5px");
		$(".field-container label").css("float","none").css("z-index","0").css("background-color","transparent");
		$(".field-container .input").css("float","none").css("z-index","110");
		$(".field-container .label-style").css("display","none");
		$(".field-container input[type='text']").addClass("form-control").css("width","90%");
		$(".field-container input[type='password']").addClass("form-control").css("width","90%");
		$("#login-form input[type='submit']").addClass("btn btn-default btn-right").css("padding","5px 12px").css("margin-top", "-12px").css("margin-right","0px");
	}
	
	if( window.location.pathname == "/summary_page.php" ){
		$(".section-container").css("margin-top","0");
	}
	
	if( window.location.pathname == "/login_page.php" ){
		var loginLincs = $("#login-links").html();
		$("#login-links").remove();
		var submitSpanHtml = $(".submit-button").html();
		$(".submit-button").html("<ul id=\"login-links\">" + loginLincs + "</ul>" + submitSpanHtml);
	}
	
	//выделение в меню
	if( window.location.pathname == "/my_view_page.php" ){
		$("#menu-items a[href*='my_view_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/view_all_bug_page.php" ){
		$("#menu-items a[href*='view_all_bug_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/bug_report_page.php" ){
		$("#menu-items a[href*='bug_report_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/changelog_page.php" ){
		$("#menu-items a[href*='changelog_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/roadmap_page.php" ){
		$("#menu-items a[href*='roadmap_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/summary_page.php" ){
		$("#menu-items a[href*='summary_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/manage_overview_page.php" ){
		$("#menu-items a[href*='manage_overview_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/account_page.php" ){
		$("#menu-items a[href*='account_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/billing_page.php" ){
		$("#menu-items a[href*='billing_page']").addClass("selected-menu");
	}

});