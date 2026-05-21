<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script>
        function fMasc(objeto,mascara){
            obj=objeto;
            masc=mascara;
            setTimeout("fMascEx()",1);
        }

        function fMascEx(){
            obj.value=masc(obj.value);
        }

        function mData(cpf){
            cpf=cpf.replace(/\D/g,"");
            cpf=cpf.replace(/(\d{6})(\d)/,"$1/$2");
            cpf=cpf.replace(/(\d{4})(\d)/,"$1/$2");
            return cpf;
        }

        function mTel(tel){
            tel=tel.replace(/\D/g,"");
            tel=tel.replace(/^(\d)/,"($1");
            tel=tel.replace(/(.{3})(\d)/,"$1)$2");
            if (tel.length == 9) {
                tel=tel.replace(/(.{1})$/,"-$1");
            }else if (tel.length == 10) {
                tel=tel.replace(/(.{2})$/,"-$1");
            }else if (tel.length == 11) {
                tel=tel.replace(/(.{3})$/,"-$1");
            }else if (tel.length >= 12) {
                tel=tel.replace(/(.{4})$/,"-$1");
            }
            return tel;
        }
    </script>
</head>
<body class="bg-light">

    <div class="container py-5">
        
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">U.C Testes de Sistemas - SENAI SC</h1>
            <h2 class="h4 text-success mt-3">Formulário de Alteração de Dados do Aluno</h2>
        </header>

        <hr class="border-primary border-2 opacity-50 mb-4">

        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 col-md-10">
                <?php 
                // Inicializando as variáveis vazias para não dar erro no HTML caso o ID não exista
                $ID = $nome = $dataNasc = $nomePai = $nomeMae = $telefone = $email = $sexo = $bairro = "";

                if(empty($_POST["ID"])){
                    echo '<div class="alert alert-warning text-center shadow-sm fw-semibold" role="alert">Por favor preencher o campo ID na tela anterior.</div>';
                } else {
                    $ID_busca = $_POST["ID"];
                    $conexao = new mysqli("127.0.0.1","root","","sistemaescola");
                    
                    if($conexao->connect_errno){
                        echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Ocorreu um erro na conexão com o banco de dados.</div>';
                    } else {
                        $conexao->set_charset("utf8");

                        $sql = "SELECT * FROM `aluno` WHERE id ='$ID_busca'";
                        
                        // Mostrando a query no estilo de log/aviso
                        echo '<div class="alert alert-secondary text-center font-monospace shadow-sm" role="alert"><strong>Query:</strong> ' . $sql . '</div>';
                        
                        $result = $conexao->query($sql);

                        if($result){
                            if($result->num_rows > 0){
                                while($linha = $result->fetch_assoc()){
                                    $ID = $linha["id"];
                                    $nome = $linha["nome"];
                                    $dataNasc = $linha["dataNascimento"];
                                    $nomePai = $linha["nomePai"];
                                    $nomeMae =  $linha["nomeMae"];
                                    $telefone = $linha["telefone"];
                                    $email = $linha["email"];
                                    $sexo = $linha["sexo"];
                                    $bairro = $linha["bairro"];
                                } 
                            } else {
                                echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">ID não encontrado.</div>';
                            } 
                        } else {
                            echo '<div class="alert alert-danger text-center shadow-sm fw-semibold" role="alert">Erro em: ' . $sql . '<br>' . $conexao->error . '</div>';
                        }
                        $conexao->close();
                    }
                }   
                ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="atualiza.php"> 
                            <input type="hidden" name="ID" value="<?=$ID?>">

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Nome do Aluno(a):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Nome" value="<?=$nome?>">
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Data de Nascimento:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="DataNasc" placeholder="aaaa/mm/dd" maxlength="10" value="<?=$dataNasc?>" onkeydown="javascript:fMasc(this,mData)">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Nome do Pai:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NomePai" value="<?=$nomePai?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Nome da Mãe:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="NomeMae" value="<?=$nomeMae?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Telefone:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Telefone" maxlength="14" value="<?=$telefone?>" onkeydown="javascript:fMasc(this,mTel);">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-semibold">E-Mail:</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="Email" value="<?=$email?>">
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center">
                                <label class="col-sm-4 col-form-label fw-semibold">Sexo:</label>
                                <div class="col-sm-8 d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Sexo" value="Masculino" id="sexoMasculino" <?=($sexo == 'Masculino') ? "checked" : ""?>>
                                        <label class="form-check-label" for="sexoMasculino">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Sexo" value="Feminino" id="sexoFeminino" <?=($sexo == 'Feminino') ? "checked" : ""?>>
                                        <label class="form-check-label" for="sexoFeminino">Feminino</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 row">
                                <label class="col-sm-4 col-form-label fw-semibold">Bairro:</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="Bairro">
                                        <option value=""></option>
                                        <option value="Agua Verde" <?=($bairro == 'Agua Verde') ? "selected" : ""?>>Agua Verde</option>
                                        <option value="Alto da XV" <?=($bairro == 'Alto da XV') ? "selected" : ""?>>Alto da XV</option>
                                        <option value="Batel" <?=($bairro == 'Batel') ? "selected" : ""?>>Batel</option>
                                        <option value="Cajuru" <?=($bairro == 'Cajuru') ? "selected" : ""?>>Cajuru</option>
                                        <option value="Centro Civico" <?=($bairro == 'Centro Civico') ? "selected" : ""?>>Centro Civico</option>
                                        <option value="Ecoville" <?=($bairro == 'Ecoville') ? "selected" : ""?>>Ecoville</option>
                                        <option value="Hauer" <?=($bairro == 'Hauer') ? "selected" : ""?>>Hauer</option>
                                        <option value="Jardim Botanico" <?=($bairro == 'Jardim Botanico') ? "selected" : ""?>>Jardim Botanico</option>
                                        <option value="Jardim das Americas" <?=($bairro == 'Jardim das Americas') ? "selected" : ""?>>Jardim das Americas</option>
                                        <option value="Portão" <?=($bairro == 'Portão') ? "selected" : ""?>>Portão</option>
                                        <option value="Santa Candida" <?=($bairro == 'Santa Candida') ? "selected" : ""?>>Santa Candida</option>
                                        <option value="Sitio Cercado" <?=($bairro == 'Sitio Cercado') ? "selected" : ""?>>Sitio Cercado</option>
                                        <option value="Xaxim" <?=($bairro == 'Xaxim') ? "selected" : ""?>>Xaxim</option>
                                        <option value="Boqueirão" <?=($bairro == 'Boqueirão') ? "selected" : ""?>>Boqueirão</option>
                                        <option value="CIC" <?=($bairro == 'CIC') ? "selected" : ""?>>CIC</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="reset" class="btn btn-outline-secondary px-4">Desfazer Modificações</button>
                                <button type="submit" class="btn btn-success px-4">Atualizar Dados</button>
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
            <a href="formMatricula.php" class="text-decoration-none mx-2 fw-semibold">| Matricula |</a>
        </nav>

        <hr>

        <p class="text-center text-muted fw-semibold">Prof. Sergio Luiz da Silveira</p> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>