<?php
session_start();
include './assets/connect/connect.php';

if (isset($_SESSION['employee_id'])) {
  header("location:./employee_inventory/index.php");
  exit();
} elseif (isset($_SESSION['manager_id'])) {
  header("location:./manager/index.php");
  exit();
} elseif (isset($_SESSION['sale_id'])) {
  header("location:./sale.php");
  exit();
} elseif (isset($_SESSION['nvl_id'])) {
  header("location:./resource_department.php");
  exit();
}elseif (isset($_SESSION['director_id'])) {
  header("location:./director/index.php");
  exit();
}elseif (isset($_SESSION['product_manager_id'])) {
  header("location:./product_manager/index.php");
  exit();
}
?>

<?php
if (isset($_POST["submit"])) {
  $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  if (empty($uname) || empty($password)) {
    echo '<script>
      alert("Nhập đầy đủ thông tin")
      </script>';
  } else {
    $query = mysqli_query($conn, "SELECT * FROM `employee`
                                  join `roles` on `roles`.`role_id` = `employee`.`role_id`
                                  WHERE `email` = '$uname' limit 1"); // Liên kết CSDL


    if (mysqli_num_rows($query) > 0) { // Kiểm tra dữ liệu có hay không
      $row = mysqli_fetch_assoc($query); // Lưu dữ liệu dưới dạng object
      if (password_verify($password, $row['password'])) {
        if ($row['nickname'] === 'NVK') {
          $_SESSION['employee_id'] = $row['employee_id'];
          header('location:employee_inventory');
        } elseif ($row['nickname'] === 'QL_NVL') {
          $_SESSION['manager_id'] = $row['employee_id'];
          header('location:manager');
        } elseif ($row['nickname'] === 'NVL') {
          $_SESSION['nvl_id'] = $row['employee_id'];
          header('location:resource_department');
        } elseif ($row['nickname'] === 'BGD') {
          $_SESSION['director_id'] = $row['employee_id'];
          header('location:director');
        }elseif ($row['nickname'] === 'QL_TP') {
          $_SESSION['product_manager_id'] = $row['employee_id'];
          header('location:product_manager');
        }
      } else {
        echo '<script>
                  alert("Mật khẩu không đúng")
                  </script>';
      }
    } else {
      echo '<script>
              alert("Email không tồn tại")
              </script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
</head>

<style>
  body {
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
    background-color: #494848;
  }

  .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 2em;
    background-color: #171717;
    border-radius: 25px;
    transition: .4s ease-in-out;
    width: 400px;
    /* Điều chỉnh độ rộng của biểu mẫu */
    max-width: 100%;
    /* Giữ cho biểu mẫu không vượt quá kích thước của màn hình */
  }

  /* .form:hover {
  transform: scale(1.05);
  border: 1px solid black;
} */

  #heading {
    text-align: center;
    margin: 2em;
    color: rgb(255, 255, 255);
    font-size: 1.2em;
  }

  .field {

    position: relative;
    display: flex;
    align-items: center;
    gap: 0.5em;
    border-radius: 25px;
    padding: 0.6em;
    border: none;
    outline: none;
    color: white;
    background-color: #171717;
    box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
    width: 100%;
  }



  .input-icon {
    height: 1.3em;
    width: 1.3em;
    fill: white;
  }

  .input-field {
    background: none;
    border: none;
    outline: none;
    width: 100%;
    color: #d3d3d3;
  }

  .field i {
    position: absolute;
    width: 15px;
    /* height: 15px; */
    right: 35px;
    display: none;
  }

  .field .input-field:valid~i {
    display: block;
  }

  .see_pass_word {
    position: absolute;
    right: 25px;
    font-size: 20px;
    cursor: pointer;
    /* display: none; */
    visibility: hidden;

  }

  .form .btn {
    display: flex;
    justify-content: center;
    margin-top: 2.5em;
  }

  .button1,
  .button2,
  .button3 {
    width: 100%;
    padding: 5px;
    border-radius: 8px;
    border: none;
    outline: none;
    transition: .4s ease-in-out;
    background-color: #252525;
    color: white;
    cursor: pointer;
  }

  .button1:hover,
  .button2:hover,
  .button3:hover {
    background-color: black;
    color: white;
  }

  .button2 {
    margin-right: 0.5em;
  }

  .button3 {
    margin-bottom: 3em;
  }

  .override {
    border: 1px solid #000 !important;
  }

  input:-webkit-autofill,
  input:-webkit-autofill:focus {
    transition: background-color 0s 600000s, color 0s 600000s;
  }

  /* Định dạng cho phần select */
  select {
    display: flex;
    align-items: center;
    gap: 0.5em;
    border-radius: 25px;
    padding: 0.6em;
    border: none;
    outline: none;
    color: white;
    background-color: #171717;
    box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
    cursor: pointer;
    width: 100%;
  }

  /* Định dạng khi hover trên select */
  select:hover {
    background-color: #252525;
  }

  /* Định dạng khi select được focus */
  select:focus {
    border: 1px solid #252525;
  }

  /* Định dạng mũi tên drop-down của select */
  select::after {
    content: "\25BC";
    position: absolute;
    top: 50%;
    right: 1em;
    transform: translateY(-50%);
    color: #d3d3d3;
    pointer-events: none;
  }

  label {
    color: white;
    /* Màu chữ cho label */
    font-size: 0.9em;
    /* Cỡ chữ cho label */
  }

  .input-field:valid~.see_pass_word {
    visibility: visible;
    color: white;
  }
</style>

<body>
  <form class="form" method="post">
    <p id="heading">Login</p>
    <div class="field">
      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        viewBox="0 0 16 16">
        <path
          d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
        </path>
      </svg>
      <input placeholder="Username" class="input-field" name="uname" type="text">
    </div>
    <div class="field">
      <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        viewBox="0 0 16 16">
        <path
          d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
        </path>
      </svg>
      <input placeholder="Password" id="pwd" class="input-field" name="password" type="password">

      <i class="fa-sharp fa-solid fa-eye-slash fa-sm" style="color: #e5e7eb;" onclick="myFunction()"></i>
    </div>
    <div class="btn">
      <input class="button1" type="submit" name="submit" value="Login"></input>
    </div>
    <!-- <button class="button3" >Forgot Password</button> -->
    <input class="button3" type="submit" name="password-reset-token" value="Forgot Password"></input>

  </form>

</body>

</html>

<script>
  function myFunction() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>