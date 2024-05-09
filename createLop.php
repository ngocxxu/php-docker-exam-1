<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them LOP</title>
</head>

<body>
  <h1>Trang them LOP</h1>
  <form method="POST" action="code.php">

    <label for="matr">Ten truong:</label>

    <select name="matr" id="matr">
      <?php
      $query = "SELECT * FROM TRUONG";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $item) {
      ?>
          <option value="<?= $item['MATRUONG']; ?>"><?= $item['TENTRUONG']; ?></option>
      <?php
        }
      }
      ?>
    </select><br />

    <label for="malop">Ma lop:</label>
    <input type="text" id="malop" name="malop" /><br />

    <label for="tenlop">Ten lop:</label>
    <input type="text" id="tenlop" name="tenlop" /><br />

    <button type="submit" name="them_lop">Them</button>
  </form>
</body>

</html>