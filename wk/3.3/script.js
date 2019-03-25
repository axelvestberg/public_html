function myAlert() {
	alert("Alert box activated beep boop");
}
function myConfirm() {
	confirm("Klicka på ett alternativ");
}
function myPrompt() {
	prompt("Skriv något skoj");
}

var myWindow;
function myOpen() {
	myWindow = window.open(
		"https://google.se",
		"_blank",
		"width=1200, height=700"
	);
	console.log("open");
}
function myClose() {
	myWindow.close();
	console.log("close");
}

function stopInterval() {
	console.log("stopInterval");
	clearInterval(myInterval);
}

var myInterval = setInterval(counter, 1000);
counter = 1;
function counter() {
	document.getElementById("counterId").innerHTML = counter;
	counter++;
	if (counter > 10) {
		document.getElementById("counterId").innerHTML = "Nu kommer jag!";
		counter = 1;
	}
}

var myMessage;

function myTimeout() {
	document.getElementById("message").innerHTML =
		"Ditt meddelande kommer att visas här";
	document.getElementById("messageSent").innerHTML = "";
	myMessage = setTimeout(function() {
		document.getElementById("message").innerHTML =
			"Tjena kexet, står du här och smular ;)";
		document.getElementById("messageSent").innerHTML = "Meddelande skickat";
	}, 3000);
}

function abortMessage() {
	clearTimeout(myMessage);
	document.getElementById("messageSent").innerHTML =
		"Skickat meddelande avbrutet";
}
