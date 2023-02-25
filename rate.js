 // Function to handle the star rating system
function handleRating(rating) {
	// Reset all stars to empty
	document.querySelectorAll('.star').forEach(function(star) {
		star.classList.add('empty');
	});

	// Fill in the selected number of stars
	for (var i = 0; i < rating; i++) {
		document.querySelectorAll('.star')[i].classList.remove('empty');
	}

	// Display alert message
	alert("Thanks for rating this page!");
}

// Add event listeners to the stars to handle clicks
document.querySelectorAll('.star').forEach(function(star, index) {
	star.addEventListener('click', function() {
		handleRating(index + 1);
	});
});
