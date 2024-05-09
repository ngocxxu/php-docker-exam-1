<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liet ke hoc sinh</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
</style>

<body>
  <h1>Trang liet ke hoc sinh</h1>
  <form method="POST" action="code.php">
    <label for="malop">Ten lop:</label>
    <select name="malop" id="malop">
      <?php

      $sql = "SELECT * FROM LOP";
      $query = mysqli_query($con, $sql);

      if (mysqli_num_rows($query) > 0) {
        foreach ($query as $item) {
      ?>
          <option value="<?= $item['MALOP']; ?>"><?= $item['TENLOP']; ?></option>
      <?php
        }
      }

      ?>
    </select>
    <button type="button" name="lietke_hs" id='lietke_hs'>Liet ke</button>
  </form></br>

  <table>
    <thead>
      <tr>
        <th>STT</th>
        <th>Ten hoc sinh</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>

  <script>
    $(document).ready(function() {
      $("#lietke_hs").click(function() {
        const malop = $("#malop").val();
        $.ajax({
          url: "code.php",
          type: "GET",
          data: {
            malop: malop
          },
          success: function(response) {
            const dsHS = JSON.parse(response);
            const tableBody = $("tbody");
            tableBody.empty();
            for (let i = 0; i < dsHS.length; i++) {
              const hs = dsHS[i];

              const row = `
                <tr>
                  <td>${i++ + 1}</td>
                  <td>${hs.TENHS}</td>
                </tr>
                `

              tableBody.append(row);
            }
          },
        });
      });

    });
  </script>
</body>

</html>