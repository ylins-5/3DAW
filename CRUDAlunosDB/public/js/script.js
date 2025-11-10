document.addEventListener('DOMContentLoaded', function(){
    //Abrir Modal de Edição
    const editButtons = document.querySelectorAll('.edit.btn');
    const editModal= document.getElementById('editModal');
    const closeModal = document.querySelector('.close-modal');

    editButtons.forEach(button => {
        button.addEventListener('click', function(){
            const userId = this.getAttribute('data-id');
            const userNome = this.getAttribute('data-nome');
            const userEmail = this.getAttribute('data-email');
            const userMatricula = this.getAttribute('data-matricula');

            document.getElementById('editId').value = userId
            document.getElementById('editNome').value = userNome
            document.getElementById('editEmail').value = userEmail
            document.getElementById('editMatricula').value = userMatricula

            editModal.style.display = 'block'
        });
    });

    closeModal.addEventListener('click', function(){
        editModal.style.display = 'none'
    });

    window.addEventListener('click', function(event){
        if(event.target === editModal){
            editModal.style.display = 'none'
        }
    });
    
})