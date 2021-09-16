function showCadastrar() {
    document.querySelector("#container-cadastro").style.display = "flex"
}

function exitCadastrar() {
    document.querySelector("#container-cadastro").style.display = "none"
}

function showDeletarFuncionario(idFuncionario) {
    let confirmacao = confirm("Deseja deletar o funcionario");

    if (confirmacao) {
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

/*FUNÇÃO DE EDITAR*/

function editar(idFuncionario) {

    //*TESTE DE RECEBIMENTO */
    // alert(idFuncionario)
    //*DIRECIONAR PARA ALGUM LUGAR E ENVIAR O ID DO FUNCIONARIO*/
    window.location = "editar.php?id=" + idFuncionario;

}