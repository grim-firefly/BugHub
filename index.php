<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>BugHub</title>

  <!----------CSS-------------->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!----------CSS-------------->


  <!----------CUSTOM CSS-------------->

  <link rel="stylesheet" href="css/index.css">

  <!----------CUSTOM CSS END-------------->

</head>

<body>

  <div class="LandingpageBg">
    <img src="img/111.jpg" alt="" />
  </div>
  <div class="LandingpageBgBlur"></div>
  <!----Header--------->
  <nav class="navbar navbar-expand-lg navbar-light bg-light landingpageNav" id="navbar">
    <a class="navbar-brand ml-5 nav_logo_text text-light font-weight-bold " href="index.php">BugHub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-light font-weight-bold" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
    <div class="justify-content-end pl-1">
      <ul class="navbar-nav">
        <li class="nav-item pr-2">
          <a class="nav-link font-weight-bold text-light" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="btn  rounded-pill text-light pl-3 pr-3 mr-5" style="border-radius: 50px;background-color: #3498db;" href="signup.php">Sign
            up</a>
        </li>
      </ul>
    </div>
  </nav>
  <!----Header END--------->

  <!----TopSection--------->

  <div class="LandingPageHeroSection">
    <div class="LandingPageHeroSectionX">
      <img src="img/111.jpg" class="topSectionPic" alt="" />
      <div class="topSectionPicBlur">
        <div class="landingpageitemcontainer container">
          <div class="row">
            <div class="col landingpageTxtContainer">
              <div class="landingpageTxt">
                <h1>A simple Bug Life Cycle Tracker</h1>
                <p>One of the Best Free Bug tracker with unlimited Developers and Testers. Join use to Start Tracking Bugs of Your Project Quickly</p>
                <div class="row pl-3">
                  <a class="btn btn-info topsectionbtn mr-3" href="#"><span>Learn More</span></a>
                  <a class="btn btn-outline-light topsectionbtn" href="signup.php"><span>Free Signup</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!----TopSection END--------->

  <!----Second Component-->

  <div class="ScoundElement_body">
    <div class="container ScoundElement">
      <div class="row">
        <!-- Card Start -->
        <div class="col">
          <div class="card">
            <div class="card-body">
              <i class="fa fa-cogs card__icons text-danger" aria-hidden="true"></i>
              <h5>Bugs Tracking</h5>
              <p style='font-size:.9rem'>Time is money - so we provide all of the tools necessary to quickly and
                easily Track bugs amongs developer and Testers.
                <a href="#" class="pl-1">Learn more..</a> </p>
            </div>
          </div>
        </div>
        <!-- Card End -->

        <!-- Card Start -->
        <div class="col">
          <div class="card">
            <div class="card-body">
              <i class="fa fa-users card__icons text-info" aria-hidden="true"></i>
              <h5>Thousands Of Users</h5>
              <p style="font-size: .9rem">Thousands of Tester can can post bugs for Developer and can see bugs states.
                <a href="#" class="pl-1">Learn more..</a> </p>
            </div>
          </div>
        </div>
        <!-- Card End -->

        <!-- Card Start -->
        <div class="col">
          <div class="card">
            <div class="card-body">
              <i class="fa fa-id-card card__icons text-primary" aria-hidden="true"></i>
              <h5>Sorted bugs</h5>
              <p style="font-size: .9rem">Bugs will be sorted according to the priority.withwhom user can easily fixed criical one ASAP.
                <a href="#" class="pl-1">Learn more..</a></p>
            </div>
          </div>
        </div>
        <!-- Card End -->

        <!-- Card Start -->
        <div class="col">
          <div class="card">
            <div class="card-body">

              <i class="fa fa-truck card__icons text-success" aria-hidden="true"></i>
              <h5>Powerful Tracking</h5>
              <p style="font-size: .9rem">Bugs can be tracked using different states like fixed , rejected ,Duplicate , reopen,verified etc
                <a href="#" class="pl-1">Learn more..</a></p>
            </div>
          </div>
        </div>
        <!-- Card End -->

      </div>
    </div>
  </div>

  <!----Second Component End-->

  <script>
    window.onscroll = function () { myFunction() };

    var header = document.getElementById("navbar");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }

  </script>





  <!-- Script End -->

</body>

</html>