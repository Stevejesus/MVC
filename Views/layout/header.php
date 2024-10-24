<!DOCTYPE html>
<html lang="en">
<head>
  <title>Boostrap 5 Website Example</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>

  <script>
    $(document).ready(function() {
        $('#taula').DataTable();
    } );
  </script>
  
  
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
  
</body> 
  <div class="p-5 bg-primary text-white text-center">
    <h1>MVC Llibreria</h1>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="/php/MVC/index.php?controller=llibre&method=hola">Llibres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

      </ul>
    </div>
  </nav>
</body>

</html>



