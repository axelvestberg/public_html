var namn = ["axel", "edvard", "henrik", "adrian"];
document.getElementById("array").innerHTML =
	"Array - En array med namn: " + namn;

var boolean = 10 > 9;
document.getElementById("boolean").innerHTML =
	"Boolean - Är 10 större än 9: " + boolean;

var date = Date();
document.getElementById("date").innerHTML =
	"Date - Datum och tid just nu: " + date;

var math = Math.pow(8, 2);
document.getElementById("math").innerHTML = "Math - 8 upphöjt till 2: " + math;

var number = 10;
document.getElementById("number").innerHTML =
	"Number - Test om 10 är ett nummer med hjälp av typeof: " + typeof number;

var q = "hej " + "vad " + "heter " + "du?";
var a = "jag heter axel";
var string = q + " " + a;
document.getElementById("string").innerHTML =
	"String - En ihopbyggnad av flera strängar: " + string;

var str = "Apple gör de bästa mobiltelefonerna";
var truth = str.replace("bästa", "sämsta");
document.getElementById("regexp").innerHTML =
	"RegExp - Ett test av replace() metoden: " + truth;

var globalstring = parseInt("900");
var type = typeof globalstring;
document.getElementById("global").innerHTML =
	"Global - ett test av parseInt() metoden: " + type;
