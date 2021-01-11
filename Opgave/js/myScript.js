// Her bliver der lavet en eventhandler hvor der bliver tjekket om Document Object Model(DOM) er klar til at execute javascript
$(document).ready(function(){
	// Her bliver der hentet et element med klassen "login" og hvor funktionen "hide" bliver kaldet som gemmer et element
	$(".login").hide();
	// Her bliver der lavet en eventhandler på elementet med klassen "loginBtn" (eventhandler er click)
	$(".loginBtn").on("click", function(e){
		// Her bliver funktionen "slideToggle" kaldet på elementet med klassen "login" som er en jquery funktion som viser eller gemmer elementet med en animation
		$(".login").slideToggle();
	});
});