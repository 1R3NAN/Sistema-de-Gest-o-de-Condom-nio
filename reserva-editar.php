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









if(!empty($_GET['reservas_id']))
{
    include_once('config.php');

    $reservas_id =$_GET['reservas_id'];

    $sqlSelect = "SELECT * FROM reservas WHERE reservas_id=$reservas_id";
    $result5 = mysqli_query($conexao, $sqlSelect);

    if($result5->num_rows > 0)
    {
        while ($row = $result5->fetch_assoc()) 
        { 
            $reservas_id  =   $row['reservas_id'];
            $area = $row['area'];
            $residencia = $row['residencia'];
            $solicitante = $row['solicitante'];
            $data = $row['data'];
            $horario = $row['horario'];
            $termino = $row['termino'];
            $aluguel = $row['aluguel'];
            $taxa = $row['taxa'];
        }
    }
    else
    {
        header('Location: ocorrencia.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="reserva-editar.css">
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
        </div>
        <a class='exibir' href='reserva.php' title='Editar'>VOLTAR</a>
        <div class="conteudo-3">
            <br>
            <h1>reserva área</h1>
            <br>
        <form class="formulario" action="reserva.php" method="POST" autocomplete="off">
            <label>Selecione a área</label>
            <select name="area" value="<?php $area ?>">
                <option value="Salão de Festa">Salão de Festa</option>
                <option value="Salão de Jogos">Salão de Jogos</option>
                <option value="Sala de Cinema">Sala de Cinema</option>
                <option value="Piscina">Piscina</option>
            </select>
            <label>Residência</label>
            <input class="titulo" type="number" name="residencia" value="<?php echo $residencia ?>" autocomplete="off" required maxlength="5"/>
            <label>Nome Solicitante</label>
            <input class="titulo" type="text" name="solicitante" value="<?php echo $solicitante ?>" autocomplete="off" required maxlength="30"/>
            <div class="opcoes">
                <div class="data">
                    <label>Data</label>
                    <input type="date" value="<?php echo $data ?>" name="data" id="data">
                </div>
                <div class="hora">
                    <label>Horário</label>
                    <input type="time" value="<?php echo $horario ?>" name="horario" id="hora">
                </div>
                <div class="termino">
                        <label>Término</label>
                        <input type="time" value="<?php echo $termino ?>" name="termino" id="hora">
                </div>
            </div>
            <div class="pagamento">
                <div class="aluguel">
                    <label>Aluguel</label>
                    <input id="aluguel" type="number" value="<?php echo $aluguel ?>" name="aluguel" step="0.01" min="0.01" autocomplete="off" required maxlength="20"/>
                </div>
                <div class="taxa">
                    <label>Taxa</label>
                    <input id="data" type="number" value="<?php echo $taxa ?>" name="taxa" step="0.01" min="0.01"autocomplete="off" required maxlength="20"/>
                </div>
            </div>
        </form>
    </main>
</body>
</html>