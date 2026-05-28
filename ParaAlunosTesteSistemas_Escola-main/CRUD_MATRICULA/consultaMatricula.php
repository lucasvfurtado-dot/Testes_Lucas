<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Matrícula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-danger mt-3">Dados da Matrícula</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10">
                
                <?php
                if(empty($_POST["id"])){
                    echo '<div class="alert alert-warning text-center shadow-sm fw-semibold" role="alert">Atenção: Por favor preencher o campo do ID na tela de busca.</div>';
                } else {
                    $id = $_POST["id"];
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                        exit;
                    }
                    
                    $conexao->set_charset("utf8");

                    $sql = "SELECT id,nivel,turno,serie,cursoExtra FROM matricula WHERE id LIKE '%$id%'";

                    echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';

                    $result = $conexao->query($sql);

                    if($result->num_rows > 0){
                        echo '<div class="table-responsive shadow-sm rounded border border-light bg-white">';
                        echo '<table class="table table-striped table-hover align-middle mb-0">';
                        echo '<thead class="table-dark text-center">';
                        echo '<tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nível</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Série</th>
                                <th scope="col">Curso Extra Curricular</th>
                              </tr>';
                        echo '</thead>';
                        echo '<tbody class="text-center">';

                        while($linha = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td class="fw-bold">' . $linha["id"] . '</td>';
                            echo '<td>' . $linha["nivel"] . '</td>';
                            echo '<td>' . $linha["turno"] . '</td>';
                            echo '<td>' . $linha["serie"] . '</td>';
                            echo '<td>' . $linha["cursoExtra"] . '</td>';
                            echo '</tr>';
                        }
                        
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-warning text-center shadow-sm fw-semibold" role="alert">Sem resultado. Nenhuma matrícula encontrada com esse ID.</div>';
                    }
                    
                    $conexao->close();
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