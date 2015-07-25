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
?>

<?php require_once "head.php"; ?>

    <div class="container">
        <div class="row">
            <?php require_once "menu.php"; ?>
        </div>
    </div>

<?php if (!empty($_POST))  : ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-success" role="alert">
                Dados enviados com sucesso, abaixo seguem os dados que você enviou:
            </div>
            <?php if(!empty($_POST["nome"])) : ?>
                <b>Nome:</b> <?php echo $_POST["nome"]; ?> <br/>
            <?php endif; ?>
            <?php if(!empty($_POST["email"])) : ?>
                <b>Email:</b> <?php echo $_POST["email"]; ?> <br/>
            <?php endif; ?>
            <?php if(!empty($_POST["assunto"])) : ?>
                <b>Assunto:</b> <?php echo $_POST["assunto"]; ?> <br/>
            <?php endif; ?>
            <?php if(!empty($_POST["mensagem"])) : ?>
                <b>Mensagem:</b><br/> <?php echo $_POST["mensagem"]; ?> <br/>
            <?php endif; ?>
        </div>
    </div>

<?php else : ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-danger" role="alert">
                Você não preencheu o formulário corretamente.
            </div>
            <nav>
                <ul class="pager">
                    <li class="previous"><a href="/?arquivo=contato.php"><span aria-hidden="true">&larr;</span> Voltar para formulário</a></li>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>

<?php require_once "footer.php"?>