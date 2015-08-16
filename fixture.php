<?php 

require_once "conexaoDB.php";

echo "#### Executando fixture ####\n\n";
$conn = conexaoDB();
echo "Removendo tabelas";
$conn->query("DROP TABLE IF EXISTS teste;");
echo " - sucesso!\n\n";
echo "Criando tabelas";
$conn->query("CREATE TABLE `projetopdo`.`teste` (
			  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
			  `titulo` VARCHAR(45) NOT NULL COMMENT '',
			  `conteudo` TEXT NULL COMMENT '',
			  PRIMARY KEY (`id`)  COMMENT '');");
echo " - sucesso!\n\n";

echo "->Inserindo dados na tabela<-\n\n";

for($x = 0; $x <= 9; $x++){
	$titulo = "Título {$x}";
	$conteudo = "Conteúdo {$x}";
	$smt = $conn->prepare("INSERT INTO teste (titulo, conteudo) VALUE (:titulo, :conteudo);");
	$smt->bindParam(":titulo", $titulo);
	$smt->bindParam(":conteudo", $conteudo);
	$smt->execute();
}

echo "Dados inseridos com sucesso!\n\n";
echo "#### fixture concluída ####\n";