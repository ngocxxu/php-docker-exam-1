<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim hoc sinh</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <h1>Trang tim hoc sinh</h1>
  <label for="ten">Ten can tim:</label>
  <input type="text" id="ten" name="ten" /><br />

  <button type="button" id="tim_ten" name="tim_ten">Tim</button>

  <p></p>

  <script>
    $(document).ready(function() {
      $("#tim_ten").click(function() {
        const ten = $("#ten").val();
        $.ajax({
          url: "code.php",
          type: "GET",
          data: {
            ten: ten
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