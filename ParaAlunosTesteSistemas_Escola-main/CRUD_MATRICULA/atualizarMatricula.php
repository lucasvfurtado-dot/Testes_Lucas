<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Matrícula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Alteração de Dados de Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        
                        <h3 class="h4 text-center mb-4 fw-semibold text-secondary">Procurar Matrícula para Alteração</h3>

                        <form method="POST" action="formAtualizarMatricula.php">
                            <div class="mb-4">
                                <label for="idBusca" class="form-label fw-bold">ID da Matrícula:</label>
                                <input type="text" class="form-control form-control-lg" name="ID" id="idBusca" placeholder="Digite o ID que deseja alterar..." required>
                            </div>
                            
                            <div class="d-flex justify-content-center gap-3">
                                <button type="reset" class="btn btn-outline-secondary px-4">Limpar Dados</button>
                                <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm text-dark">Procurar</button>
                            </div>
                        </form>

                    </div>
                </div>
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