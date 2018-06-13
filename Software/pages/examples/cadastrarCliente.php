<?php
//porta, usuário, senha, nome data base
//caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	$conexao = mysqli_connect("localhost", "root", "1234", "clientebd");
	$mysqli_set_charset($conexao, "utf8");
	if($conexao->connect_error){
		die("Falha ao conectar");
	} else{
//Abaixo atribuímos os valores provenientes do formulário pelo método POST
  $nome = $_POST['Nome']; 
  $nasc = $_POST['DataNasc']; 
  $tel = $_POST['Telefone']; 
  $email = $_POST['Email'];

   $string_sql = "INSERT INTO clientebd (nome, nasc, tel, email) VALUES ('$nome', 'nasc', '$tel','$email')";
   $insert_member_res = mysqli_query($conexao, $string_sql);
   if(mysqli_affected_rows($conexao)>0){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
       echo "<p>Registrado</p>";
       echo '<a href="cadastroCliente.html">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
   } else {
       echo "Erro, não foi possível inserir no banco de dados";
   }
   mysqli_close($conexao); //fecha conexão com banco de dados
}

?>
