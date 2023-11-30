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

// Add an event listener to the button
document.querySelector('.buttons[name="edit"]').addEventListener('click', toggleForm);