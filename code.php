<?php
include "index.php";

// ***** TẠO TRƯỜNG *****
if (isset($_POST['them_truong'])) {
  // Nhan du lieu tu form
  $matr = $_POST['matr'];
  $tentr = $_POST['tentr'];
  $diachi = $_POST['diachi'];

  $sql = "INSERT INTO TRUONG(MATRUONG, TENTRUONG, DIACHI) VALUES ('$matr', '$tentr', '$diachi')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them truong thanh cong</h3>";
  }
}


// ***** TẠO LỚP *****
if (isset($_POST['them_lop'])) {
  $malop = $_POST['malop'];
  $tenlop = $_POST['tenlop'];
  $matr = $_POST['matr'];

  $sql = "INSERT INTO LOP(MALOP, TENLOP, MATRUONG)
          VALUES ('$malop', '$tenlop', '$matr')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them lop thanh cong</h3>";
  }
}


// ***** LẤY DANH SÁCH HỌC SINH *****
if (isset($_GET["malop"])) {
  $malop = $_GET['malop'];

  $sql = "SELECT *
            FROM HOCSINH HS
            JOIN LOP L ON HS.MALOP = L.MALOP
            WHERE HS.MALOP = '$malop'";

  $query = mysqli_query($con, $sql);

  $students = array();

  while ($row = $query->fetch_assoc()) {
    $students[] = $row;
  }

  echo json_encode($students);
}

// ***** TÌM HỌC SINH *****
if (isset($_GET["ten"])) {
  $ten = $_GET["ten"];

  $sql = "SELECT * FROM HOCSINH HS WHERE HS.TENHS = '$ten'";
  $query = mysqli_query($con, $sql);

  if (mysqli_num_rows($query) > 0) {
    echo json_encode('Co');
  } else {
    echo json_encode('Khong co');
  }
}


// ***** XÓA HỌC SINH *****
if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
  $mahs = $_POST['mahs'];

  $sql = "DELETE FROM HOCSINH HS WHERE HS.MAHS = '$mahs'";
  $query = mysqli_query($con, $sql);

  if (mysqli_affected_rows($con) > 0) {
    echo json_encode('Xoa thanh cong');
  } else {
    echo json_encode('Khong co');
  }
}
