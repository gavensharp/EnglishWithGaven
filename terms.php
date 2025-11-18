<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO Meta Tags -->
  <meta name="description" content="Terms and Conditions for English with Gaven. Learn about payment terms, refund policy, cancellation policy, and user responsibilities.">
  <meta name="keywords" content="terms of service, terms and conditions, English lessons policy, refund policy, cancellation policy, English with Gaven">
  <meta name="author" content="English with Gaven">

  <!-- Open Graph Meta Tags for Social Sharing -->
  <meta property="og:title" content="Terms and Conditions | English with Gaven">
  <meta property="og:description" content="Read our terms of service including payment terms, refund policy, and cancellation policy">
  <meta property="og:image" content="site-images/logo.png">
  <meta property="og:url" content="https://englishwithgaven.com/terms.html">
  <meta property="og:type" content="website">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Terms and Conditions | English with Gaven">
  <meta name="twitter:description" content="Read our terms of service including payment and cancellation policies">
  <meta name="twitter:image" content="site-images/logo.png">

  <title>Terms and Conditions | English with Gaven</title>

  <link rel="stylesheet" href="css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <header class="header">
    <?php include 'partials/navbar.php'; ?>
  </header>

  <main>
    <div class="container mt-5 mb-5 pb-5">
      <h1 class="fs-4 mb-5 text-center text-primary">Terms and Conditions</h1>

      <div class="accordion" id="termsAccordion">

        <!-- Introduction -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="termsHeadingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#termsCollapseOne" aria-expanded="true" aria-controls="termsCollapseOne">
              Introduction and Agreement to Terms
            </button>
          </h2>
          <div id="termsCollapseOne" class="accordion-collapse collapse show" aria-labelledby="termsHeadingOne" data-bs-parent="#termsAccordion">
            <div class="accordion-body">
              By using this website, you agree to our terms and conditions. This document outlines key responsibilities and rights for both parties.
            </div>
          </div>
        </div>

        <!-- Eligibility and User Responsibilities -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="termsHeadingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#termsCollapseTwo" aria-expanded="false" aria-controls="termsCollapseTwo">
              Eligibility and User Responsibilities
            </button>
          </h2>
          <div id="termsCollapseTwo" class="accordion-collapse collapse" aria-labelledby="termsHeadingTwo" data-bs-parent="#termsAccordion">
            <div class="accordion-body">
              Users must be over 18 or have parental consent if underage. Users are responsible for providing accurate information and maintaining account security. This includes using a strong password and avoiding unauthorized access.
            </div>
          </div>
        </div>

        <!-- Payment Terms and Refund Policy -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="termsHeadingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#termsCollapseThree" aria-expanded="false" aria-controls="termsCollapseThree">
              Payment Terms and Refund Policy
            </button>
          </h2>
          <div id="termsCollapseThree" class="accordion-collapse collapse" aria-labelledby="termsHeadingThree" data-bs-parent="#termsAccordion">
            <div class="accordion-body">
              All payments, cancellation terms, and refund policies are detailed here.

              <div class="mt-3">
                <strong>Payment Terms:</strong> Lessons will be billed on a monthly basis in USD. Lessons will not begin until payment is confirmed, even if they are already scheduled.
              </div>

              <div class="mt-3">
                <strong>Cancellation Terms:</strong> Lessons can be cancelled by either party up to 1 hour before the scheduled time. To ensure timely processing, a cancellation request email should be sent at least 2 hours in advance.

                <div class="mt-2">
                  <strong>Cancellation by Student:</strong>
                  <ul>
                    <li class="mt-2">If a student cancels a lesson before 1 hour of the scheduled time, it will be rescheduled for the next available date.</li>
                    <li class="mt-2">However, if a student cancels within 1 hour of the scheduled time or after the lesson has started, they will be charged the full amount for the lesson.</li>
                  </ul>
                </div>

                <div class="mt-2">
                  <strong>Cancellation by Tutor:</strong>
                  <ul>
                    <li class="mt-2">If a tutor cancels a lesson before 1 hour of the scheduled time, it will be rescheduled for the next available date.</li>
                    <li class="mt-2">In cases where a tutor cancels within 1 hour of the scheduled time or after the lesson has started, they will provide two make-up lessons on the next available dates.</li>
                  </ul>
                </div>
              </div>

              <div class="mt-3">
                <strong>Refund Policy:</strong> Lessons cannot be refunded but can be rescheduled for the next available date in accordance with our cancellation terms. The only exception for a refund is when a student cancels all remaining lessons with the intention of discontinuing their lessons. In such cases, the student will receive a full refund for any uncompleted lessons scheduled for the month.
              </div>
            </div>
          </div>
        </div>

        <!-- Disclaimer and Limitation of Liability -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="termsHeadingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#termsCollapseFour" aria-expanded="false" aria-controls="termsCollapseFour">
              Disclaimers and Limitation of Liability
            </button>
          </h2>
          <div id="termsCollapseFour" class="accordion-collapse collapse" aria-labelledby="termsHeadingFour" data-bs-parent="#termsAccordion">
            <div class="accordion-body">
              We are not responsible for technical issues or learning outcomes. Liability is limited to the maximum extent allowed by law.
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-light mb-5">
    <?php include 'partials/footer.php'; ?>
  </footer>

</body>

</html>