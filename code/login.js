document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Check if both email and password are filled
    if (email.trim() === '' || password.trim() === '') {
        event.preventDefault(); // Prevent form submission
        alert('Please fill in both email and password.');
    }
});
