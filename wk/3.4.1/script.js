function showButton() {
	$("#textOne").show();
}
function hideButton() {
	$("#textOne").hide();
}
function toggleButton() {
	$("#textOne").toggle();
}

function fadeInButton() {
	$("#textTwo").fadeIn();
}
function fadeOutButton() {
	$("#textTwo").fadeOut();
}
function fadeToggleButton() {
	$("#textTwo").fadeToggle();
}
function fadeToButton() {
	$("#textTwo").fadeTo("slow", 0.5);
}

function animateButton() {
	$("#animateDiv").animate({ width: "300px" });
}
function resetAnimateButton() {
	$("#animateDiv").animate({ width: "50px" });
}

function linearButton() {
	$("#myDiv").fadeOut(5000, "linear", callbackFunction);
}
function swingButton() {
	$("#myDiv").fadeIn(3000, "swing", callbackFunction);
}
function callbackFunction() {
	alert("En callback funktion som kallas när animationen är klar");
}
