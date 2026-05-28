<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Exclusão</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Exclusão de Cadastro de Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8">

                <?php
                if (isset($_POST["ID"])){
                    
                    $ID = $_POST["ID"];
                    
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                        exit;
                    }

                    $conexao->set_charset("utf8");

                    // Query de exclusão
                    $sql = "DELETE FROM `matricula` WHERE id='$ID';";
                    
                    // Exibe a Query executada
                    echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';

                    // Executa e verifica sucesso ou erro
                    if($conexao->query($sql) === TRUE){
                        $sucesso = "Matrícula deletada com sucesso!";
                    } else {
                        $erro = "Erro ao deletar: " . $conexao->error;
                    }
                    
                    $conexao->close();
                    
                } else {
                    $erro = "Atenção: O campo obrigatório ID não foi recebido.";
                }

                // Exibição dos Alertas do Bootstrap baseados no resultado do PHP
                if(isset($erro)) {
                    echo '<div class="alert alert-danger text-center shadow-sm fw-bold" role="alert">'.$erro.'</div>';
                }

                if(isset($sucesso)) {
                    echo '<div class="alert alert-success text-center shadow-sm fw-bold" role="alert">'.$sucesso.'</div>';
                }
                ?>

            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <form method="POST" action="formMatricula.php">
                <button type="submit" class="btn btn-success">Registrar Nova Matrícula</button>
            </form>
            <form method="POST" action="listarMatricula.php">
                <button type="submit" class="btn btn-primary">Listar Matrículas</button>
            </form>
            <form method="POST" action="procurarMatricula.php">
                <button type="submit" class="btn btn-info text-white">Consultar Matrícula</button>
            </form>
            <form method="POST" action="atualizarMatricula.php">
                <button type="submit" class="btn btn-warning text-dark">Atualizar Dados de Matrícula</button>
            </form>
        </div>

        <nav class="text-center mb-3">
            <a href="../CRUD_ALUNO/index.php" class="text-decoration-none mx-2 fw-semibold">| Home |</a>
            <a href="formMatricula.php" class="text-decoration-none mx-2 fw-semibold">| Matrícula |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>