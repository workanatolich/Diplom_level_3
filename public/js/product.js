let form_create = document.querySelector('.review-form-create');
let form_edit = document.querySelector('.review-form-edit');
let form_view = document.querySelector('.review-form-view');

let button_create = document.querySelector('.action-create');
let button_edit = document.querySelector('.action-edit');

button_create.onclick = function () {
    if(form_create.style.display == 'none' || form_create.style.display == '') {
        form_create.style.display = 'block';
    } else {
        form_create.style.display = 'none';
    }
}

button_edit.onclick = function () {
    if(form_edit.style.display == 'none' || form_edit.style.display == '') {
        form_edit.style.display = 'block';
        form_view.style.display = 'none';
        
    } else {
        form_edit.style.display = 'none';
        form_view.style.display = 'block';
    }
}
