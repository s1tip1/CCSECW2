

function inputErrorInit(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
    //displays the appropriate error message
}


function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
    //removes the error message from the screen
}
function formMessageInit(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
    //initialises the error message to be displayed
}


function ValidateEmail(inputElement) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      
    if (inputElement.value.match(validRegex)) {
      
        return true;
      
    } else {
      
        return false;
      
    }
      // this function checks if the email is valid
}
function passwordMatch(inputElement){
    var password = signupPassword1
    
    if (inputElement.value == password.value) {
        return true;
    } else {
        return false;
    }
    // this function checks if both inputted passwords match
}
    


document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    loginForm.addEventListener("submit", e => {
        e.preventDefault();
        if(document.querySelector("#signInUsername").value == "" || document.querySelector("#signInPassword").value == ""){
            formMessageInit(loginForm, "error", "Invalid username or password");
        }
        else{
            window.location.href = "/opt/lampp/htdocs/CCSE/CCSE-main/3306/index.php";
        }
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 4) {
                inputErrorInit(inputElement, "Username must be at least 4 characters in length");
            }
            //checks if the username meets the length requirement
            if(e.target.id === "signupEmail" && !ValidateEmail(signupEmail)) {
                inputErrorInit(inputElement, "Please use a valid email address");
            }
            //checks if the email is valid
            if(e.target.id === "signupPassword2" && !passwordMatch(signupPassword2) ) {
                inputErrorInit(inputElement, "Passwords do not match");
            }
            //checks if both inputted passwords match
            

            
            
        });
    createAccountForm.addEventListener("submit", e => {
        e.preventDefault();
        if (!passwordMatch(signupPassword2)) {
            formMessageInit(createAccountForm, "error", "Passwords do not match");
        }
        else if(document.querySelector("#signupUsername").value == "" || document.querySelector("#signupEmail").value == "" || document.querySelector("#signupPassword1").value == "" || document.querySelector("#signupPassword2").value == ""){
            formMessageInit(createAccountForm, "error", "Please fill in all fields");
        }
        else{
            window.location.href = "/opt/lampp/htdocs/CCSE/CCSE-main/3306/index.php";
        }
    });
                

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
    

});