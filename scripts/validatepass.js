// Function to validate password
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match. Please re-enter your password.");
        return false;
    }

    // Add your password validation logic here
    // ...

    return checkDuplicateDetails();
}

// Array to store existing usernames
var existingUsernames = ['Affif720', 'Halim123', 'ahmad', 'syareel'];

// Array to store existing emails
var existingEmails = ['affifazmi720@gmail.com', 'halim@gmail.com', 'makram@gmail.com', 'syareel@gmail.com'];

// Array to store existing phone numbers
var existingPhoneNumbers = ['0123467161', '0123123123', '01123123123', '0199997325'];

// Function to check for duplicate details
function checkDuplicateDetails() {
    var username = document.getElementById("username").value;
    var email = document.getElementsByName("email")[0].value;
    var phoneNumber = document.getElementsByName("phone")[0].value;

    if (existingUsernames.includes(username)) {
        alert("Username is already in use. Please enter another username.");
        return false;
    }

    if (existingEmails.includes(email)) {
        alert("Email is already in use. Please enter another email.");
        return false;
    }

    if (existingPhoneNumbers.includes(phoneNumber)) {
        alert("Phone number is already in use. Please enter another phone number.");
        return false;
    }

    // Add new username to the array
    existingUsernames.push(username);

    // Add new email to the array
    existingEmails.push(email);

    // Add new phone number to the array
    existingPhoneNumbers.push(phoneNumber);

    return true;
}
