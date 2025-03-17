<div class="video-container">
    <h2>Vídeo</h2>
</div>
<div class="video-container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card" style="width: 15rem;">
                <?php if (!empty($videos)): ?>
                    <?php foreach ($videos as $video): ?>
                        <div class="video-container">
                            <iframe src="<?php echo $video['url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                            <a href="#" class="btn btn-primary">Strem</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum Video encontrado.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>