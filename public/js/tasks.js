// resources/js/tasks.js

// Função para mostrar o formulário de justificativa
window.showJustification = function(taskId) {
    // Esconde os botões Editar, Excluir e Reabrir
    document.querySelector('.edit-btn-' + taskId)?.classList.add('d-none');
    document.querySelector('.delete-form-' + taskId)?.classList.add('d-none');
    document.querySelector('.reopen-btn-' + taskId)?.classList.add('d-none');

    // Mostra o formulário de justificativa
    document.querySelector('.justification-form-' + taskId)?.classList.remove('d-none');
};

window.cancelJustification = function(taskId) {
    // Mostra novamente os botões
    document.querySelector('.edit-btn-' + taskId)?.classList.remove('d-none');
    document.querySelector('.delete-form-' + taskId)?.classList.remove('d-none');
    document.querySelector('.reopen-btn-' + taskId)?.classList.remove('d-none');

    // Esconde o formulário
    document.querySelector('.justification-form-' + taskId)?.classList.add('d-none');
};
