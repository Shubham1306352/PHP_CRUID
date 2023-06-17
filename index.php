<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
<img src="header1.jpeg" class="header_img">
</header>

<div class="container">
   <div class="left-div">

    <h1 >CUSTOMER DATA ENTRY FORM</h1>
    <form action="register.php" method="post">
        <input type="text" name="first_name" placeholder="FIRST NAME"  required>
   
        <input type="text" name="last_name" placeholder="LAST NAME" required>

        <br> <br>

        <input type="email" name="email" placeholder="EMAIL" required>
        <input type="date" name="dob" placeholder="Date of Birth" class='dob' required>


        <br> <br>
        <input type="text" name="nationality" placeholder="NATIONALITY">

        <br>
        <br>
        
        <input type="submit" value="ADD TO LIST" class='sub'>
    </form>
   
    </div>

    <div class="right-div">
        <h1>CUSTOMER DATA LIST</h1>
        <?php include 'display.php'; ?>
    </div>
  
</div>
</body>
</html>
