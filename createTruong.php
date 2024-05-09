<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them truong</title>
</head>

<body>
  <h1>Trang them truong</h1>
  <form method="POST" action="code.php">
    <label for="matr">Ma truong:</label>
    <input type="text" id="matr" name="matr" /><br />

    <label for="tentr">Ten truong:</label>
    <input type="text" id="tentr" name="tentr" /><br />

    <label for="diachi">Dia chi:</label>
    <input type="text" id="diachi" name="diachi" /><br />

    <div style="display: flex;">
      <button type="submit" name="them_truong">Them</button>
      <input type="reset" value="Reset" />
    </div>
  </form>
</body>

</html>