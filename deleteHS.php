<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xoa hoc sinh</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <h1>Trang Xoa hoc sinh</h1>
  <label for="mahs">Ma so hoc sinh:</label>
  <input type="text" id="mahs" name="mahs" /><br />

  <button type="button" id="xoa_hs" name="xoa_hs">Xoa</button>

  <p></p>

  <script>
    $(document).ready(function() {

      $("#xoa_hs").click(function() {
        const mahs = $("#mahs").val();
        $.ajax({
          url: "code.php",
          type: "POST",
          data: {
            _method: 'DELETE',
            mahs: mahs
          },
          success: function(response) {
            const result = JSON.parse(response);
            const text = $("p");
            text.empty();
            text.append(result);
          },
        });
      });

    });
  </script>
</body>

</html>