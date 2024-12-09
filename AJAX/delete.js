/* Espera que todos o HTML seja carregado (DOM) */
document.addEventListener('DOMContentLoaded', function () {

    /* Captura todos os forms de delete pela class */
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('click', function (event) {
            /* Impede que envio padrão do form */
            event.preventDefault();

            /* Captura o id do serviço a ser deletado */
            const serviceId = this.getAttribute('data-id');

            /* Configurações do AJAX */
            fetch('../controller/processList.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    type: 'delete',
                    id: serviceId
                })
            })
                /* Tratamento para a resposta do servidor */
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Serviço deletado com sucesso!');
                        /* Remove o elemento até o avô para eliminar o registro */
                        form.parentElement.parentElement.remove();
                    } else {
                        alert('Erro ao deletar o serviço.');
                    }
                })
                /* Captura de erro na comunicação com o servidor */
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro inesperado ao tentar deletar o serviço.');
                });
        });
    });

});
