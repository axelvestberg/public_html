//Hover bildbyte

if (document.images) {
	img1 = new Image();
	img2 = new Image();

	img1.src = "../images/harold1.jpg";
	img2.src = "../images/harold2.jpg";
}

$(document).ready(function() {
	var imageOne = function() {
		$(this).attr("src", "../images/harold1.jpg");
	};
	var imageTwo = function() {
		$(this).attr("src", "../images/harold2.jpg");
	};
	$("#bildAttr").hover(imageTwo, imageOne);

});

function rolloverFunction() {
	console.log("rollover")
	$("#bildRollover").fadeOut(function() {
		$(this).attr("src", "../images/harold1.jpg");
		$(this).fadeIn();
	})
}

var ca = document.getElementById("c1");
var c = ca.getContext("2d");
c.beginPath();
c.moveTo(0, 0);
c.lineTo(150, 75);
c.stroke();

var ca = document.getElementById("c2");
var c = ca.getContext("2d");
c.beginPath();
c.arc(150, 75, 50, 0, 2 * Math.PI);
c.fillStyle = "red"
c.fill();

var ca = document.getElementById("c3");
var c = ca.getContext("2d");
c.beginPath();
c.moveTo(20, 20);
c.bezierCurveTo(20, 150, 200, 200, 250, 25);
c.fillStyle = "green";
c.fill();

var ca = document.getElementById("c4");
var c = ca.getContext("2d");;
var grd = c.createLinearGradient(0,5,200,5);
grd.addColorStop(0,"green");
grd.addColorStop(1,"white");
c.beginPath();								
c.moveTo(20,20);
c.bezierCurveTo(20, 150, 200, 200, 250, 35);
c.fillStyle = grd;
c.fill();

var ca = document.getElementById("c5");
var c = ca.getContext("2d");
var img = document.getElementById("bildAttr");
var pat = c.createPattern(img, "repeat");
c.beginPath();
c.moveTo(20,20);
c.bezierCurveTo(20,150,200,150,200,20);
c.fillStyle = pat;
c.fill();

var d = new Date();
var t = d.toLocaleDateString();

var ca = document.getElementById("c6");
var c = ca.getContext("2d");
c.font = "25px Arial Black";
c.fillText(t, 70, 75);

var ca = document.getElementById("c7");
var c = ca.getContext("2d")
c.shadowBlur = 50;
c.shadowColor = "orange";
c.arc(75, 75, 50, 0, 2 * Math.PI);
c.fillStyle = "red"
c.fill();
c.globalAlpha = 0.2;
c.arc(150, 75, 50, 0, 2 * Math.PI);
c.fillStyle = "green"
c.fill();
c.arc(225, 75, 50, 0, 2 * Math.PI);
c.fillStyle = "blue"
c.fill();


var ca = document.getElementById("c8");
var c = ca.getContext("2d")
c.drawImage(img, 0, 0);

var ca = document.getElementById("c9");
var c = ca.getContext("2d")
c.drawImage(img, 0, 0);


function saveButton() {
	var c = document.getElementById("c9");
	document.location.href = c.toDataURL("image/png").replace("image/png", "image/octet-stream");

}