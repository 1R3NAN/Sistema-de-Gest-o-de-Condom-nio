<?php
session_start();
include_once('config.php');
// print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['nome_fundador']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['fundador']);
    
    header('Location: login.php');
}
$logado = $_SESSION['email'];

if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    $_session["nome_empresa"] = $nome_empresa;
    $_session["nome_fundador"] = $nome_fundador;
}
else
{
    $sql = "SELECT * FROM usuario ORDER BY id DESC";
}

$sql2 = "SELECT * FROM usuario WHERE  email_empresa = \"$logado\"";
$result2 = $conexao->query($sql2);
$row = $result2->fetch_assoc();





if(!empty($_GET['registro_id']))
{
    include_once('config.php');

    $registro_id =$_GET['registro_id'];

    $sqlSelect = "SELECT * FROM ocorrencias WHERE registro_id=$registro_id";
    $result = mysqli_query($conexao, $sqlSelect);

    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) { 
            
            $sujeito = $row['sujeito'];
            $funcao = $row['funcao'];
            $solicitante = $row['solicitante'];
            $descricao = $row['descricao'];
        }
    }
    else
    {
        header('Location: ocorrencia.php');
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ocorrencia-editar.css">
</head>
<body>
    <main>
        <div class="menu">
            <img class= "logo" src="./imagem/logo nova.png" height="65px" width="170px">
            <style>.logo{margin: 10px; margin-top: 20px;}</style>
            <div class="lista">
                <ul>
                <br>
                        <div class="inicio"><img class="icon" src="/PROJETO/imagem/house.png"><a class="inicio" href="pagina-inicial.php"><li>Início</li></a></div>
                        
                        <div class="relatorio"><img class="icon" src="/PROJETO/imagem/relatorio.png"><a class="relatorio" href="relatorio.php"><li>Relatório</li></a></div>

                        <div class="reservas"><img class="icon" src="/PROJETO/imagem/cadeado.png"><a class="reservas" href="reserva.php"><li>Reservas</li></a></div>
                    
                        <div class="documentos"><img class="icon" src="/PROJETO/imagem/notas.jpg"><a class="documentos" href="documento.php"><li>Documentos</li></a></div>
                    
                        <div class="ocorrencias"><img class="icon" src="/PROJETO/imagem/telefone.png"><a class="ocorrencias" href="ocorrencia.php"><li>Ocorrências</li></a></div>
                    
                        <div class="registro"><img class="icon" src="/PROJETO/imagem/usuario.png"><a class="registro" href="moradores.php"><li>Moradores</li></a></div>
                        
                        <div class="condominiu"><img class="icon" src="/PROJETO/imagem/pessoas.png"><a class="condominiu" href="funcionarios.php"><li>Funcionários</li></a></div>
                </ul>
            </div>
        </div>
        <a class='exibir' href='ocorrencia.php' title='Editar'>VOLTAR</a>
        <form class="conteudo-3" action="ocorrencia.php" method="POST" autocomplete="off">
            <br>
            <h1>Ocorrência</h1>
            <br>
            <div class="formulario">
                <label>Nome do Sujeito</label>
                <input class="titulo" type="text" name="sujeito" value="<?php   echo $sujeito; ?>"/>
                <label>Nº Apartamento / Função funcionário</label>
                <input class="titulo" type="text" name="funcao" value="<?php echo $funcao ?>"/>
                <label>Nome do Solicitante</label>
                <input class="titulo" type="text" name="solicitante" value="<?php echo $solicitante ?>"/>
                <label>Descrição</label>
                <input class="info" type="text" name="descricao" value="<?php echo $descricao ?>"/>
            </div>
        </form>
    </main>
</body>
</html>