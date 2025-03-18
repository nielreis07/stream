<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <div class="container m-5">
        <div class="row">
            <div class="col-12">
                <?php foreach ($videos as $indice => $valor) : ?>
                    <div class="card" style="width: 18rem;">
                        <iframe class="card-img-top" width="500" 
                            src="<?php echo $valor['url'] ?>" 
                            title="<?php echo $valor['titulo'] ?>"></iframe>
                        <div class="card-body">
                            <h5 class="card-title
                            "><?= $valor['titulo'] ?></h5>
                            <p class="card-text"><?= $valor['descricao'] ?></p>
                            <a href="<?php echo $valor['url'] ?>" target="_blank" class="btn btn-primary">Assistir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
</head>
<body>
    
</body>
</html>