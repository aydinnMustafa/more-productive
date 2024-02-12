const validateINPForPage = (form) => {
    "use strict";
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    forms.forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });

    // Define validation conditions
    let validationConditions = {};

    if (form === "login") {
        validationConditions = {
            username: {
                condition: (value) => value.length >= 3,
            },
            password: {
                condition: (value) => value.length >= 6,
            },
        };
    } else if (form === "register") {
        validationConditions = {
            name: {
                condition: (value) => value.length >= 3,
            },
            username: {
                condition: (value) => value.length >= 3,
            },
            password: {
                condition: (value) => value.length >= 6,
            },
        };
    } else if (form === "addActivity") {
        validationConditions = {
            name: {
                condition: (value) => value.length >= 5,
            },
            hours: {
                condition: (value) => value >= 0 && value <= 24,
            },
            minutes: {
                condition: (value) => value >= 0 && value <= 59,
            },
        };
    }

    // Listen for input events to validate fields dynamically
    forms.forEach((form) => {
        form.addEventListener("input", (event) => {
            if (event.target.tagName === "INPUT") {
                const fieldName = event.target.name;
                const fieldValue = event.target.value.trim();
                const condition = validationConditions[fieldName];

                if (condition && !condition.condition(fieldValue)) {
                    event.target.setCustomValidity(condition);
                } else {
                    event.target.setCustomValidity("");
                }
            }
        });
    });
};
