function msieversion() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
            return true;
        else              
            return false;
}

//добавляем шрифт
var link = document.createElement('link');
link.href = 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700&subset=cyrillic,cyrillic-ext,latin';
link.rel = 'stylesheet';
document.getElementsByTagName('head')[0].appendChild(link);

//меняем фавиконку
var link = document.createElement('link');
link.type = 'image/png';
link.rel = 'icon';
link.href = 'templates/DarkRed/favicon.png';
document.getElementsByTagName('head')[0].appendChild(link);
	
$( document ).ready(function() {
	//меняем лого
	$("img[src*='mantis_logo.png']").attr("src","templates/DarkRed/mantis_logo.png");
	
	//меняем rss-иконку
	$("img[src*='rss.png']").attr("src","templates/DarkRed/rss.png");
	
	//меняем стиль меню
	if(typeof  $("tr td.menu").first().html() != 'undefined'){
		var new_menu = $("tr td.menu").first().html().replace(/\|/g,'');
		$("tr td.menu").first().html("");
		$("tr td.menu").first().html(new_menu);
	}
	
	//плюс и минус у фильтра
	$("img[src*='plus.png']").attr("src","templates/DarkRed/plus.png");
	$("img[src*='minus.png']").attr("src","templates/DarkRed/minus.png");
	
	//вверх вниз списке багов
	$("img[src*='up.gif']").attr("src","templates/DarkRed/up.png");
	$("img[src*='down.gif']").attr("src","templates/DarkRed/down.png");
	$("img[src*='up.png']").css("padding","0 0 0 5px");
	$("img[src*='down.png']").css("padding","0 0 0 5px");
	
	//приоритеты багов
	$("#buglist tr:not(.row-category) td:not([colspan])").each(function(){										
		if($.trim($(this).html()) == '&nbsp;')
		{
			$(this).html("<img src=\"../../templates/DarkRed/priority_1.png\">");
		}
	});
	$("img[src*='priority_normal.gif']").attr("src","templates/DarkRed/priority_3.png");
	$("img[src*='priority_low_1.gif']").attr("src","templates/DarkRed/priority_2.png");
	$("img[src*='priority_1.gif']").attr("src","templates/DarkRed/priority_4.png");
	$("img[src*='priority_2.gif']").attr("src","templates/DarkRed/priority_5.png");
	$("img[src*='priority_3.gif']").attr("src","templates/DarkRed/priority_6.png");
	
	//меняем картинку редактирования
	$("img[src*='update.png']").attr("src","templates/DarkRed/update.png");
	
	//удаляем лишние hr
	$("hr[size='1']").remove();
	
	//добаввляем стиль к копирайту
	$("address").eq(0).html($("address").eq(0).html() + "<span style=\"margin-left: 10px; font-size: 8pt\">Design by <a href=\"mailto:alex.kar.008@gmail.com\">alex.kar</a></span>");
	
	//убираем подчеркивание с анкоров
	$("a:not([href])").css("text-decoration","none").css("color", "black");
	
	//добавляем стиль к конкретным страницам
	if( window.location.pathname == "/bug_report_page.php" ){
		$("table.width90").addClass("bug-report-page");
	}
	
	if( window.location.pathname == "/summary_page.php" ){
		$(".form-title").remove();
	}
	
	if( window.location.pathname == "/view.php" ){
		$("table.width100").not(':eq(0)').addClass("bug-view-page");
	}
	
	if( window.location.pathname == "/billing_page.php" ){
		$("table.width100").not(':eq(0)').addClass("bug-billing-page");
	}
	
	if( window.location.pathname == "/login_page.php" ){
		$("tr.row-1").css("background-color","white");
		$("table.width50").addClass("login-page");
		$("table.width50 .category").addClass("login-page-category");
		$(".bracket-link").addClass("login-page-bracket");
		$("table.width50 .form-title").remove();
		$("table.width50 input[type='text']").addClass("form-control");
		$("table.width50 input[type='password']").addClass("form-control");
		$("table.width50 input[type='submit']").addClass("btn btn-default btn-right").css("padding","5px 12px").css("margin-top", "20px");
	}
	
	//выделение в меню
	if( window.location.pathname == "/my_view_page.php" ){
		$("a[href*='my_view_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/view_all_bug_page.php" || window.location.pathname == "/view.php" ){
		$("a[href*='view_all_bug_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/bug_report_page.php" ){
		$("a[href*='bug_report_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/changelog_page.php" ){
		$("a[href*='changelog_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/roadmap_page.php" ){
		$("a[href*='roadmap_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/summary_page.php" ){
		$("a[href*='summary_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname.match(/\/manage_.*/) || window.location.pathname.match(/\/adm_.*/) || window.location.pathname == "/plugin.php" ){
		$("a[href*='manage_overview_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/account_page.php" ){
		$("a[href*='account_page']").addClass("selected-menu");
	}
	
	if( window.location.pathname == "/billing_page.php" ){
		$("a[href*='billing_page']").addClass("selected-menu");
	}
	
	//menu fix for IE
	if( !msieversion() ){
		$("tr td.menu a").css("transition","0.2s");
	}
	
});