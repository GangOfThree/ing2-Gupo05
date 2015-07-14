$(document).ready(function(){
	$(".material_card").click(function(){
		$(this).parent().find(".sliderPanel").slideToggle();
	});
});