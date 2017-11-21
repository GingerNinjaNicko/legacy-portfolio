<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nicko J. Ruddock">
    <link rel="icon" href="./favicon.ico"> 
    <title>Nicko J. Ruddock - Portfolio</title>

    <!-- Adding Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
    
    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/ab45073717.js"></script>
    
    <!-- If javascript not enabled, form submits to this page so include php form logic-->
    <noscript>
        <?php include_once './assets/php/contact.php'; ?>
    </noscript>
    
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0">
    
    <!-- Invisible top for scrollspy functionality -->
    <div id="top"></div>
    
    <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">
                <h1>
                    NJR
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse-items" aria-controls="nav-collapse-items" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="nav-collapse-items" data-toggle="collapse" data-target="#nav-collapse-items">
                <div class="navbar-nav ml-auto">
                    <a href="#top" class="nav-item nav-link">
                        Home
                    </a>
                    <a href="#portfolio" class="nav-item nav-link">
                        Portfolio
                    </a>
                    <a href="#contact" class="nav-item nav-link">
                        Contact
                    </a>
                </div>
            </div>
        </div> <!-- /.container -->
    </nav>
    
    <!-- Main intro image & greeting -->
    <div id="landing" class="vert-center">
        <div class="container">
            <article class="jumbotron row vert-center">
                <section class="col-lg-8 col-md-7 text-center">
                    <h1 class="display-3">
                        Nicko Here!
                    </h1>
                    <p>
                        Passionate about creating clean, readable code for all things web. 
                        <br>
                        I like to focus on front-end development with user experience always at the forefront of my mind.
                    </p>
                    <hr class="divider">
                    <p>
                        Javascript, HTML, CSS, Git/Github
                    </p>
                    <p>
                    <a href="#contact" class="btn btn-success btn-lg" role="button">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        Contact me
                    </a>
                </p>
                </section>
                <section class="col-lg-4 col-md-5">
                    <img src="./assets/imgs/avatar.jpg" class="rounded-circle img-fluid" alt="Photo of Nicko J. Ruddock">
                </section>
            </article>
        </div>
    </div>

    <!-- portfolio section -->
    <article id="portfolio" class="container">
        
        <div class="row">
            <section class="col">
                <h2 class="text-center">
                    Portfolio
                </h2>
            </section>
        </div>
        
        <div class="row justify-content-center">
            
            <section class="col-lg-6 portfolio-sect">
                <div class="card text-center">
                    <a href="https://codepen.io/GingerNinjaNicko/full/MoMPam" target="_blank">
                        <img src="./assets/imgs/screenshots/tl_email.png" alt="Screenshot of the 'Total Loss Email Generator'" title="View code on Codepen" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            TL Email Generator
                        </h4>
                        <h6 class="card-subtitle text-muted">
                            Killing complexity
                        </h6>
                        <hr class="divider">
                        <p class="card-text">
                            I love identifying problems and tackling them head on, which is why I tackled the complexity of total loss emails, creating this app to minimise user error. JavaScript is used to update the template in real time, activating the logic for calculations and adding legal text where necessary to create a comprehensive & accurate document. The entire process takes around one minute compared to over five if written from scratch!
                        </p>
                        <a href="https://codepen.io/GingerNinjaNicko/full/MoMPam" title="View code on Codepen" target="_blank" class="btn btn-success" role="button">
                            <i class="fa fa-codepen" aria-hidden="true"></i>
                            View App
                        </a>
                         <a href="#" title="View article on Medium" target="_blank" class="disabled btn btn-success" role="button" aria-disabled="true">
                            <i class="fa fa-medium" aria-hidden="true"></i>
                            Read Article
                        </a>
                    </div>
                </div>
            </section>
            
            <section class="col-lg-6 portfolio-sect">
                <div class="card text-center">
                    <a href="https://codepen.io/GingerNinjaNicko/full/EvYzJQ" target="_blank">
                        <img src="./assets/imgs/screenshots/claims_journey.png" alt="Screenshot of the 'Customer Journey Map'" title="View code on Codepen" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            The Customer Journey Map
                        </h4>
                        <h6 class="card-subtitle text-muted">
                            Interactive user experiences
                        </h6>
                        <hr class="divider">
                        <p class="card-text">
                            I am passionate about building fantastic user experiences which are responsive on all devices. For example, when I took my colleagues design for the ‘Motor Claims Journey’ and transformed it into an exciting user map with a mix of CSS animation, media queries and a touch of JavaScript to organise the data in a way that’s easy to follow. I've changed the data for demo purposes, but this app was a hit with higher management.
                        </p>
                        <a href="https://codepen.io/GingerNinjaNicko/full/EvYzJQ" title="View code on Codepen" target="_blank" class="btn btn-success" role="button">
                            <i class="fa fa-codepen" aria-hidden="true"></i>
                            View App
                        </a>
                         <a href="#" title="View article on Medium" target="_blank" class="btn btn-success disabled" role="button" aria-disabled="true">
                            <i class="fa fa-medium" aria-hidden="true"></i>
                            Read Article
                        </a>
                    </div>
                </div>
            </section>
            
            <section class="col-lg-6 portfolio-sect">
                <div class="card text-center">
                    <a href="http://NickoJRuddock.com">
                        <img src="./assets/imgs/screenshots/portfolio.png" alt="Screenshot of Nicko's web portfolio" title="View webpage" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            Portfolio
                        </h4>
                        <h6 class="card-subtitle text-muted">
                            Putting my stamp on the web
                        </h6>
                        <hr class="divider">
                        <p class="card-text">
                            For this page, I set myself a deadline to design & build the entire site in just one week. To begin I thoroughly researched and designed my site before even touching the code because I find if I'm prepared then the development flows alot smoother. Since I knew I didn't have much time, I decided to utilise the latest version of <a href="https://getbootstrap.com">Bootstrap</a> to get me up and running in style as quick as possible.
                        </p>
                        <a href="http://NickoJRuddock.com" title="View webpage" class="btn btn-success" role="button">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            View App
                        </a>
                         <a href="#" title="View article on Medium" target="_blank" class="disabled btn btn-success" role="button" aria-disabled="true">
                            <i class="fa fa-medium" aria-hidden="true"></i>
                            Read Article
                        </a>
                    </div>
                </div>
            </section>
            
        </div>
    </article>

    <!-- contact section -->
    <article id="contact" class="container">
        <div class="row justify-content-md-center">
            <section class="col  col-lg-10">
                <h2 class="text-center">
                    Contact
                </h2>
                <div class="row">
                    <!-- description text -->
                    <section class="col-md-6 vert-center text-center">
                        <div>
                            <p>
                                 Thank you for your time spent viewing my domain.
                            </p>
                            <p>
                                If you like what you see, feel free to contact me using the contact form below.
                                I always try to respond to messages within 48 hours so you know your message is in safe hands!
                            </p>
                            <p>
                                <a href="https://codepen.io/GingerNinjaNicko/" target="_blank">
                                    <i title="Visit my Codepen page" class="fa fa-codepen" aria-hidden="true"></i>
                                </a>
                                <a href="https://github.com/GingerNinjaNicko" target="_blank">
                                    <i title="Visit my Github page" class="fa fa-github" aria-hidden="true"></i>
                                </a>
                                <a href="https://medium.com/@GingerNinjaNick" target="_blank">
                                    <i title="Visit my Medium page" class="fa fa-medium" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.facebook.com/GingerNinjaNick" target="_blank">
                                    <i title="Visit my Facebook page" class="fa fa-facebook-official" aria-hidden="true"></i>
                                </a>
                                <!--
                                <a href="https://www.linkedin.com/in/gingerninjanicko/">
                                    <i title="Visit my Linkedin page" class="fa fa-linkedin-square" aria-hidden="true"></i>
                                </a>
                                -->
                            </p>
                        </div>
                    </section>
                    
                    <section class="col-md-6">
                        <!-- img source: https://pixabay.com/en/contact-visit-letters-email-mail-2794680/ -->
                        <div class="vert-center">
                            <img src="./assets/imgs/contact-crop.png" id="contact-img" class="img-fluid" alt="Flying mail image">
                        </div>
                    </section>
                </div>
                <div class="row">
                    
                    <!-- Form submits to itself with no action tag if JavaScript disabled -->
                    <!-- Each input uses php to check whether field present in error array after submission & also to keep value after page reload  -->
                    <section class="col-12">
                        <form method="POST" class="row">
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Your name">
                                <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Your email">
                            </div>
                            
                            <div class="col-md-6">
                                <textarea id="msg" name="msg" class="form-control form-control-lg" placeholder="Your message"></textarea>
                            </div>
                            <div class="col-md-6 input-group input-group-lg">
                                <label for="robot" class="input-group-addon">
                                    Are you a Robot?
                                </label>
                                <input type="text" id="robot" name="robot" class="form-control form-control-lg" placeholder="Type 'no'">
                            </div>

                            <div class="col-md-6">
                                <input type="submit" id="submit" class="form-control  btn btn-lg btn-success" value="Send message">
                            </div>
                        </form>
                    </section>
                </div>
            </section> <!-- ./col -->
        </div> <!-- ./row -->
    </article>
    
    <footer>
        <div class="container">
            <span>
                &copy; Copyright 2017 Nicko J. Ruddock
            </span>
        </div>
    </footer>

    <!-- Javascript files -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/js/index.js"></script>

</body>
</html>