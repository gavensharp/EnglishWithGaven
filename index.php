<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/index.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>English with Gaven - Home</title>
  <?php include 'partials/head-meta.php'; ?>
  <link rel="stylesheet" href="css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/video.js"></script>


</head>

<body>

  <header class="header">
    <?php include 'partials/navbar.php'; ?>
  </header>

  <main>

    <section class="hero bg-cover bg-accent mt-2 p-5">
      <div class="container">
        <div class="row align-items-center">
          <!-- Hero Content on the Left -->
          <div class="col-md-6 hero-content">

            <h1 class="fs-4 pb-3">Welcome to English with Gaven!</h1>

            <p>Premium Online English Tutoring, Customized for Your Success</p>

            <a href="signup.html">
              <button class="btn btn-primary mt-3">Get Started</button>
            </a>
          </div>

          <!-- Hero Video on the Right -->
          <div class="col-md-6 hero-image text-center mt-4">
            <div class="ratio ratio-16x9" style="border-radius: 20px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
              <iframe
                src="https://www.youtube.com/embed/sJ7a7FAJirQ?si=o6bBgKfOURkAM6GF"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
                loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
    </section>

    <section class="services pt-3">
      <div class="container">
        <h2 class="fs-5 text-center mt-4 mb-5">Custom Online English Lessons</h2>

        <div class="row text-center">
          <!-- Skill 1 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/speaking-english.png" alt="Speaking English Icon" class="img-fluid mb-2" width="80" height="80">
              <p>Speaking English</p>
            </div>
          </div>

          <!-- Skill 2 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/travel-english.png" alt="Travel English Icon" class="img-fluid mb-2" width="80" height="80">
              <p>English for Travel</p>
            </div>
          </div>

          <!-- Skill 3 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/study-english.png" alt="Study English Icon" class="img-fluid mb-2" width="80" height="80">
              <p>English for Study</p>
            </div>
          </div>

          <!-- Skill 4 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/work-english.png" alt="Work English Icon" class="img-fluid mb-2" width="80" 80">
              <p>English for Work</p>
            </div>
          </div>

          <!-- Skill 5 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/grammar-english.png" alt="Grammar English Icon" class="img-fluid mb-2" width="80" height="80">
              <p>English Grammar</p>
            </div>
          </div>

          <!-- Skill 6 -->
          <div class="col-md-4 col-lg-2 mb-4">
            <div class="d-flex flex-column align-items-center">
              <img src="site-images/kids-english.png" alt="Kids English Icon" class="img-fluid mb-2" width="80" height="80">
              <p>English for Kids</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="get-started py-5 px-4">
      <div class="steps-container">
        <h2 class="fs-5 text-center mb-5">How to Get Started</h2>
        <div class="row">
          <!-- Step 1 Card -->
          <div class="col-12 col-md-6 mb-4">
            <div class="card h-100 text-center p-3">
              <h3 class="fs-5 card-title">Step 1</h3>
              <p class="card-text">Sign Up/Register your name and email. Upload your profile picture.</p>
            </div>
          </div>

          <!-- Step 2 Card -->
          <div class="col-12 col-md-6 mb-4">
            <div class="card h-100 text-center p-3">
              <h3 class="fs-5 card-title">Step 2</h3>
              <p class="card-text">Select your plan to get started. <a href="https://calendar.google.com/calendar/embed?src=englishwithgaven%40gmail.com&ctz=Asia%2FJakarta" target="_blank">View</a> Gaven's availability schedule. <a href="contact.html">Contact</a> Gaven to confirm your lesson times. Starting with a free 10-minute video call for an introduction.</p>
            </div>
          </div>

          <!-- Step 3 Card -->
          <div class="col-12 col-md-6 mb-4">
            <div class="card h-100 text-center p-3">
              <h3 class="fs-5 card-title">Step 3</h3>
              <p class="card-text">Select video call application. Popular choices include Zoom, Google Meet, and Microsoft Teams. Or use the default video call application.</p>
            </div>
          </div>

          <!-- Step 4 Card -->
          <div class="col-12 col-md-6 mb-4">
            <div class="card h-100 text-center p-3">
              <h3 class="fs-5 card-title">Step 4</h3>
              <p class="card-text">Make sure you have confirmed your lesson times with Gaven. Complete monthly payment via PayPal. And we are ready!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="pricing" class="bg-light mt-5 px-4">
      <div class="container-lg">
        <h2 class="fs-4 text-center">Pricing Plans</h2>
        <p class="text-center text-muted mb-5">Tailored for students, professionals and families. Schedule 60-minute sessions or 30-minute sessions. All plans include personalized lesson plans and progress tracking.</p>
      </div>
      <div class="row my-5 align-items-center justify-content-center">
        <!-- Adult Professional Plan -->
        <div class="col-8 col-lg-4 col-xl-3">
          <div class="card border-0">
            <div class="card-body text-center py-4">
              <h3 class="fs-5 card-title">Starter Plan</h3>
              <p class="lead text-muted">One hour per week</p>
              <p class="display-7 my-4 text-primary fw-bold">$119/month</p>
              <a href="signup.html" class="btn btn-outline-primary btn-lg mt-3">Get Started</a>
            </div>
          </div>
        </div>
        <!-- Family/Kids Plan (Most Popular) -->
        <div class="col-9 col-lg-4">
          <div class="card border-primary border-0">
            <div class="card-header text-center text-primary">Most Popular</div>
            <div class="card-body text-center py-5">
              <h3 class="fs-5 card-title">Immersion Plan</h3>
              <p class="lead text-muted">Two hours per week</p>
              <p class="display-6 my-4 text-primary fw-bold">$199/month</p>
              <a href="signup.html" class="btn btn-outline-primary btn-lg mt-3">Get Started</a>
            </div>
          </div>
        </div>
        <!-- Advanced Plan -->
        <div class="col-8 col-lg-4 col-xl-3">
          <div class="card border-0">
            <div class="card-body text-center py-4">
              <h3 class="fs-5 card-title">Deep Learning Plan</h3>
              <p class="lead text-muted">Three hours per week</p>
              <p class="display-7 my-4 text-primary fw-bold">$239/month</p>
              <a href="signup.html" class="btn btn-outline-primary btn-lg mt-3">Get Started</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mb-5">
        <p class="text-muted">Free 10 minute trial lesson included. Get started today!</p>
      </div>
    </section>

  </main>

  <footer class="bg-light mb-5">
    <?php include 'partials/footer.php'; ?>
  </footer>

</body>

</html>