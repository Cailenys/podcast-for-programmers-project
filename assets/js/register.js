//It makes that the registration form is hidden when the login form is in use and vice versa

$(document).ready(function() {

	$("#hideLogin").click(function() {
		$("#loginForm").hide();
		$("#logo").hide();
		$("#loginText").hide();
		$("#registerForm").show();
	});

	$("#hideRegister").click(function() {
		$("#loginForm").show();
		$("#registerForm").hide();
	});
});