<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Excluir fornecedor</title>
  </head>
  <body>
    <main class="container mt-5">
        <h3>Excluir fornecedor</h3>
    
        <form action="/fornecedor/deletar" method="POST">
            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <input type="hidden" name="id" value="<?= $resultado["id"]; ?>">

                    <label for="razao_social" class="form-label">Razao Social</label>
                    <input type="text" class="form-control" maxlength="60" name="razao_social" placeholder="Razão Social" disabled value="<?= $resultado["razao_social"];  ?>">

                    <label for="valor" class="form-label">CNPJ</label>
                    <input type="text" disabled class="form-control" maxlength="60" name="cnpj" placeholder="cnpj" value="<?= $resultado["cnpj"];  ?>">

                    <label for="Telefone" class="form-label">Telefone</label>
                    <input type="text" disabled class="form-control" maxlength="60" name="telefone" placeholder="Telefone" value="<?= $resultado["telefone"];  ?>">

                    <label for="Email" class="form-label">Email</label>
                    <input type="text" disabled class="form-control" maxlength="60" name="email" placeholder="Email" value="<?= $resultado["email"];  ?>">

                </div>
            </div>
            <p>Você deseja realmente excluir esse registro?</p>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    </main>
  </body>
</html>