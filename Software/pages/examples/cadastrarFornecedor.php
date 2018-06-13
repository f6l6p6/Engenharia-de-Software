<?php
//porta, usuário, senha, nome data base
//caso não consiga conectar mostra a mensagem de erro mostrada na conexão
	$conexao = mysqli_connect("localhost", "root", "1234", "clientebd");
	$mysqli_set_charset($conexao, "utf8");
	if($conexao->connect_error){
		die("Falha ao conectar");
	} else{
//Abaixo atribuímos os valores provenientes do formulário pelo método POST
  $nome = $_POST['nome'];
  $razao = $_POST['razao'];
  $cnpj = $_POST['cnpj'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $tel = $_POST['tel']; 
  $email = $_POST['email'];
  $obs = $_POST['obs'];

   $string_sql = "INSERT INTO fornecedorbd (id, nome, razao, cnpj, endereco, cidade, estado, cep, tel, email, obs) VALUES (NULL, '$nome', '$nrazao', '$cnpj', '$endereco', '$cidade', '$estado', '$cep', '$tel', '$email', '$obs')";
   $insert_member_res = mysqli_query($conexao, $string_sql);
   if(mysqli_affected_rows($conexao)>0){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
       echo "<p>Registrado</p>";
       echo '<a href="cadastroFornecedor.html">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
   } else {
       echo "Erro, não foi possível inserir no banco de dados";
   }
   mysqli_close($conexao); //fecha conexão com banco de dados
}

?>