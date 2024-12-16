document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Get the form data
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const fullName = document.getElementById('full-name').value;
    const cin = document.getElementById('cin').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const status = document.getElementById('status').value;

    // Check if all fields are filled
    if (!fullName || !cin || !email || !phone || !gender || !status) {
        event.preventDefault();
        alert('Please fill in all the fields.');
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        event.preventDefault();
        alert('Passwords do not match!');
        return;
    }

    // Check if phone number is valid (simple check for numbers)
    if (!/^\d+$/.test(phone)) {
        event.preventDefault();
        alert('Please enter a valid phone number.');
        return;
    }
});
