<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Aluno</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Apagar Dados de Aluno</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        
                        <h3 class="text-center mb-4">Apagar Aluno</h3>

                        <form method="POST" action="formApagar.php">
                            <div class="mb-4 text-center">
                                <label for="idBusca" class="form-label fw-semibold">ID do Aluno(a):</label>
                                <input type="text" id="idBusca" class="form-control form-control-lg text-center" name="ID" maxlength="6" placeholder="Digite o ID...">
                            </div>
                            
                            <div class="d-flex justify-content-center gap-3">
                                <button type="reset" class="btn btn-outline-secondary px-4">Limpar Dados</button>
                                <button type="submit" class="btn btn-success px-4">Procurar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <form method="POST" action="listar.php">
                <button type="submit" class="btn btn-primary">Listar Alunos</button>
            </form>
            <form method="POST" action="procurar.php">
                <button type="submit" class="btn btn-info text-white">Consultar Aluno</button>
            </form>
            <form method="POST" action="atualizar.php">
                <button type="submit" class="btn btn-warning text-dark">Atualizar Dados do Aluno</button>
            </form>
            <form method="POST" action="apagar.php">
                <button type="submit" class="btn btn-danger">Excluir Dados do Aluno</button>
            </form>
        </div>

        <nav class="text-center mb-3">
            <a href="index.php" class="text-decoration-none mx-2 fw-semibold">| Home |</a>
            <a href="../CRUD_MATRICULA/formMatricula.php" class="text-decoration-none mx-2 fw-semibold">| Matricula |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>