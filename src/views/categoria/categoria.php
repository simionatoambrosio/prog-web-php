<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Categorias</title>
  </head>
  <body>
    <main class="container mt-5">

        <div class="alert alert-success alert-dismissible fade show" <?= $inserir_sucesso ?> role="alert">
            Registro inserido com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show" <?= $inserir_erro ?> role="alert">
            Erro ao inserir o registro!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        <div class="row d-flex justify-content-between">
            <h3>Categorias</h3>
            <a href="/categoria/inserir" class="btn btn-primary"> <i class="fas fa-plus"></i> Nova categoria</a>
        </div>

        <table class="table table-stripped table-hover mt-5">
            <thead>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php while($c = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?= $c['descricao'] ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning">Alterar</a>
                            <a href="" class="btn btn-sm btn-danger">Alterar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </main>
  </body>
</html>