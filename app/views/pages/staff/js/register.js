const query = q => {
    let doc = document.querySelector(q);
    return doc;
};

let errorDisplay = query(".info");
const message = (alert, display) =>{    
    errorDisplay.textContent = display;
    errorDisplay.setAttribute('class', alert);
}

const form = query("#newstaff");
form.addEventListener("submit", e => {
    e.preventDefault();
    const action   = form.getAttribute("action");
    const name = query("#name").value;
    const email = query("#email").value;
    const passcode = query("#passcode").value;
    const office =query("#office").value;

        if (name == '' || passcode == '' || email == '' || office == '') {
            message('alert alert-warning text-center', "You Must Fill All Empty Field ...");
            return false;
        }

    let parse_ = {name:name, email: email, passcode: passcode, office:office};

    let parse  = JSON.stringify(parse_);

    fetch(action, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: parse
    })
        .then(res => res.text())
        .then(response => {
            if (response !== "successful") {
                message('alert alert-warning text-center', "An Error Has Occured Try Again");
            } else {
                message('alert alert-success text-center', "Account Created !!!");
                form.reset();
            }
        })
        .catch(error => console.error("ERROR:", error));
});