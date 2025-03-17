<div class="container">
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-<?php echo $mensagem['type'] ?> alert-dismissible fade show" role="alert">
            <?php echo $mensagem['message'] ?>
            <button type="button" class="btn-close" 
            data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Url</th>
                    <th>Título</th>
                </thead>
                <tbody>
                    <?php if (!empty($videos)): ?>
                        <?php foreach ($videos as $video): ?>
                            <tr>
                                <td>
                                    <iframe width="500" 
                                        src="<?php echo $video['url'] ?>" 
                                        title="<?php echo $video['titulo'] ?>"></iframe>
                                </td>
                                <td><?php echo $video['titulo'] ?></td>
                                <td>
                                    <a href="/video/editar/<?php echo $video['id']; ?>" class="btn btn-primary">Editar</a>
                                    <button onclick="excluirVideo(<?php echo $video['id']; ?>)" class="btn btn-danger">Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan='5'>Nenhum Vídeo encontrado.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div><a href='/video/cadastrar' class='btn btn-primary'>Cadastrar</a></div>
        </div>
    </div>
</div>

<script>
    function excluirVideo(id) {
        if (confirm('Deseja realmente excluir este video?')) {
            window.location.href = '/video/excluir/' + id;
        }
    }
</script>