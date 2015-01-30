$(function () {
	$("textarea[name='bugnote_text']").keydown(function (e) {
	  if (e.ctrlKey && (e.keyCode == 10 || e.keyCode == 13)) {
		$("form[name='bugnoteadd']").trigger('submit');
	  }
	});
})