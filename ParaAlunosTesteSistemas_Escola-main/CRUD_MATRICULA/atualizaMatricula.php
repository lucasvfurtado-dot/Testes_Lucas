<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Atualização</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Alteração de Dados do Cadastro de Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8">

                <?php

                if (isset($_POST["ID"]) && isset($_POST["nivel"]) && isset($_POST["turno"]) && isset($_POST["serie"]) && isset($_POST["cursoExtra"])) {
                    
                    $ID = $_POST["ID"];
                    $nivel = $_POST["nivel"];
                    $turno = $_POST["turno"];
                    $serie = $_POST["serie"];
                    $cursoExtra = $_POST["cursoExtra"];

                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                        exit;
                    }
                    
                    $conexao->set_charset("utf8");


                    $sql = "UPDATE `matricula` SET id = $ID, nivel = '$nivel', turno = '$turno', serie = '$serie', cursoExtra = '$cursoExtra' WHERE id='$ID';";


                    echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';
                    

                    if($conexao->query($sql) === TRUE){
                        $sucesso = "Dados da matrícula alterados com sucesso!";
                    } else {
                        $erro = "Erro ao alterar: " . $conexao->error;
                    }
                    
                    $conexao->close();
                    
                } else {
                    $erro = "Atenção: Algum campo obrigatório não foi preenchido.";
                }
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
            <form method="POST" action="apagarMatricula.php">
                <button type="submit" class="btn btn-danger">Excluir Dados de Matrícula</button>
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