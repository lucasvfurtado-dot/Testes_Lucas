<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza Dados</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Alteração de Dados do Cadastro</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 col-md-10">
                
                <?php
                if (isset($_POST["ID"]) && isset($_POST["Nome"]) && isset($_POST["DataNasc"]) && isset($_POST["NomePai"]) && isset($_POST["NomeMae"]) && isset($_POST["Telefone"]) && isset($_POST["Email"]) && isset($_POST["Sexo"]) && $_POST["Bairro"] != ''){
                    
                    $ID = $_POST["ID"];
                    $nome = $_POST["Nome"];
                    $datanasc = $_POST["DataNasc"];
                    $nomepai = $_POST["NomePai"];
                    $nomemae = $_POST["NomeMae"];
                    $telefone = $_POST["Telefone"];
                    $email = $_POST["Email"];
                    $sexo = $_POST["Sexo"];
                    $bairro = $_POST["Bairro"];

                    if(strlen($datanasc) < 10){
                        $erro = "Por favor, inserir uma data válida.";
                    } else {
                        if(strlen($telefone) < 13){
                            $erro = "Por favor, inserir um telefone válido.";
                        } else {
                            $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                            
                            if($conexao->connect_errno){
                                $erro = "Ocorreu um erro na conexão com o banco de dados.";
                            } else {
                                $conexao->set_charset("utf8");

                                $sql = "UPDATE `aluno` SET id = $ID, nome = '$nome', dataNascimento = '$datanasc', nomePai = '$nomepai', nomeMae = '$nomemae', telefone = '$telefone', email = '$email', sexo = '$sexo', bairro = '$bairro' WHERE id='$ID';";

                                echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';
                                
                                if($conexao->query($sql) === TRUE){
                                    $sucesso = "Dados alterados com sucesso!";
                                } else {
                                    $erro = "Erro: " . $sql . "<br>" . $conexao->error;
                                }
                                $conexao->close();
                            }
                        }
                    }
                } else {
                    $erro = "Campo obrigatório não preenchido.";
                }

                
                if(isset($erro)) {
                    echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">' . $erro . '</div>';
                }

                if(isset($sucesso)) {
                    echo '<div class="alert alert-success text-center shadow-sm fw-semibold" role="alert">' . $sucesso . '</div>';
                }
                ?>

            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <form method="POST" action="formAluno.php">
                <button type="submit" class="btn btn-success">Registrar Novo Aluno</button>
            </form>
            <form method="POST" action="listar.php">
                <button type="submit" class="btn btn-primary">Listar Alunos</button>
            </form>
            <form method="POST" action="procurar.php">
                <button type="submit" class="btn btn-info text-white">Consultar Aluno</button>
            </form>
            <form method="POST" action="apagar.php">
                <button type="submit" class="btn btn-danger">Excluir Dados do Aluno</button>
            </form>
        </div>

        <nav class="text-center mb-3">
            <a href="index.php" class="text-decoration-none mx-2 fw-semibold">| Home |</a>
            <a href="formMatricula.php" class="text-decoration-none mx-2 fw-semibold">| Matricula |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>