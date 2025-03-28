<div class="container">
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-<?php echo $mensagem['type'] ?> alert-dismissible fade show" role="alert">
            <?php echo $mensagem['message'] ?>
            <button type="button" class="btn-close" 
            data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-4">
            <?php include 'pesquisaUsuario.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                </thead>
                <tbody>
                    <?php
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<td>{$usuario['id']}</td>";
                            echo "<td>{$usuario['nome']}</td>";
                            echo "<td>{$usuario['usuario']}</td>";
                            echo "<td>{$usuario['email']}</td>";
                            echo "<td>{$usuario['senha']}</td>";
                            echo "<td>";
                            echo "<a href='/usuario/cadastrar/{$usuario['id']}' class='btn btn-primary'>Editar</a> ";
                            echo "<button onclick='excluirUsuario({$usuario['id']})' class='btn btn-danger'>Excluir</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum Usuario encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div><a href='/usuario/cadastrar' class='btn btn-primary'>Cadastrar</a></div>
        </div>
    </div>
</div>

<script>
    function excluirUsuario(id) {
        if (confirm('Deseja realmente excluir este cadastro?')) {
            window.location.href = '/usuario/excluir/' + id;
        }
    }
</script>