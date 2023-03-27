<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 2: Room Functionality</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit&family=Poppins&family=Roboto&display=swap"
      rel="stylesheet"
    />
    <meta content="REST Countries" property="og:title" />
    <meta
      content="Get information about countries via a RESTful API"
      name="description"
    />
    <meta name="keywords" content="rest,api,countries,world,json" />
    <meta name="author" content="Fayder Florez" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      body{
        background: url("image/Untitled\ design.png");
      }
      .room-container {
        margin-top: 20px;
      }
      .room {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
      }
      .room select {
        width: 100px;
        margin-right: 10px;
      }
      .add-room-btn {
        margin-left: 110px;
      }
      .remove-room-btn {
        margin-left: 10px;
      }
      .book-content-1 {
        background-color: #FFDCBA;
        padding: 20px;
        box-shadow: 0px 10px 10px #000;
        border-radius: 10px;
        margin: 50px auto;
        height: 350px;
        width: 600px;
      }
      .title-header{
        text-align: center;
        font-size: 50px;
        color: #333;
      }
      .paragraph-header{
        text-align: center;
        font-size: 25px;
        color: #000;
        padding-top: 10px
      }
    </style>
  </head>

  <body>
  <div class="header">
        <nav>
            <div class="logo">
                <img src="image/HOTEL__3_-removebg-preview.png" alt="">
            </div>
            <a class="menu-btn" href="#">
                <span class="menu-icon">&#9776;</span>
            
            </a>
            <ul id="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="room.html">Room</a></li>
                <li class="book" style="float: right; background-color: #ffffff; margin-right: 10px; padding: auto; border-radius: 5px;"><a href="book.html">BOOK NOW!</a></li>
            </ul>
        </nav>
    </div>




    <div class="book-content-1">
    <h1 class="title-header">Thank you for booking with our hotel!</h1>
	<p class="paragraph-header">Your information has been received and your booking is confirmed.:</p>
  <br>
  <br>
  <br>
	<p>You will now be redirected to our home page.</p>

  <input type="hidden" name="email" value="<?php echo $email; ?>">

	<?php

if(isset($_POST['email'])) {
  $email = $_POST['email'];
} else {
  // Handle the case where the email key is not set
  // For example, redirect the user back to the booking page with an error message
  header("refresh:5;url=index.html");
  exit();
}
	// Redirect to room selection page after 5 seconds
	// header("refresh:5;url=payment.php");
	?>

    </div>

</body>
</html>