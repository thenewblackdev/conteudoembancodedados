<?php
/*
 * @author Luiz Fernando Lidio | The New Black Studio
 * @powered by: http://www.thenewblack.me
 * 
 *            .=     ,        =.
 *   _  _   /'/    )\,/,/(_   \ \
 *    `//-.|  (  ,\\)\//\)\/_  ) |
 *    //___\   `\\\/\\/\/\\///'  /
 * ,-"~`-._ `"--'_   `"""`  _ \`'"~-,_      Múúúúúúúúúúúúúúú!
 * \       `-.  '_`.      .'_` \ ,-"~`/     Hier gibt's nichts zu sehen!!!
 *  `.__.-'`/   (-\        /-) |-.__,'
 *    ||   |     \O)  /^\ (O/  |
 *    `\\  |         /   `\    /
 *      \\  \       /      `\ /
 *       `\\ `-.  /' .---.--.\
 *         `\\/`~(, '()      ('
 *          /(O) \\   _,.-.,_)
 *         //  \\ `\'`      /
 *        / |  ||   `""""~"`
 *      /'  |__||
 *             `o 
 * 
 * 
 */

ini_set('display_errors', true);
error_reporting(E_ALL);

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$path = ltrim($rota['path'], "/");

?>

<?php

require_once "head.php";
require_once "conexaoDB.php";

$conn = conexaoDB();
$sql  = ("SELECT titulo, conteudo FROM projetopdo.paginas WHERE titulo='$path'");
$stmt = $conn->prepare($sql);
$stmt->execute();

$paginas  = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <?php require_once "menu.php"; ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php 

        foreach($paginas as $pagina){
            if (in_array($pagina['titulo'], $pagina)){ ?>
                <h1><?php echo $pagina['titulo']; ?></h1>
                <p><?php echo $pagina['conteudo']; ?></p>
                <?php if ($path == "contato"): ?>
                    <form action="acaoContato.php" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome completo">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="exemplo@exemplo.com.br">
                        </div>
                        <div class="form-group">
                            <label for="assunto">Assunto</label>
                            <input type="text" name="assunto" class="form-control" placeholder="Qual é o motivo do seu contato?">
                        </div>
                        <div class="form-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea name="mensagem" class="form-control" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </form>

                <?php endif ?>
            <?php } else {
                require_once ("404.php");
            }
        }
        ?>
    </div>
</div>

<?php require_once "footer.php"?>