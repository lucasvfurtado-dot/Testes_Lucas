<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Menu Principal</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark mb-2">U.C Testes de Sistemas</h1>
            <h2 class="h3 text-secondary">SENAI SC</h2>
            <h3 class="h5 text-primary mt-4">Menu Principal do Sistema</h3>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5 text-center">
                        
                        <h4 class="mb-4 text-muted fw-semibold">Selecione o módulo desejado:</h4>
                        
                        <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                            <form method="POST" action="formAluno.php" class="w-100">
                                <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm py-3 fw-bold">
                                    Cadastrar <br>Aluno    
                                </button>
                            </form>
                            
                            <form method="POST" action="../CRUD_MATRICULA/formMatricula.php" class="w-100">
                                <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm py-3 fw-bold">
                                    Cadastrar Matrícula
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <footer class="text-center">
            <p class="text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>