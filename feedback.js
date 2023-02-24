// Get the form element
var form = document.querySelector('form');

// Add an event listener to the form to handle submissions
form.addEventListener('submit', function(event) {
	// Prevent the form from submitting
	event.preventDefault();

	// Get the values of the form fields
	var name = form.elements.name.value;
	var email = form.elements.email.value;
	var feedback = form.elements.feedback.value;

	// Do something with the form data (e.g. send it to a server)
	console.log('Name:', name);
	console.log('Email:', email);
	console.log('Feedback:', feedback);

	// Clear the form fields
	form.reset();

	// Show a confirmation message to the user
	alert('Thank you for your feedback!');
});
