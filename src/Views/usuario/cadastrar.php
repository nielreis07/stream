<div class="container">
    <h2>Cadastrar Usuário<?php echo $dados['id'] ?? '' ?></h2>
</div>
<div class="container">
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-<?php echo $mensagem['type'] ?> alert-dismissible fade show" role="alert">
            <?php echo $mensagem['message'] ?>
            <button type="button" class="btn-close"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="/usuario" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <form action="/usuario/salvar" method="post" id="formCadastrarUsuario">
                    <input type="hidden" name="id" value="<?php echo $dados['id'] ?? '' ?>">
                    <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome</label>
                        <input name="nome" type="text" value="<?php echo $dados['nome'] ?? '' ?>"
                            class="form-control" id="InputNome" aria-describedby="nomeHelp">
                        <div id="nomeHelp" class="form-text">Digite seu Nome.</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputUsername" class="form-label">Username</label>
                        <input name="usuario" type="text" value="<?php echo $dados['usuario'] ?? '' ?>"
                            class="form-control" id="InputUsername" aria-describedby="usernameHelp">
                        <div id="emailHelp" class="form-text">Digite o Username</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">E-mail</label>
                        <input name="email" type="text" value="<?php echo $dados['email'] ?? '' ?>"
                            class="form-control" id="InputEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Digite o E-mail.</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputSenha" class="form-label">Senha</label>
                        <input name="senha" type="password" value="<?php echo $dados['senha'] ?? '' ?>"
                            class="form-control" id="InputSenha" aria-describedby="senhaHelp">
                        <div id="senhaHelp" class="form-text">Digite uma senha segura.</div>
                    </div>
            </div>
        </div>
        <div class="mb-3">
        <button type="button" class="btn btn-secondary" onclick="limparFormulario()">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="salvarUsuario()">Enviar</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>

<script>
    function limparFormulario() {
        if (confirm("Tem certeza que deseja cancelar e limpar os campos?")) {
            const form = document.getElementById("formCadastrarUsuario");
            form.reset();
            document.getElementById("InputNome").value = "";
            document.getElementById("InputUsername").value = "";
            document.getElementById("InputEmail").value = "";
            document.getElementById("InputSenha").value = "";
        }
    }

    function salvarUsuario() {
        event.preventDefault();
        const msgErrors = [];

        const inputNome = document.getElementById("InputNome").value;
        const InputUsername = document.getElementById("InputUsername").value;
        const inputEmail = document.getElementById("InputEmail").value;
        const InputSenha = document.getElementById("InputSenha").value;

        if (inputNome === "") msgErrors.push("Este campo é obrigatório.");
        if (InputUsername === "") msgErrors.push("Este campo é obrigatório.");
        if (inputEmail === "") msgErrors.push("Este campo é obrigatório..");
        if (InputSenha === "") msgErrors.push("Este campo é obrigatório.");

        if (msgErrors.length > 0) {
            alert(msgErrors.join("\n"));
            return;
        }

        const form = document.getElementById("formCadastrarUsuario");
        form.submit();
    }
</script>