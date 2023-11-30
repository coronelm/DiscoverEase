var addButton = document.getElementById('addButton');
var newForm = document.getElementById('add-form');

addButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior
    if (newForm.style.display === 'none' || newForm.style.display === '') {
        newForm.style.display = 'block';
    } else {
        newForm.style.display = 'none';
    }
});

document.getElementById('closeAdd').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior
    newForm.style.display = 'none';
});

function toggleForm() {
    var checkboxes = document.querySelectorAll('input[name="selected_rows[]"]');
    var form = document.getElementById('edit-form');
    var atLeastOneChecked = false;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            atLeastOneChecked = true;
            break;
        }
    }

    if (atLeastOneChecked) {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}

document.querySelector('.buttons[name="edit"]').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior
    toggleForm();
});
