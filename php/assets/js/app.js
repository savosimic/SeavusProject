const usernameEl = document.querySelector('#username');
const usernameError = document.querySelector('#username-error');
const passwordEl = document.querySelector('#password');
const passwordError = document.querySelector('#password-error');

const form = document.querySelector('#login-form');

form.reset();
const checkUsername = () => {

    let valid = false;

    const min = 3,
        max = 25;

    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameError, 'Username cannot be blank.');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameError, `Username must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(usernameError);
        valid = true;
    }
    return valid;
};


const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordError, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordError, 'Password must has at least 8 characters');
    } else {
        showSuccess(passwordError);
        valid = true;
    }

    return valid;
};


const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^[a-zA-Z0-9]{8,}$");
    return re.test(password);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('text-danger');

    // show the error message
    const error = formField;
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('is-valid');

    // hide the error message
    const error = formField;
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isUsernameValid = checkUsername(),
        isPasswordValid = checkPassword();

    let isFormValid = isUsernameValid &&
        isPasswordValid;

    // submit to the server if the form is valid
    if (isFormValid) {

        form.submit();


    }

});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'username':
            checkUsername();
            break;
        case 'password':
            checkPassword();
            break;
    }
}));
