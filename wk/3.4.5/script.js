var firstname, vehicle, carModel;

function submitFunction() {
    carModel = $("#cars").val();
    email = $("#email").val();
    number = $("#number").val();

    if (number != 9) {
        alert("Du måste skriva in 9");
        return false;
    }
    if (number == 9) {
    if (vehicle === "bil") {
        alert("Hej " + firstname + "!\n" + "Kul att du valde en "  + carModel + ".\n" + "Vi kommer att kontakta dig på " + email + " så fort vi kan!");
    }
    if (vehicle === "cykel" ) {
        alert("Hej " + firstname + "!\n" + "Trevligt att du valde en " + vehicle + ".\n" + "Vi kommer att kontakta dig på " + email + " så fort vi kan!");
        }
    }
}


function formBuilder() {
    vehicle = $("input[name='vehicle']:checked").val();
    firstname = $("#firstname").val();
    
    if (vehicle === "bil") {
        $("#vehiclefield").remove();
        $('<div id="vehicleField">'
        + 'Jag är över 18 '
        + '<input type="checkbox"/><br>'
        + 'Välj bilmärke ' 
        + '<select id="cars">'
        + '<option value="volvo" selected>Volvo</option>'
        + '<option value="saab">Saab</option>'
        + '<option value="fiat">Fiat</option>'
        + '<option value="audi">Audi</option>'
        + '</select>'
        + '</div>')
        .insertBefore("#agree");
        $("#vehiclefield").remove();
    }

    if (vehicle === "cykel") {
        $("#vehicleField").remove();
    }
}


//Alla funktioner som kallas i (document).ready måste ligga innan (document).ready
$(document).ready(function(){
$("#myForm").submit(submitFunction)
$(".vehicleClass").change(formBuilder)
});