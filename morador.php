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




if(!empty($_GET['id_morador']))
{
    include_once('config.php');

    $id_morador =$_GET['id_morador'];

    $sql7 = "SELECT * FROM pessoas WHERE id_morador=$id_morador";
    $result7 = mysqli_query($conexao, $sql7);

    if($result7->num_rows > 0)
    {
        while ($row = $result7->fetch_assoc()) { 
            
            $id_morador = $row['id_morador'];
            $nome = $row['nome'];
            $apartamento = $row['apartamento'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $cpf = $row['cpf'];
            $rg = $row['rg'];
            $data = $row['data'];
        }
    }
    else
    {
        header('Location: moradores.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="morador.css">
</head>
<body>
    <main>
        <div class="menu">
            <img class= "logo" src="./imagem/logo nova.png" height="65px" width="170px">
            <style>.logo{margin: 10px;margin-top: 20px;}</style>
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
        <a class='exibir' href='moradores.php' title='Editar'>VOLTAR</a>
        <form action="morador.php" method="POST" method="POST" autocomplete="off" class="cadastramento">
            <div class="título">
                <h1>Morador</h1>
            </div>
            <div class="cadastro">
                <div class="registro1">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" value="<?php echo $nome ?>" autocomplete="off" required maxlength="30"/>
                    <label>Blocos/Apartamentos</label>
                    <input type="text" name="apartamento" value="<?php echo $apartamento ?>" autocomplete="off" required maxlength="4"/>
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?php echo $telefone ?>" autocomplete="off" required maxlength="14"/>
                    <label>E-mail</label>
                    <input type="text" name="email" value="<?php echo $email ?>" autocomplete="off" required maxlength="30"/>
                    <label>CPF</label>
                    <input type="text" name="cpf" value="<?php echo $cpf ?>" autocomplete="off" required maxlength="11"/>
                    <label>RG</label>
                    <input type="text" name="rg" value="<?php echo $rg ?>" autocomplete="off" required maxlength="9"/>
                    <label>Data nascimento</label>
                    <input type="date" value="<?php echo $data ?>" name="data" id="data">
                </div>  
            </div>
        </form>
    </main>
</body>
</html>