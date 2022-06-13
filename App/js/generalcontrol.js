$(document).ready(function() {
  	
	//Get Zoom Cookie
	var zoomValue = getCookie('zoomValue');
	if (zoomValue != '') {

		zoomInOut('', zoomValue);
		
	}

	//ZOOM IN
	$('body').on('click', '.btn-increase', function(e){
		e.preventDefault();

		zoomInOut('+', '');

	})	

	//ZOOM OUT
	$('body').on('click', '.btn-decrease', function(e){
		e.preventDefault();

		zoomInOut('-', '');

	})		

})

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function zoomInOut(zoomInOut, zoomValue){

	var zoomPercentage = "";
	var zoomN = "";
	var zoom = document.body.style.zoom;

	zoomPercentage = zoomValue;

	if (zoomPercentage == '') {
		if (zoomInOut == '+') {

			if (zoom == "") {
				zoomPercentage = "110%";
			} else {
				zoomN = zoom.replace("%", "");
				zoomPercentage = (+zoomN + 10) + "%";
			}

		} else {

			if (zoom == "") {
				zoomPercentage = "90%";
			} else {
				zoomN = zoom.replace("%", "");
				zoomPercentage = (+zoomN - 10) + "%";
			}

		}

	}

	setCookie('zoomValue', zoomPercentage, 0);
	document.body.style.zoom = zoomPercentage;

}