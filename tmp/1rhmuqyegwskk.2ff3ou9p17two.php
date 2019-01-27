<!DOCTYPE html>
<html>
    <head>
        <title>Administrador de contenidos</title>
    </head>
    <body>
        
        <ul>
        <?php foreach (($cont?:[]) as $item): ?>                                       
            <li><a href="admin/edit/<?= ($item['id_contenido']) ?>"><?= ($item['id_contenido']) ?>: <?= ($item['titulo']) ?></a>  <a href="admin/vista/<?= ($item['id_contenido']) ?>">ver</a></li>                                       
        <?php endforeach; ?>
        </ul>
        
    </body>
</html>