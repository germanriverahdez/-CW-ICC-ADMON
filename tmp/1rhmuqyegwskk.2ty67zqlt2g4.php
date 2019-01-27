<body>
<h1>Titulo: <?= ($ec['titulo']) ?></h1>
<h1>Url: <?= ($tu['url']) ?></h1>
<form name="contenido" method="post" action="<?= ($BASE) ?><?= ($PARAMS[0]) ?>" >
  <label for='md'>Contenido: </label><br /><textarea name="md" id="md" cols="120" rows="20"><?= (isset($POST['md'])?htmlspecialchars($POST['md']):'') ?></textarea><br />
  <input type="submit" value="Enviar"/>
</form>
</body>