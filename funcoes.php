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

    // function deletarFuncionario($nomeArquivo, $id){
    //     $funcionarios = lerArquivo($nomeArquivo);
    //     foreach($funcionarios as $funcionario){
    //         if($funcionario->id == $id){
    //             unset($funcionario);
    //         }
    //     }
    // }

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

    //"id": 9,
     //   "first_name": "Geoff",
      //  "last_name": "Sandells",
      //  "email": "gsandells8@hugedomains.com",
       // "gender": "Male",
      //  "ip_address": "216.38.39.232",
       // "country": "Indonesia",
       // "department": "Legal"