const form = document.getElementById('form');
const username = document.getElementById('username');
const userphone = document.getElementById('userphone');
const userdate = document.getElementById('userdate');
const userpax = document.getElementById('userpax');

form.addEventListener('submit', (e) =>{
    e.preventDefault();

    checkInputs();
    
});

function checkInputs(){

    let allInputsValid =true;

    // get values from input
    const usernameValue = username.value.trim();
    const userphoneValue = userphone.value.trim();
    const userdateValue = userdate.value;
    const userpaxValue = userpax.value;

    // username check
    if(usernameValue === ''){
        // show error
        // add error class
        setErrorFor(username, 'Name cannot be blank');
        allInputsValid = false;
    }else{
        // add success class
        setSuccessFor(username);
    }

    // userphone check
    if(userphoneValue === ''){
        setErrorFor(userphone,'Mobile phone cannot be blank');
        allInputsValid = false;
    }else{
        setSuccessFor(userphone);
    }

    // userdate check
    if(userdateValue === ''){
        setErrorFor(userdate,'Date and Time cannot be blank');
        allInputsValid = false;
    }else{
        setSuccessFor(userdate);
    }

    // userpax check
    if(userpaxValue === ''){
        setErrorFor(userpax,'Please select the number of people');
        allInputsValid = false;
    }
    else{
        setSuccessFor(userpax);
    }

    if (allInputsValid) {
        // Set the action and method dynamically
        form.action = 'phpfile/processBooking.php';
        form.method = 'POST';
      
        // Serialize form data
        const formData = new FormData(form);
      
        // Send form data asynchronously
        fetch(form.action, {
          method: form.method,
          body: formData
        })
        .then(response => {
          // Handle response
          if (response.ok) {
            // Redirect to TableSelection.html
            window.location.href = 'TableSelection.html';
          } else {
            // Handle error
            console.error('Form submission failed.');
          }
        })
        .catch(error => {
          console.error('An error occurred during form submission.', error);
        });
      }
}

function setErrorFor(input,message){
    const formControl = input.parentElement; //form-control
    const small = formControl.querySelector('small');

    // add error message inside small tag
    small.innerText = message;

    // add error class
    formControl.className = 'form-control error';
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}
