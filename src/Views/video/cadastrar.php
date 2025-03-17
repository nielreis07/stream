<div class="container mt-5">
    <h3 class="mb-4">Cadastrar Vídeo</h3>
    <div class="row">
        <div class="col">
            <form id="formCadastrarVideo" action="<?php echo $action; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $video['id'] ?? ''; ?>">
                <div class="card p-3">
                    <div class="mb-3">
                        <label for="InputTitulo" class="form-label">Título</label>
                        <input name="titulo" type="text" value="<?php echo $video['titulo'] ?? ''; ?>"
                            class="form-control" id="InputTitulo" 
                            placeholder="Digite o título do vídeo" required>
                        <div id="tituloHelp" class="form-text">Digite o título do vídeo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputDescricao" class="form-label">Descrição</label>
                        <input type="text" name="descricao" value="<?php echo $video['descricao'] ?? ''; ?>"
                        class="form-control" id="InputDescricao" placeholder="Insira a descrição do vídeo" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputUrl" class="form-label">URL do Vídeo</label>
                        <input type="text" name="url" value="<?php echo $video['url'] ?? ''; ?>"
                        class="form-control" id="InputUrl" placeholder="Insira a URL do vídeo" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="limparFormulario()">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="salvarVideo()">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function limparFormulario() {
        if (confirm("Tem certeza que deseja cancelar e limpar os campos?")) {
            const form = document.getElementById("formCadastrarVideo");
            form.reset();
        }
    }

    function salvarVideo(event) {
        event.preventDefault(); 
        const msgErrors = [];

        const inputUrl = document.getElementById("InputUrl").value;
        const inputTitulo = document.getElementById("InputTitulo").value;

        if (inputUrl === "") msgErrors.push("A URL do vídeo é obrigatória.");
        if (inputTitulo === "") msgErrors.push("O título do vídeo é obrigatório.");

        if (msgErrors.length > 0) {
            alert(msgErrors.join("\n"));
            return;
        }

        const form = document.getElementById("formCadastrarVideo");
        form.submit();
    }
</script>
