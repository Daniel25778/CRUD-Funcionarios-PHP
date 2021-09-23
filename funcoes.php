<?php

//recebe o nome do arquivo
function lerArquivo($nomeArquivo){
    //le o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);
//transforma a string em array
    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario($funcionarios, $nome){
    $funcionariosFiltro = [];  
    foreach($funcionarios as $funcionario){

            if(strpos(strtolower($funcionario->first_name), strtolower($nome)) !== false){
                $funcionariosFiltro[] = $funcionario;
            } else if(strpos(strtolower($funcionario->last_name), strtolower($nome)) !== false){
                $funcionariosFiltro[] = $funcionario;
            }else if(strpos(strtolower($funcionario->department), strtolower($nome))!== false){
                $funcionariosFiltro[] = $funcionario;
            }
    
        }
        return $funcionariosFiltro;
    }

    function adicionarFuncionario($nomeArquivo, $novoFuncionario){

        $funcionarios = lerArquivo($nomeArquivo);
        $funcionarios[] = $novoFuncionario;
        $json = json_encode($funcionarios);
        file_put_contents($nomeArquivo, $json);

    }

    function deletarFuncionario($nomeArquivo, $idFuncionario){
        $funcionarios = lerArquivo($nomeArquivo);
    
        foreach($funcionarios as $chave => $funcionario){
            if($funcionario->id == $idFuncionario){
                unset($funcionarios[$chave]);
            }
        }
    
        $json = json_encode(array_values($funcionarios));
    
        file_put_contents($nomeArquivo, $json);
    }

    //*BUSCA FUNCIONARIO POR ID:*/

    function buscarFuncionarioPorId($nomeArquivo, $idFuncionario){
      $funcionarios = lerArquivo($nomeArquivo);
      
      foreach($funcionarios as $funcionario){
        if($funcionario->id == $idFuncionario){
            return $funcionario;
        } 
      }
       return false;

    }

    function editarFuncionario($nomeArquivo, $funcionarioEditado){
        $funcionarios = lerArquivo($nomeArquivo);
    
        foreach($funcionarios as $chave => $funcionario){
            if($funcionario->id == $funcionarioEditado["id"]){
                $funcionarios[$chave] = $funcionarioEditado;
            }
        }
    
        $json = json_encode(array_values($funcionarios));
    
        file_put_contents($nomeArquivo, $json);
    }

    function realizarLogin($usuario, $senha, $dados){
        foreach($dados as $dado){
            if($dado->usuario == $usuario && $dado->senha == $senha){
                    //* VARIAVEL DE SESSÃO *//
                    $_SESSION["usuario"] = $dado->usuario;
                    $_SESSION["id"] = session_id();
                    $_SESSION["data_hora"] = date('d/m/Y - h:i:s');
                    header("location: area_restrita.php");
                   exit;
                    
            }
            
        }
        header("location: index.php");
    }

  
    //VERIFICA SE O PROCESSO DE LOGIN FOI REALIZADO

    function verificarLogin(){

      if($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))){

        header("location: index.php");

      }
    }

    //**FINALIZAÇÃO LOGIN,DESTRUIR A SESSÃO APÓS DAR O LOGOUT */

function finalizarLogin(){
    session_unset();//limpa todas as variaveis de sessão
    session_destroy();

    header("location: index.php");

}

    //"id": 9,
     //   "first_name": "Geoff",
      //  "last_name": "Sandells",
      //  "email": "gsandells8@hugedomains.com",
       // "gender": "Male",
      //  "ip_address": "216.38.39.232",
       // "country": "Indonesia",
       // "department": "Legal"