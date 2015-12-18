window.onload = function(){
	var bg = document.getElementById("mannequib").src;
	document.getElementById("background").innerHTML = "";
			
	var R = Raphael('background', 545, 295);
	var bg_img = R.image(bg, 75, 4, 400, 295);

	$('li.imageMenu').on('click', function(e) {
		console.log(e);
		var imageObject = $(this);
		var idRef = $(imageObject).find('img').attr('id');
		
		document.getElementById("foreground").innerHTML = "";
		fg = '/img/lunettes/png/lunette' + idRef + '.png';
		var R = Raphael('foreground', 550, 300);
		var fg_img = R.image(fg, 2, 39, 170, 138);
	});		
}
