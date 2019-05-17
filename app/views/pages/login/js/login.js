const query = q => {
    let doc = document.querySelector(q);
    return doc;
};

let errorDisplay = query(".info");
const message = (alert, display) =>{    
    errorDisplay.textContent = display;
    errorDisplay.setAttribute('class', alert);
}

const form = query("#loginform");
form.addEventListener("submit", e => {
    e.preventDefault();
    const action   = form.getAttribute("action");
    const username = query("#email").value;
    const password = query("#memid").value;

        if (username == '' || password == '') {
            message('alert alert-warning text-center', "You Must Fill All Empty Field ...");
            return false;
        }

    let parse_ = { email: username, memid: password };

    let parse  = JSON.stringify(parse_);

    fetch(action, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: parse
    })
        .then(res => res.text())
        .then(response => {
            if (response === "Invalid Credentials...") {
                message('alert alert-warning text-center', "Invalid Credentials");
            } else {
                message('alert alert-success text-center', "Please Wait!!!");
                window.location = response;
            }
        })
        .catch(error => console.error("ERROR:", error));
});
