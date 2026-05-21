<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alunos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-success mt-3">Listagem de Alunos</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-12">
                
                <?php
                $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                
                if($conexao->connect_errno){
                    echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                } else {
                    $conexao->set_charset("utf8");

                    $sql = "SELECT * FROM `aluno`;";
                    
                    // Exibe a Query executada em uma caixa de alerta cinza do Bootstrap
                    echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';
                    
                    $result = $conexao->query($sql);

                    if($result->num_rows > 0){
                        // Criação da Tabela Responsiva do Bootstrap
                        echo '<div class="table-responsive shadow-sm rounded border border-light bg-white">';
                        echo '<table class="table table-striped table-hover align-middle mb-0">';
                        echo '<thead class="table-dark text-center">';
                        echo '<tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data Nasc.</th>
                                <th scope="col">Pai</th>
                                <th scope="col">Mãe</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Bairro</th>
                              </tr>';
                        echo '</thead>';
                        echo '<tbody class="text-center">';
                        
                        // Laço de repetição para preencher as linhas da tabela com os dados do banco
                        while($linha = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td class="fw-bold">' . $linha["id"] . '</td>';
                            echo '<td class="text-start">' . $linha["nome"] . '</td>';
                            echo '<td>' . $linha["dataNascimento"] . '</td>';
                            echo '<td class="text-start">' . $linha["nomePai"] . '</td>';
                            echo '<td class="text-start">' . $linha["nomeMae"] . '</td>';
                            echo '<td>' . $linha["telefone"] . '</td>';
                            echo '<td class="text-start">' . $linha["email"] . '</td>';
                            echo '<td>' . $linha["sexo"] . '</td>';
                            echo '<td>' . $linha["bairro"] . '</td>';
                            echo '</tr>';
                        }
                        
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-warning text-center shadow-sm fw-semibold" role="alert">Sem resultado. Nenhum aluno encontrado no banco de dados.</div>';
                    }

                    $conexao->close();
                }
                ?>

            </div>
        </div>

        <hr class="border-primary border-2 opacity-50 my-5">

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <form method="POST" action="formAluno.php">
                <button type="submit" class="btn btn-success">Registrar Novo Aluno</button>
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
            <a href="formMatricula.php" class="text-decoration-none mx-2 fw-semibold">| Matricula |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>