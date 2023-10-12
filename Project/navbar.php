<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar_style.css">
</head>

<body>
    <section id="header">
        <a href="navbar.html"><img src="logo.png" class="logo" width="90"></a>
        <div>
            <ul id="navbar">
                <li><a href="navbar.php">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#Testimonials">Testimonial</a></li>
                <li><a href="clone.html">Cart</a></li>
                <?php
    if (isset($_SESSION["user_id"])) {

        echo '<li><a href="logout.php">Logout</a></li>';
        echo '<li><a href="profile.php">Logged in as ' . $_SESSION["user_name"] . '</a></li>';
    } else {
        echo '<li><a href="login.php">Login</a></li>';
        echo '<li><a href="signup.php">Signup</a></li>';
    }
    ?>
            </ul>
        </div>
    </section>
    <div class="space"></div>
    <div class="text-block">
        <img src="farm.jpg" class="farm-img">
        <div class="text-farm">
            <h1>Farm to Your Door</h1>
            <button class="hero">Show</button>
        </div>
    </div>
    <section class="products" id="products">
        <h1 class="heading"><span> Our Products </span></h1>
        <div class="product-slider">
            <div class="box">
                <img src="product1.jpg" alt="image">
                <h3> Product 1 </h3>
                <div class="price"> $20.25/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>

            <div class="box">
                <img src="product2.jpg" alt="image">
                <h3> Product 2 </h3>
                <div class="price"> $15.00/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>

            <div class="box">
                <img src="product3.jpg" alt="image">
                <h3> Product 3 </h3>
                <div class="price"> $25.05/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>

            <div class="box">
                <img src="product4.jpg" alt="image">
                <h3> Product 4 </h3>
                <div class="price"> $35.05/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>

            <div class="box">
                <img src="product5.jpg" alt="image">
                <h3> Product 5 </h3>
                <div class="price"> $45.05/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>

            <div class="box">
                <img src="product6.jpg" alt="image">
                <h3> Product 6 </h3>
                <div class="price"> $30.75/- </div>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>A product description is a form of marketing copy used to describe and explain the benefits of your
                    product.</p>
                <button href="#" class="btn"> Shop Now </button>
            </div>
        </div>
    </section>
    <div class="heroptext">
        <img src="pexels-photo-5231144.jpeg" class="img-work">
        <div class="text-work">
            <h1> <b><u><i>How it Works</b></u></i>
                <h2><b>1.</b> Shop on your schedule. Subscribe to <br> your favorite staples or place an à la carte <br>
                    order.</h2>
                <h2> <b>2.</b> Our farmers harvest your food. By <br> ordering only what we need, we keep our <br> waste
                    under 1%!</h2>
                <h2> <b>3.</b> On the day of your delivery, we pack up <br> your box and bring it to your door.</h2>
            </h1>
            <button class="hpbutton">Learn more</button>
        </div>
    </div>
    <div class="contain" id="about">
        <img src="farr.jpg" alt="SamyyoImage" width="1200" height="500" class="mission-img">
        <h1 class="mission-head">Our Name is Our Mission</h1>
        <p class="mission-text">Farm to People is on a mission to radically transform the food system and the way people
            get food to their table. We believe everyone should have access to the freshest, high-quality produce,
            seafood, meats, and more direct from growers and producers they can trust — because they know them. We’re
            working to make that easy and affordable.</p>
        <a href="#" class="mission-link">See Our Standards</a>
    </div>
    <style class="css"></style>

    <h1 class="testi-head" id="Testimonials">TESTIMONIALS</h1>
    <div class="container-testi">
        <div class="first-info info">
            <img src="https://cdn.sanity.io/images/ec9j7ju7/production/f507a324523c61675048b908bb7fd5576ff8e06d-1376x1371.jpg?auto=format&w=640"
                alt="" class="testi-img">
            <h2>@grossypelosi</h2>

            <p>“I deeply look forward to Monday mornings when I<br>
                choose - yes, choose - what goes in my box over<br>
                coffee and my last slice of She Wolf sourdough. The<br>
                seasonal produce selection changes every week and <br>
                keeps me on my toes, but it’s those constant pantry<br>
                staples that keep me coming back.”</p>

        </div>

        <div class="second-info info">
            <img src="https://cdn.sanity.io/images/ec9j7ju7/production/78785eb7cb1586be5ccc4a334c6b95136078bfae-800x800.jpg?auto=format&w=640"
                alt="" class="testi-img">
            <h3>@thevicstyles</h3>

            <p>"I’ve been using Farm to People for over 2 years now.<br>
                I love the fact that the produce is sourced locally,<br>
                which reduces travel time, waste, and emissions. It’s<br>
                also a great way to support local farms & farmers."<br></p>


        </div>

        <div class="third-info info">
            <img src="https://cdn.sanity.io/images/ec9j7ju7/production/9f06cb0b5efe967515e9f1962f0fee8b7496daeb-323x323.jpg?auto=format&w=640"
                alt="" class="testi-img">
            <h3>@lifebymikeg</h3>
            <p>"Every Monday when my Farm to People<br>
                box arrives, I get so excited to see what I'll<br>
                be experimenting with for the upcoming<br>
                week! They curate the ingredients just<br>
                enough so you get some solid direction,<br>
                while leaving plenty of room for creativity<br> in the kitchen."</p>
        </div>
    </div>

</body>

</html>