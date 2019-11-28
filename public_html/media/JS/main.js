"use strict";

const endpoints = {
    get: "API/feedback/get.php",
    create: "APi/feedback/create.php"
};

function api(url, formData, success, fail) {
    fetch(url, {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .catch(e => {
            console.log(e);
            fail(["Could not read json"]);
        })
        .then(response => {
            if (response.status === "success") {
                success(response.data);
            } else {
                fail(response.errors);
            }
        })
        .catch(e => {
            console.log(e);
            fail(["Could not connect to API"]);
        });
}

const forms = {
    create: {
        init: function () {
            console.log("Setting eventListeners on create form");
            if (this.getElement() !== null) {
                this.getElement().addEventListener("submit", this.onSubmitListener);
            }
        },
        getElement: function () {
            return document.querySelector(".feedback-form");
        },
        onSubmitListener: function (e) {
            e.preventDefault();
            forms.ui.animation(e);
            let formData = new FormData(e.target);
            api(endpoints.create, formData, forms.create.success, forms.create.fail);
        },
        success: function (data) {
            commentsTable.row.insert(data);
            let element = forms.create.getElement();
            forms.ui.errors.hide(element);
            forms.ui.clear(element);
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        }
    },

    ui: {
        init: function () {
        },
        errors: {
            hide: function (form) {
                const errors = form.querySelectorAll(".field-error");
                if (errors) {
                    errors.forEach(node => {
                        node.remove();
                    });
                }
            },
            show: function (form, errors) {
                this.hide(form);
                console.log(errors);
                Object.keys(errors).forEach(function (error_id) {
                    const field = form.querySelector("input");

                    const span = document.createElement("span");
                    span.className = "field-error";
                    span.innerHTML = errors[error_id];
                    field.parentNode.append(span);
                    console.log(
                        "Form error in field: " + error_id + ":" + errors[error_id]
                    );
                });
            }
        },
        clear: function (form) {
            let fields = Array.from(form);
            fields.forEach(field => {
                field.value = "";
            });
        },
        animation: function (e) {
            let button = document.querySelector("button");
            button.classList.add("clicked");
            setTimeout(this.removeClicked, 5000);
        },
        removeClicked: function () {
            let button = document.querySelector("button");
            button.classList.remove("clicked");
        }
    }
};

const commentsTable = {
    init: function () {
        this.data.load();
    },

    getElement: function () {
        return document.querySelector(".feedback-tbody");
    },
    data: {
        load: function () {
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            data.forEach(comment => {
                commentsTable.row.insert(comment);
            });
        },
        fail: function (errors) {
            errors.forEach(error => {
                console.log(error);
            });
        }
    },

    row: {
        render: function (feedback) {
            let rowTr = document.createElement("tr");
            rowTr.className = "table-row";
            rowTr.setAttribute("card-id", feedback.id);
            rowTr.innerHTML = `
            <td class="name-column">${feedback.name}</td>
            <td class="comment-column">${feedback.comment}</td> 
            <td class="date-column">${feedback.date}</td>
`;
            return rowTr;
        },
        insert: function (comment) {
            commentsTable.getElement().append(commentsTable.row.render(comment));
        }
    }
};

/**
 * Core page functionality
 */
const app = {
    init: function () {
        // Initialize all forms
        Object.keys(forms).forEach(formId => {
            forms[formId].init();
        });

        commentsTable.init();
    }
};

// Launch App
app.init();
