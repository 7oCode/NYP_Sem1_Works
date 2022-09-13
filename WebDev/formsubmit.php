<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Info submitted!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <?php
    $servername = "localhost";
    $password = "DB@password123";
    $username = "id19362442_users";
    $database = "id19362442_sublist";
    $name = $_POST["name"];
    $email = $_POST["email"];
    //$imgtypes = $_POST["imgtypes"];
    $imgtypes = $_POST["imgtypes"];
    $apics = $_POST["photog"];
    $devicetype = $_POST["device"];

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error){
      die('Connection failed: '. $conn->connect_error);
    }
    else{
      $stmt = $conn->prepare("insert into users(name, email, favstyle, areActive, DeviceUsed) values(?,?,?,?,?)");
      $stmt->bind_param("sssss", $name, $email, $imgtypes, $apics, $devicetype);
      $stmt->execute();
      echo "Registration successful! <br>";
      $stmt->close();
      $conn->close();
    }
     ?>

    Thank you, <?php echo $_POST["name"]; ?>
    <br>
    I like <?php echo $imgtypes;?> photography too!
    <br>
    Look forward to receiving updates on your email, <?php echo $_POST["email"]; ?>!<br>
    Click <a href="Subscribe.html">here</a> to return the Subscribe page.
  </body>
</html>
