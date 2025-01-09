<?php

use App\Controllers\FormController;

require_once 'db/Database.php';
require_once 'controllers/FormController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['submit'])) {
  $formController = new FormController();
  $result = $formController->save([
    'nombre' => $_POST['nombre'],
    'correo' => $_POST['correo'],
    'telefono' => $_POST['telefono']
  ]);
  $mensaje = $result ? "Datos guardados correctamente." : "Hubo un error al guardar los datos.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario con Acceso a BD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mb-4 text-center">Formulario con Acceso a BD</h1>
    <?php if (isset($mensaje)) : ?>
      <div class="alert <?= $result ? 'alert-success' : 'alert-danger' ?>" role="alert">
        <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $controller = new FormController();
                  $result = $controller->getAll();
                  if ($result) {
                    foreach ($result as $row) : ?>
                      <tr>
                        <td><?= htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($row['correo'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($row['telefono'], ENT_QUOTES, 'UTF-8') ?></td>
                      </tr>
                  <?php endforeach;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono">
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>