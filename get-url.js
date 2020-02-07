/***** EDIT ONLY THIS SITE URL VARIABLE *****/
var siteUrl = "http://yoursiteurl.com";
/***** DO NOT EDIT BELOW THIS LINE *****/

jQuery(document).ready(function($) {
	$(window).on('load', function (e) {
		$("a.aws-link").click(function() {
			return false;
		});
		$("a.aws-link").click(function(){
			var newWindow = window.open("", "_blank");
			var file_name = $(this).attr('name');
			$.post(siteUrl + "/wp-content/plugins/aws-secure-link/get-url.php", {object_key : file_name}, function(data){
				if (data.length>0){
					return newWindow.location = data;
				} 
			});
		});
	});
});