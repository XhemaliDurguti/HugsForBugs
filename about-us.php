<?php
/*
* Template Name: About us
*/
get_header();
?>

<head>

  <title>About Us</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />


</head>
<style>
  /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
  body {
    font-family: "Poppins", sans-serif;
    color: #444444;
  }


  a {
    text-decoration: none;
  }

  a:hover {
    color: #ffc56e;
    text-decoration: none;
  }

  .title1, h1,
  h2,
  h3,
  h5,
  h6 {
    font-family: "Satisfy", sans-serif;
  }


  /*--------------------------------------------------------------
  # Hero Section
  --------------------------------------------------------------*/
  #hero {
    width: 100%;
    height: 100vh;
    background-color: rgba(39, 37, 34, 0.8);
    overflow: hidden;
    padding: 0;
  }

  #hero .carousel-item {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  #hero .carousel-item::before {

    background-color: rgba(12, 11, 10, 0.5);
    position: relative;
    top: -5 !important;
    right: 0;
    left: 0;
    bottom: 0;
  }

  #hero .carousel-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    bottom: 0;
    top: -5 !important;
    left: 0;
    right: 0;
  }

  #hero .carousel-content {
    text-align: center;
  }

  #hero h2 {
    color: #fff;
    margin-bottom: 30px;
    margin-top: 40%;
    font-size: 48px;
    font-weight: 700;
  }

  #hero h2 span {
    color: #ffb03b;
  }

  #hero p {
    width: 80%;
    -webkit-animation-delay: 0.4s;
    animation-delay: 0.4s;
    margin: 0 auto 30px auto;
    color: #fff;
  }

  #hero .carousel-inner .carousel-item {
    transition-property: opacity;
    background-position: center top;
  }

  #hero .carousel-inner .carousel-item,
  #hero .carousel-inner .active.carousel-item-start,
  #hero .carousel-inner .active.carousel-item-end {
    opacity: 0;
  }

  #hero .carousel-inner .active,
  #hero .carousel-inner .carousel-item-next.carousel-item-start,
  #hero .carousel-inner .carousel-item-prev.carousel-item-end {
    opacity: 1;
    transition: 0.5s;
  }

  #hero .carousel-inner .carousel-item-next,
  #hero .carousel-inner .carousel-item-prev,
  #hero .carousel-inner .active.carousel-item-start,
  #hero .carousel-inner .active.carousel-item-end {
    left: 0;
    transform: translate3d(0, 0, 0);
  }

  #hero .carousel-control-next-icon,
  #hero .carousel-control-prev-icon {
    background: none;
    font-size: 30px;
    line-height: 0;
    width: auto;
    height: auto;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    transition: 0.3s;
    color: rgba(255, 255, 255, 0.5);
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #hero .carousel-control-next-icon:hover,
  #hero .carousel-control-prev-icon:hover {
    background: rgba(255, 255, 255, 0.3);
    color: rgba(255, 255, 255, 0.8);
  }

  #hero .carousel-indicators li {
    cursor: pointer;
  }

  #hero .btn-menu,
  #hero .btn-book {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: inline-block;
    padding: 12px 30px;
    border-radius: 50px;
    transition: 0.5s;
    line-height: 1;
    margin: 0 10px;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.8s;
    color: #fff;
    border: 2px solid #ffb03b;
  }

  #hero .btn-menu:hover,
  #hero .btn-book:hover {
    background: #ffb03b;
    color: #fff;
  }

  @media (max-width: 768px) {
    #hero h2 {
      font-size: 28px;
    }
  }

  @media (min-width: 1024px) {
    #hero p {
      width: 50%;
    }

    #hero .carousel-control-prev,
    #hero .carousel-control-next {
      width: 5%;
    }
  }

  /*--------------------------------------------------------------
  # Sections General
  --------------------------------------------------------------*/
  section {
    padding: 60px 0;
  }

  .section-bg {
    background-color: white;
  }

  .section-title {
    text-align: center;
    padding-bottom: 30px;
  }

  .section-title h2 {
    margin: 15px 0 0 0;
    font-size: 32px;
    font-weight: 700;
    color: #5f5950;
  }

  .section-title h2 span {
    color: #ffb03b;
  }

  .section-title p {
    margin: 15px auto 0 auto;
    font-weight: 300;
  }

  @media (min-width: 1024px) {
    .section-title p {
      width: 50%;
    }
  }

  /*--------------------------------------------------------------
  # About
  --------------------------------------------------------------*/
  .about {
    background: #fffaf3;
  }

  .about .content {
    padding: 0 80px;
  }

  .about .content h3 {
    font-weight: 400;
    font-size: 34px;
    color: #5f5950;
  }

  .about .content h4 {
    font-size: 20px;
    font-weight: 700;
    margin-top: 5px;
  }

  .about .content p {
    font-size: 15px;
    color: #848484;
  }

  .about .content ul {
    list-style: none;
    padding: 0;
  }

  .about .content ul li+li {
    margin-top: 15px;
  }

  .about .content ul li {
    position: relative;
    padding-left: 26px;
  }

  .about .content ul i {
    font-size: 20px;
    color: #ffb03b;
    position: absolute;
    left: 0;
    top: 2px;
  }

  .about .content p:last-child {
    margin-bottom: 0;
  }

  .about .video-box {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    min-height: 400px;
    position: relative;
  }

  .about .play-btn {
    width: 94px;
    height: 94px;
    background: radial-gradient(#ffb03b 50%, rgba(255, 176, 59, 0.4) 52%);
    border-radius: 50%;
    display: block;
    position: absolute;
    left: calc(50% - 47px);
    top: calc(50% - 47px);
    overflow: hidden;
  }

  .about .play-btn::after {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 100;
    transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  .about .play-btn::before {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation: pulsate-btn 2s;
    animation: pulsate-btn 2s;
    -webkit-animation-direction: forwards;
    animation-direction: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-timing-function: steps;
    animation-timing-function: steps;
    opacity: 1;
    border-radius: 50%;
    border: 5px solid rgba(255, 176, 59, 0.7);
    top: -15%;
    left: -15%;
    background: rgba(198, 16, 0, 0);
  }

  .about .play-btn:hover::after {
    border-left: 15px solid #ffb03b;
    transform: scale(20);
  }

  .about .play-btn:hover::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border: none;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 200;
    -webkit-animation: none;
    animation: none;
    border-radius: 0;
  }

  @media (max-width: 1024px) {

    .about .content,
    .about .accordion-list {
      padding-left: 0;
      padding-right: 0;
    }
  }

  @media (max-width: 992px) {
    .about .content {
      padding-top: 30px;
    }

    .about .accordion-list {
      padding-bottom: 30px;
    }
  }

  @-webkit-keyframes pulsate-btn {
    0% {
      transform: scale(0.6, 0.6);
      opacity: 1;
    }

    100% {
      transform: scale(1, 1);
      opacity: 0;
    }
  }

  @keyframes pulsate-btn {
    0% {
      transform: scale(0.6, 0.6);
      opacity: 1;
    }

    100% {
      transform: scale(1, 1);
      opacity: 0;
    }
  }

  /*--------------------------------------------------------------
  # Whu Us
  --------------------------------------------------------------*/
  .why-us .box {
    padding: 50px 30px;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    transition: all ease-in-out 0.3s;
    height: 100%;

  }

  .why-us .box span {
    display: block;
    font-size: 28px;
    font-weight: 700;
    color: #ffcf88;
  }

  .why-us .box h4 {
    font-size: 24px;
    font-weight: 600;
    padding: 0;
    margin: 20px 0;
    color: #6c665c;
  }

  .why-us .box p {
    color: #aaaaaa;
    font-size: 15px;
    margin: 0;
    padding: 0;
  }

  .why-us .box:hover {
    background: #ffb03b;
    padding: 30px 30px 70px 30px;
    box-shadow: 10px 15px 30px rgba(0, 0, 0, 0.18);
  }

  .why-us .box:hover span,
  .why-us .box:hover h4,
  .why-us .box:hover p {
    color: #fff;
  }
</style>

<body>
  <!-- =======  Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image:url('https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80');" ; />
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown"><span>About</span> Us</h2>
            <p class="animate__animated animate__fadeInUp">“Need food and a good place to eat? Welcome to our humble place where you can eat good food .”</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">


        <div class="content">
          <h3>Food Poot <strong>- Traditional food rating</strong></h3><br>

          <style>
            .image {
              float: left;
              border-radius: 40px;
              border: 2px solid gray;
            }
          </style>
          <p><img class="image" src="https://th.bing.com/th/id/OIP.-sLfjy4aCw-fiddQEjZ0GgEyDM?pid=ImgDet&rs=1" class="mx-auto" alt="Our Team" style="width:40%;height:40%;margin-right:15px;">
          <h3>Our Story</h3>
          <h4 style="background-color:#FFF8EE;border: 0.5px solid gray; border-radius:40px; " class="title1">Since 2022 - Best Quailty</h4><br>
          <i>Food Poot is a comprehensive platform for traditional food restaurants in Kosovo. We are passionate about traditional cuisine and believe that it is an important part of the country's cultural heritage.<br>
            Our website was created to connect food lovers with the best traditional restaurants in Kosovo, and to provide accurate and up-to-date information about the country's vibrant culinary scene.<br>
            We are dedicated to promoting and preserving traditional cuisine, and to showcasing the rich flavors and aromas of authentic local dishes.<br>
            Our team consists of experienced food critics and local experts who have a deep understanding of traditional food and culture in Kosovo.
            We work tirelessly to provide users with the most accurate and relevant information, and to constantly update the website with the latest information and reviews.
            We believe that traditional food should be accessible and appreciated by everyone, and our goal is to make this possible through our restaurant rating website.</i>


          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Whu Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">
      <div class="section-title">
        <h2>Why choose <span>Our Restaurant</span></h2>
        <p>Nothing brings people together like good food and a good restaurant.</p>
      </div>
      <style>
        * {
          box-sizing: border-box;
        }

        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .col-lg-4 {
          float: left;
          width: 25%;
          padding: 0 10px;
        }


        .row {
          margin: 0 -5px;
        }


        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        @media screen and (max-width: 600px) {
          .col-lg-4 {
            width: 100%;
            display: block;
            margin-bottom: 20px;
          }
        }

        . .box {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          padding: 17px;
          text-align: center;
          background-color: #f1f1f1;
        }
      </style>

      <div class="row">
        <div class="col-lg-4">
          <div class="box">
            <span>01</span>
            <h4 class="title1">Best traditional restaurants</h4>
            <p>Whether you are a local resident or a visitor to Kosovo, Food Poot is the ultimate resource for discovering the best traditional restaurants.</p>
          </div>
        </div>


        <div class="col-lg-4 ">
          <div class="box">
            <span>02</span>
            <h4 class="title1">Excellence</h4>
            <p>We work towards excellence and try to work towards the highest level of service to keep you happy so you can keep your customers happy.</p>
          </div>
        </div>


        <div class="col-lg-4 ">
          <div class="box">
            <span>03</span>
            <h4 class="title1"> Food lovers</h4>
            <p>Join us on our mission to celebrate and preserve traditional food in Kosovo, and to connect food lovers with the best traditional restaurants.</p>
          </div>
        </div>
        <div class="col-lg-4 ">
          <div class="box">
            <span>04</span>
            <h4 class="title1">Location</h4>
            <p>Interactive maps are even better. Because people can use them to understand how close they are.So make it very clear where your restaurant is,Have pictures.</p>
          </div>
        </div>
      </div>


    </div>
  </section>

</body>
<!-- End Whu Us Section -->
<?php get_footer(); ?>