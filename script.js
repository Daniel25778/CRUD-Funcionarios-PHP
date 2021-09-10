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


// function showDeletarFuncionario() {
//     document.querySelector("#deletarFuncionario").style.display = "flex"
// }

// function exitDeletarFuncionario() {
//     document.querySelector("#deletarFuncionario").style.display = "none"
// }