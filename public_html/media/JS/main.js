'use strict';

const endpoints = {
    get: 'API/feedback/get.php',
    create: 'APi/feedback/create.php',

};

function api(url, formData, success, fail) {
    fetch(url, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .catch(e => {
            console.log(e)
            fail(['Could not read json'])
        })
        .then(response => {
            if (response.status === 'success') {
                success(response.data)
            } else {
                fail(response.errors)
            }
        })
        .catch(e => {
            console.log(e);
            fail(['Could not connect to API'])
        })
}


const forms = {
    create: {
        init: function () {
            console.log('Setting eventListeners on create form');
            this.getElement().addEventListener('submit', this.onSubmitListener)
        },
        getElement: function () {
            return document.querySelector('.feedback-form');
        },
        onSubmitListener: function (e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            api(endpoints.create, formData, forms.create.success, forms.create.fail)
        },
        success: function (data) {
            commentsTable.card.insert(data);
            let element = forms.create.getElement();
            forms.ui.errors.hide(element);
            forms.ui.clear(element);
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        },

    },

    ui: {
        init: function () {
        },
        errors: {
            hide: function (form) {
                const errors = form.querySelectorAll('.field-error');
                if (errors) {
                    errors.forEach(node => {
                        node.remove();
                    });
                }
                ;
            },
            show: function (form, errors) {
                this.hide(form);
                Object.keys(errors).forEach(function (error_id) {
                    const field = form.querySelector('input[name="' + error_id + '"]');

                    const span = document.createElement("span");
                    span.className = 'field-error';
                    span.innerHTML = errors[error_id];
                    field.parentNode.append(span);
                    console.log('Form error in field: ' + error_id + ':' + errors[error_id]);
                });
            },
        },
        clear: function (form) {
            let fields = Array.from(form);
            fields.forEach(field => {
                field.value = '';
            })
        },
        fill: function (form, comment) {
            form.setAttribute('card-id', comment.id);
            Object.keys(comment).forEach(input_id => {
                if (input_id !== 'id') {
                    let input = form.querySelector('input[name="' + input_id + '"]');
                    input.value = comment[input_id];
                }
            });
        }
    }
}

const commentsTable = {
    init: function () {
        this.data.load();

    },

    getElement: function () {
        return document.querySelector('.feedback-tbody');
    },
    data: {
        load: function () {
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            data.forEach(comment => {
                commentsTable.row.insert(comment);
            })
        },
        fail: function (errors) {
            errors.forEach(error => {
                console.log(error)
            })
        }

    },

    row: {
        render: function (feedback) {
            let rowTr = document.createElement('tr');
            rowTr.className = 'table-row';
            rowTr.setAttribute('card-id', feedback.id);
            rowTr.innerHTML = `
          <td>${feedback.name}</td>
          <td>${feedback.comment}</td> 
            <td>${feedback.date}</td>
`;


            return cardCont;

        },
        insert: function (comment) {
            commentsTable.getElement().append(commentsTable.row.render(comment));
        },

    },
}


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