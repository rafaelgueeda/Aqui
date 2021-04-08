<h2>Login </h2>

<?php
    include('config.php');
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $sql = "select * from usuario where (nome = '{$nome}') and (senha = '{$senha}')";
        
        $sql = $pdo->prepare($sql);

        $sql->execute();
      


        

       
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            echo $info['senha'];
            if(password_verify($senha, password_hash($info['senha'], PASSWORD_DEFAULT))) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $info['id'];
                $_SESSION['nome'] = $info['nome'];
                header("Location: menu.php");
                die();
            }else{
                echo 'Nome ou senha incorretos!';
            }
        }else{
            echo 'Nome não encontrado!';
            
        }
    }
?>
<form method="post">
    <input type="text" name="nome" placeholder="Nome">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="Entrar" name="acao">
</form>