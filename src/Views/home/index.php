<div class="container m-5">
    <div class="row">
        <?php foreach ($videos as $indice => $valor) : ?>
            <div class="col-md-4 mb-4"> 
                <div class="card" style="width: 100%;">
                    <iframe class="card-img-top" width="100%" height="200"
                        src="<?= $valor['url'] ?>" 
                        title="<?= $valor['titulo'] ?>" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title"><?= $valor['titulo'] ?></h5>
                        <p class="card-text"><?= $valor['descricao'] ?></p>
                        <a href="<?= $valor['url'] ?>" target="_blank" class="btn btn-primary">Assistir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-4">
        <a href="/video/cadastrar" class="btn btn-primary">Cadastrar</a>
    </div>
</div>
