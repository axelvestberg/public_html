$(document).ready(function() {
	$("#change").click(function() {
		$("#change")
			.text("Egenskap ändrad")
			.css({ color: "red" });
	});

	$("#add").click(function() {
		$("#addHtml")
			.text("Lagt till nytt innehåll!")
			.css({ color: "red" });
	});

	$("#remove").click(function() {
		$("#remove").remove();
	});

	x = 0;
	$("#scrollable").scroll(function() {
		$("#scroll").text((x += 1));
	});

	y = 0;
	$("input").keypress(function() {
		$("#press").text((y += 1));
	});

	$("#hoverbox").hover(
		function() {
			$(this).css("background", "green");
		},
		function() {
			$(this).css("background", "red");
		}
	);

	$("input").focus(function() {
		$("#hoverbox")
			.text("Focus text")
			.fadeIn(2000);
	});

	$("#prevent").click(function(event) {
		event.preventDefault();
	});

	$(document).mousemove(function(event) {
		$("#position").text("X: " + event.pageX + ", Y: " + event.pageY);
	});

	$("#off").click(function() {
		$("#offp").off("click");
	});

	$("#offp").click(function() {
		$("#offp")
			.text("Du har inte tryckt på knappen ovan")
			.css({ color: "red" });
	});
});
