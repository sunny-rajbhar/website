/** JavaScript
 * Created by Sunny on 8/26/2018.
 */
//this for logout button
function onmouse() {
    var x;
    x = document.getElementById("demo");
	x.style.backgroundColor = "red";
}

function outmouse() {
	var x = document.getElementById("demo");
	x.style.backgroundColor = "";
}
/*
function next() {
	var x = document.getElementById("chp").innerHTML = "Sorry <br> Nothing To Display";
}*/
/* Loading/Updating document from server using AJAX*/
function loadDoc() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("para").innerHTML = this.responseText;
		}
    };
	xhttp.open("GET", "file.txt", true);
	xhttp.send();
	var pre = document.getElementById("pre").innerHTML = "Previous";
}
function backDoc() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("para").innerHTML = this.responseText;
		}
    };
	xhttp.open("GET", "file1.txt", true);
	xhttp.send();
	var pre = document.getElementById("pre").innerHTML = "";
}

/* User loginValidation */
function loginvalidate() {
	var user = document.getElementById('user').value;
	var pass = document.getElementById('pass').value;

	if(user === "") {
		document.getElementById('suser').innerHTML = "*Please fill the username";
		return false;
	}
	if((user.length <=2)|| (user.length > 20)) {
	    document.getElementById('suser').innerHTML = "*Username must be between 3 & 20";
		return false;
    }
	if(pass === "") {
		document.getElementById('spass').innerHTML = "*Please fill the Password";
		return false;
	}
	if((pass.length <=4) || (pass.length > 16)) {
	    document.getElementById('spass').innerHTML = "*Password must be between 5 & 16";
		return false;
	}
}
/* Register Validation */
function registervalidate() {
	var user = document.getElementById('user').value;
	var email = document.getElementById('email').value;
	var pass = document.getElementById('pass').value;
	var cpass = document.getElementById('cpass').value;

	if(user === "") {
		document.getElementById('suser').innerHTML = "*Please fill the username";
		return false;
	}
	if(user.length <=2 || (user.length > 20)) {
	    document.getElementById('suser').innerHTML = "*Username must be between 3 & 20";
		return false;
	}
	if(!isNaN(user)) {
		document.getElementById('suser').innerHTML = "*Only Characters are allowed";
		return false;
	}

	if(email === "") {
		document.getElementById('semail').innerHTML = "*Please enter email";
		return false;
	}
	if(email.indexOf('@')<=0 ) {
	    document.getElementById('semail').innerHTML = "*Invalid email";
		return false;
	}
	if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) {
	    document.getElementById('semail').innerHTML = "*Invalid email";
		return false;
	}

	if(pass === "") {
		document.getElementById('spass').innerHTML = "*Please fill the Password";
		return false;
	}
	if((pass.length <=4) || (pass.length > 16)) {
	    document.getElementById('spass').innerHTML = "*Password must be between 5 & 16";
		return false;
	}

	if(cpass === "") {
		document.getElementById('scpass').innerHTML = "*Please enter confirm password";
		return false;
	}
	if(pass!==cpass) {
		document.getElementById('scpass').innerHTML = "Passwords not matching";
		return false;
	}
}
/* Google Map
function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7wKjMfXH1tQlKZpiv3KPA4ajACzyJ-Hw&callback=myMap";

	*/