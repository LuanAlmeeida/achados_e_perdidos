<?php

# Este trecho de código recebe os dados do formulário de inclusão de eventos
# através dos métodos POST e FILE.
#
# Variáveis:
# - $titulo: Título do evento
# - $descricao: Descrição do evento
# - $tipo: Tipo do evento (palestra, minicurso, etc.)
# - $categoria: Categoria do evento
# - $local: Local do evento
# - $quem: Quem está organizando o evento
# - $data: Data do evento
# - $foto: Arquivo de imagem com a foto do evento

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$local = $_POST['local'];
$quem = $_POST['quem'];
$data = $_POST['data'];
$foto = $_FILES['foto'];

# Estabelecendo conexão com o banco de dados:
# - localhost: Endereço do servidor MySQL
# - root: Usuário padrão do MySQL
# - '': Senha do usuário root
# - achados_e_perdidos: Nome do banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'achados_e_perdidos');


# Verificando se a conexão com o banco de dados foi feita com sucesso
if(mysqli_connect_errno()){
	echo "Falha na conexão: " . mysqli_connect_error();
	exit();
}


# Inserindo os dados na tabela achados se o tipo for igual a Achado
if($tipo == 'Achado'){
	$sql = "INSERT INTO achados (titulo, descricao, tipo, categoria, local, quem, data, foto) VALUES ('$titulo', '$descricao', '$tipo', '$categoria', '$local', '$quem', '$data', '$foto[name]')";
	$resultado_da_insercao = mysqli_query($conexao, $sql);
	

# Verificando se o item foi inserido com sucesso
	if($resultado_da_insercao){
		echo "Item cadastrado com sucesso!";
	}else{
		echo "Erro ao cadastrar item.";
	}
}


# Fechando a conexão com o banco de dados
mysqli_close($conexao);


?>
