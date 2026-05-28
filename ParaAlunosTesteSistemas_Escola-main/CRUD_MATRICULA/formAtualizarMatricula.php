<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Matrícula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-success mt-3">Formulário de Alteração de Dados de Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                
                <?php 
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

                        $sql = "SELECT * FROM `matricula` WHERE id ='$ID_post'";
                        echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';
                        
                        $result = $conexao->query($sql);

                        if($result){
                            if($result->num_rows > 0){
                                while($linha = $result->fetch_assoc()){
                                    $ID_banco = $linha["id"];
                                    $nivel = $linha["nivel"];
                                    $turno = $linha["turno"];
                                    $serie = $linha["serie"];
                                    $cursoExtra = $linha["cursoExtra"];
                                } 
                            } else {
                                echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">ID não encontrado no banco de dados.</div>';
                            } 
                        } else {
                            echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Erro na execução da Query: ' . $conexao->error . '</div>';
                        }
                        $conexao->close();
                    }
                }   
                ?>

                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-header bg-warning text-dark text-center py-3">
                        <h4 class="mb-0 fw-bold">Atualizar Dados</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="atualizaMatricula.php">
                            <input type="hidden" name="ID" value="<?=$ID_banco?>">
                            
                            <div class="row g-4 mb-5">
                                
                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Nível</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="nivel" value="Integrado" id="nivelIntegrado" <?php echo($nivel == 'Integrado') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="nivelIntegrado">Integrado</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nivel" value="Sub-Seq" id="nivelSubSeq" <?php echo($nivel == 'Sub-Seq') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="nivelSubSeq">Sub-Seq</label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Turno</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="turno" value="Manha" id="turnoManha" <?php echo($turno == 'Manha') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="turnoManha">Manhã</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="turno" value="Tarde" id="turnoTarde" <?php echo($turno == 'Tarde') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="turnoTarde">Tarde</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="turno" value="Noite" id="turnoNoite" <?php echo($turno == 'Noite') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="turnoNoite">Noite</label>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Série</h5>
                                    <select class="form-select" name="serie">
                                        <option value=""></option>
                                        <option value="1°" <?php echo($serie == '1°') ? "selected" : ""; ?>>1°</option>
                                        <option value="2°" <?php echo($serie == '2°') ? "selected" : ""; ?>>2°</option>
                                        <option value="3°" <?php echo($serie == '3°') ? "selected" : ""; ?>>3°</option>
                                    </select>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <h5 class="fw-bold mb-3 border-bottom pb-2">Cursos Extras</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="cursoExtra" value="Musica" id="cursoMusica" <?php echo($cursoExtra == 'Musica') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="cursoMusica">Música</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="cursoExtra" value="Judo" id="cursoJudo" <?php echo($cursoExtra == 'Judo') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="cursoJudo">Judô</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="cursoExtra" value="Balet" id="cursoBalet" <?php echo($cursoExtra == 'Balet') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="cursoBalet">Ballet</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="cursoExtra" value="Pintura" id="cursoPintura" <?php echo($cursoExtra == 'Pintura') ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="cursoPintura">Pintura</label>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-2">
                                <button type="reset" class="btn btn-outline-secondary px-4">Limpar Dados</button>
                                <button type="submit" class="btn btn-warning px-4 fw-bold text-dark">Atualizar Dados</button>
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
                <button type="submit" class="btn btn-warning text-dark">Atualizar Dados de Matrícula</button>
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