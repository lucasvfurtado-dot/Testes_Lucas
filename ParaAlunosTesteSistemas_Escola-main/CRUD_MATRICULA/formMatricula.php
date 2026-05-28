<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Matrícula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Formulário de Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Dados da Matrícula</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="cadastroMatricula.php">
                            
                            <div class="row g-4 mb-5">
                                
                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Nível</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="nivel" value="Integrado" id="nivelIntegrado">
                                        <label class="form-check-label" for="nivelIntegrado">Integrado</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel" value="Sub-Seq" id="nivelSubSeq">
                                        <label class="form-check-label" for="nivelSubSeq">Sub-Seq</label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Turno</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="turno" value="Manha" id="turnoManha">
                                        <label class="form-check-label" for="turnoManha">Manhã</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="turno" value="Tarde" id="turnoTarde">
                                        <label class="form-check-label" for="turnoTarde">Tarde</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="turno" value="Noite" id="turnoNoite">
                                        <label class="form-check-label" for="turnoNoite">Noite</label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Série</h5>
                                    <select class="form-select" name="serie">
                                        <option value="" selected>Selecione...</option>
                                        <option value="1°">1°</option>
                                        <option value="2°">2°</option>
                                        <option value="3°">3°</option>
                                    </select>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Cursos Extras</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="extraCurso" value="Musica" id="cursoMusica">
                                        <label class="form-check-label" for="cursoMusica">Música</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="extraCurso" value="Judo" id="cursoJudo">
                                        <label class="form-check-label" for="cursoJudo">Judô</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="extraCurso" value="Balet" id="cursoBalet">
                                        <label class="form-check-label" for="cursoBalet">Ballet</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="extraCurso" value="Pintura" id="cursoPintura">
                                        <label class="form-check-label" for="cursoPintura">Pintura</label>
                                    </div>
                                    <small class="text-muted fst-italic">* Escolha apenas uma opção</small>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-2">
                                <button type="reset" class="btn btn-outline-secondary px-4">Limpar Dados</button>
                                <button type="submit" class="btn btn-primary px-4 fw-bold">Cadastrar Matrícula</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <form method="POST" action="listarMatricula.php">
                <button type="submit" class="btn btn-primary">Listar Matrículas</button>
            </form>
            <form method="POST" action="procurarMatricula.php">
                <button type="submit" class="btn btn-info text-white">Consultar Matrícula</button>
            </form>
            <form method="POST" action="atualizarMatricula.php">
                <button type="submit" class="btn btn-warning text-dark">Atualizar Dados da Matrícula</button>
            </form>
            <form method="POST" action="apagarMatricula.php">
                <button type="submit" class="btn btn-danger">Excluir Dados da Matrícula</button>
            </form>
        </div>

        <nav class="text-center mb-3">
            <a href="../CRUD_ALUNO/index.php" class="text-decoration-none mx-2 fw-semibold">| Home |</a>
            <a href="../CRUD_ALUNO/formAluno.php" class="text-decoration-none mx-2 fw-semibold">| Aluno |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>