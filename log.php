<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Waktu</th>
    </tr>
  </thead>
  <tbody>
    <?php
        include('connection.php');
        
        $q = $koneksi->real_escape_string('SELECT * FROM log');
        $q = $koneksi->query($q);
        while($res = $q->fetch_assoc()):
    ?>
    <tr>
        <td><?= $res['username'] ?></td>
        <td><?= $res['waktu'] ?></td>
    </tr>
    <?php 
        endwhile; 
    ?>
  </tbody>
</table>
</body>
</html>