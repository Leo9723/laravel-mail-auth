import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteButton = document.querySelectorAll('.confirm-delete-project[type="submit"]');

deleteButton.forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();

        const projectTitle = button.getAttribute('data-title');

        const modal = document.getElementById('delete-project');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalTitle = modal.querySelector('#modal-title');
        modalTitle.textContent = projectTitle;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () =>{
                button.parentElement.submit();
        });

    });
});

const deleteType = document.querySelectorAll('.confirm-delete-type[type="submit"]');

deleteType.forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();

        const typeName = button.getAttribute('data-title');

        const modal = document.getElementById('delete-type');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalName = modal.querySelector('#modal-name');
        modalName.textContent = typeName;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () =>{
                button.parentElement.submit();
        });

    });
});

const deleteTechnology = document.querySelectorAll('.confirm-delete-technology[type="submit"]');

deleteTechnology.forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();

        const technologyName = button.getAttribute('data-title');

        const modal = document.getElementById('delete-technology');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalName = modal.querySelector('#modal-name');
        modalName.textContent = technologyName;

        const deleteButton = modal.querySelector('#confirm-delete');
        deleteButton.addEventListener('click', () =>{
                button.parentElement.submit();
        });

    });
});