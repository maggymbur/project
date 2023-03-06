// Get all the submit buttons on the page
const buttons = document.querySelectorAll('button[type="submit"]');

// Add an event listener to each button
buttons.forEach(button => {
  button.addEventListener('click', function(event) {
    // Prevent the form from submitting and reloading the page
    event.preventDefault();

    // Display an alert message
    alert('Thank you for choosing. Check your email for more information');
  });
});
