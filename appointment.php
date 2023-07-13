<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> hospital website </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->
<section>
<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>DOC</strong>at your home </a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="about.php">about</a>
        
        <a href="Doctors.php">doctors</a>
        <a href="appointment.php">appointment</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>
</section>

<section class="appointment" id="appointment">
    
    <h1 class="heading"> <span>appointment</span> now </h1>    

    <div class="row">

        <div class="image">
            <img src="image/appointment-img.svg" alt="">
        </div>

        <form action="appointment.php" method="post">
        
      
            <h3>make appointment</h3>
            <?php include('errors.php'); ?>
            <input type="text"name="name" placeholder="your name" class="box">
            <input type="number"name="number" placeholder="your number" class="box">
            <input type="email"name="email" placeholder="your email" class="box">
            <input type="date"name="date" class="box">
            <select name="doc" value="doc" id="doc" class="box">
                <option value="selected">Select Docter</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Dermitologist">Dermitologist</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Urologist">Urologist</option>
                <option value="Psychiatrist">Psychiatrist</option>
                <option value="Anesthesiologist">Anesthesiologist</option>

            </select>
            <select name="time" value="time" id="time" class="box">
                <option value="selected time">Select Time</option>
                <option value="11-1">11am-1pm</option>
                <option value="3-5">3pm-5pm</option>
                <option value="6-8">6pm-8pm</option>
            </select>
            <label for="Symptoms"  style="font-size:17px;">Please let us know your Symptoms</label>
            <textarea id="w3review" name="symptoms" rows="4" cols="50" class = "box">                </textarea>
            <input type="submit" name="appointment" value="appointment now" class="btn">
        </form>

    </div>

</section>












<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="about.php"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="Doctors.php"> <i class="fas fa-chevron-right"></i> doctors </a>
            <a href="appointment.php"> <i class="fas fa-chevron-right"></i> appointment </a>
            <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
            <a href="Blogs.php"> <i class="fas fa-chevron-right"></i> FAQs</a>
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> dental care </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> cardioloty </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a>
        </div>

        <div class="box">
            <h3>appointment info</h3>
            <a href="email.php"> <i class="fas fa-phone"></i> Contact Us </a>
            <a href="#"> <i class="fas fa-phone"></i> +8801782546978 </a>
            <a href="#"> <i class="fas fa-envelope"></i> docatyourhome123@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> crgnik@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> bangalore, India </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fa fa-facebook"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

    </div>

    <div class="credit"> created by <span>CHIRAG S NAIK</span> | all rights reserved </div>

</section>
<!-- footer section ends -->


<!-- js file link  -->
<script src="js/script.js"></script>

</body>
</html>