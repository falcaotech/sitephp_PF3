<div class="span10 conteudo">
    <h1><?php echo $pagina['nome']; ?></h1>
    <hr>
    <p><?php echo $pagina['conteudo']; ?></p>
    
    <!--Caso a página carregada seja a CONTATO, será exibido o formulário-->
    <?php if ($uri == 'contato') { ?>
    <!--exibe o formulário-->
    <form action="contato_retorno" method="post" >
        <fieldset>
            <legend>Entre em contato conosco</legend>
            <label>Nome: <input type="text" name="nome"></label>
            <label>E-mail: <input type="text" name="email"></label>
            <label>Assunto: <input type="text" name="assunto"></label>
            <label>Mensagem: <textarea type="text" name="mensagem"></textarea></label>
            <input type="submit" name="submit" value="Enviar">
        </fieldset>
    </form>
    <?php } ?>
    
    
    <!--Ao carregar a página de RETORNO, será exibido os dados digitados-->
    <?php if ($uri == 'contato_retorno') { ?>
    <!--exibe o formulário-->
    <div class="span10 conteudo">
        <h1>Dados foram enviados com sucesso.</h1>
        <h2>Seguem abaixo os dados que voce enviou:</h2>
        <p>Nome: <?=$_POST["nome"]; ?></p>
        <p>E-mail: <?=$_POST["email"]; ?></p>
        <p>Assunto: <?=$_POST["assunto"]; ?></p>
        <p>Mensagem: <?=$_POST["mensagem"]; ?></p>
    </div>

    <?php } ?>
</div>
