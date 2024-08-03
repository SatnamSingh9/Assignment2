function validate_registration() {
    
    let valid = true;

    // First Name validation
    const firstname = document.getElementById('firstname').value;
    const firstnameError = document.getElementById('firstnameError');
    if (firstname === '' || firstname.length > 20) {
        firstnameError.textContent = 'x First name must be non-empty and less than 20 characters.';
        valid = false;
    } else {
        firstnameError.textContent = '';
    }

    // Last Name validation
    const lastname = document.getElementById('lastname').value;
    const lastnameError = document.getElementById('lastnameError');
    if (lastname === '' || lastname.length > 20) {
        lastnameError.textContent = 'x Last name must be non-empty and less than 20 characters.';
        valid = false;
    } else {
        lastnameError.textContent = '';
    }
    
    // Phone validation
    //Phone number is non mandatory. No validations required

    // Email validation
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('email-error');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        emailError.textContent = 'x Email address should be non-empty with the format xyz@xyz.xyz.';
        valid = false;
    } else {
        emailError.textContent = '';
    }

    // Password validation
    const password = document.getElementById('pass').value;
    const passwordError = document.getElementById('password-error');
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordPattern.test(password)) {
        passwordError.textContent = 'x Password should be at least 8 characters long, with at least 1 uppercase and 1 lowercase character.';
        valid = false;
    } else {
        passwordError.textContent = ''; 
    }

    // Confirm password validation
    const confirmPassword = document.getElementById('pass2').value;
    const confirmPasswordError = document.getElementById('confirm-password-error');
    if (confirmPassword === '' || password !== confirmPassword) {
        confirmPasswordError.textContent = 'x Please retype the password.';
        valid = false;
    } else {
        confirmPasswordError.textContent = '';
    }

    return valid;
}

