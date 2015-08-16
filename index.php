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
echo $path;

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
        <?php $rotasValidas = array('home', 'empresa', 'produtos', 'servicos', 'contato'); ?>

        <?php 

        foreach($paginas as $pagina){
            if (in_array($pagina['titulo'], $pagina)) { ?>
                <h1><?php echo $pagina['titulo']; ?></h1>
                <p><?php echo $pagina['conteudo']; ?></p>
            <?php } else {
                require_once ("404.php");
            }
        }

        // var_dump($paginas);
        // echo "<br />";
        // var_dump($rotasValidas);
        // echo "<br />";
        // var_dump($pagina)
        ?>
    </div>
</div>

<?php require_once "footer.php"?>