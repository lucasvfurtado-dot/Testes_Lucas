<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Matrícula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Apagar a Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">

                <?php 
                $id_encontrado = false;
                $ID_banco = ""; $nivel = ""; $turno = ""; $serie = ""; $cursoExtra = "";

                if(empty($_POST["ID"])){
                    echo '<div class="alert alert-warning text-center shadow-sm fw-semibold" role="alert">Por favor, preencha o campo ID na tela de busca.</div>';
                } else {
                    $ID_post = $_POST["ID"];
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                    } else {
                        $conexao->set_charset("utf8");

                        $sql = "SELECT * FROM matricula WHERE id='$ID_post'";
                        echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';

                        $result = $conexao->query($sql);

                        if($result){
                            if($result->num_rows > 0){
                                $id_encontrado = true; 
                                while($linha = $result->fetch_assoc()){
                                    $ID_banco = $linha["id"];
                                    $nivel = $linha["nivel"];
                                    $turno = $linha["turno"];
                                    $serie = $linha["serie"];
                                    $cursoExtra = $linha["cursoExtra"];
                                } 
                            } else {
                                echo '<div class="alert alert-danger text-center shadow-sm fw-bold" role="alert">ID não encontrado no banco de dados.</div>';
                            } 
                        } else {
                            echo '<div class="alert alert-danger text-center shadow-sm fw-bold" role="alert">Erro na execução da Query: ' . $conexao->error . '</div>';
                        }
                        $conexao->close();
                    }
                } 
                ?>

                <?php if ($id_encontrado): ?>
                <div class="card shadow border-0 border-danger border-top border-4 mt-4">
                    <div class="card-header bg-white text-center pt-4 pb-2 border-0">
                        <h4 class="mb-0 fw-bold text-danger">Confirmação de Exclusão</h4>
                        <p class="text-muted mt-2">Verifique os dados abaixo antes de prosseguir.</p>
                    </div>
                    <div class="card-body p-4 p-md-5 pt-0">

                        <form method="POST" action="apagaMatricula.php">
                            <input type="hidden" name="ID" value="<?=$ID_banco?>">
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-secondary">ID da Matrícula:</label>
                                    <input type="text" class="form-control bg-light" value="<?=$ID_banco?>" disabled>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-bold text-secondary">Nível da Matrícula:</label>
                                    <input type="text" class="form-control bg-light" value="<?=$nivel?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-secondary">Turno:</label>
                                    <input type="text" class="form-control bg-light" value="<?=$turno?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-secondary">Série:</label>
                                    <input type="text" class="form-control bg-light" value="<?=$serie?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-secondary">Curso Extra:</label>
                                    <input type="text" class="form-control bg-light" value="<?=$cursoExtra?>" disabled>
                                </div>
                            </div>
                            
                            <div class="text-center mt-5">
                                <h5 class="fw-bold text-danger mb-4">Tem certeza que deseja deletar esta Matrícula? Essa ação não pode ser desfeita.</h5>
                                <button type="submit" class="btn btn-danger btn-lg px-5 fw-bold shadow-sm">DELETAR MATRÍCULA</button>
                            </div>
                        </form>

                    </div>
                </div>
                <?php endif; ?>

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
            <form method="POST" action="atualizarMatricula.php">
                <button type="submit" class="btn btn-warning text-dark">Atualizar Dados de Matrícula</button>
            </form>
            <form method="POST" action="procurarMatricula.php">
                <button type="submit" class="btn btn-info text-white">Consultar Matrícula</button>
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