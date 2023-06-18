function toggleForm(formId) {
    var form = document.getElementById(formId);
    var displayValue = form.style.display;
    var forms = document.querySelectorAll('#wrapper35 > div');
    var buttons = document.querySelectorAll('#wrapper35 > button');
    var lineBreaks = document.querySelectorAll('#wrapper35 > br');

    if (displayValue === 'none') {
        // Show the selected form
        form.style.display = 'block';

        // Hide all other forms
        for (var i = 0; i < forms.length; i++) {
            var otherForm = forms[i];
            if (otherForm.id !== formId) {
                otherForm.style.display = 'none';
            }
        }

        // Hide all buttons except the selected button
        for (var j = 0; j < buttons.length; j++) {
            var button = buttons[j];
            if (button.getAttribute('onclick') !== `toggleForm('${formId}')`) {
                button.style.display = 'none';
            }
        }

        // Remove all line breaks
        for (var k = 0; k < lineBreaks.length; k++) {
            var lineBreak = lineBreaks[k];
            lineBreak.parentNode.removeChild(lineBreak);
        }
    } else {
        // Hide the selected form
        form.style.display = 'none';

        // Show all buttons
        for (var l = 0; l < buttons.length; l++) {
            buttons[l].style.display = 'inline-block';
        }

        // Add line breaks between the buttons
        for (var m = 0; m < buttons.length - 1; m++) {
            buttons[m].insertAdjacentHTML('afterend', '<br><br>');
        }
    }
}

function saveName() {
    var name = document.getElementById('name-input').value;

    // Perform actions with the updated name (e.g., save to a database)

    // Update the displayed name on the page
    document.getElementById('name1').textContent = name;

    toggleForm('name-form');
}

function saveUsername() {
    var username = document.getElementById('username-input').value;

    // Perform actions with the updated username (e.g., save to a database)

    // Update the displayed name on the page
    document.getElementById('username').textContent = name;

    toggleForm('username-form');
}

function saveEmail() {
    var email = document.getElementById('email-input').value;

    // Perform actions with the updated email (e.g., save to a database)

    toggleForm('email-form');
}

function savePhone() {
    var phoneNumber = document.getElementById('phone-input').value;

    // Perform actions with the updated phone number (e.g., save to a database)

    // Update the displayed phone number on the page
    document.getElementById('phonenum1').textContent = phoneNumber;

    toggleForm('phone-form');
}

function saveBirthday() {
    var birthday = document.getElementById('birthday-input').value;

    // Perform actions with the updated birthday (e.g., save to a database)

    toggleForm('birthday-form');
}

function saveGender() {
    var gender = document.getElementById('gender-input').value;

    // Perform actions with the updated gender (e.g., save to a database)

    // Update the displayed gender on the page
    document.getElementById('gender').textContent = gender;

    toggleForm('gender-form');
}

function savePicture() {
    var picture = document.getElementById('picture-input').value;

    // Perform actions with the updated picture (e.g., save to a database)

    // Update the displayed picture on the page
    document.getElementById('profile-pic').src = picture;

    toggleForm('picture-form');
}


// Add similar save functions for other details