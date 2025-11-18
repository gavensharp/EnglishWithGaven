<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO Meta Tags -->
  <meta name="description" content="Privacy Policy for English with Gaven. Learn how we collect, use, and protect your personal information and educational data.">
  <meta name="keywords" content="privacy policy, data protection, user privacy, English with Gaven, GDPR compliance">
  <meta name="author" content="English with Gaven">

  <!-- Open Graph Meta Tags for Social Sharing -->
  <meta property="og:title" content="Privacy Policy | English with Gaven">
  <meta property="og:description" content="Learn how English with Gaven protects your personal information and educational data">
  <meta property="og:image" content="site-images/logo.png">
  <meta property="og:url" content="https://englishwithgaven.com/privacy.html">
  <meta property="og:type" content="website">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Privacy Policy | English with Gaven">
  <meta name="twitter:description" content="Learn how we protect your personal information and educational data">
  <meta name="twitter:image" content="site-images/logo.png">

  <title>Privacy Policy | English with Gaven</title>

  <link rel="stylesheet" href="css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <header class="header">
    <?php include 'partials/navbar.php'; ?>
  </header>

  <main>
    <div class="container mt-5 mb-5 pb-5">
      <h1 class="fs-4 mb-5 text-center text-primary">Privacy Policy</h1>

      <div class="accordion" id="privacyAccordion">

        <!-- Introduction and Purpose -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="privacyHeadingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#privacyCollapseOne" aria-expanded="true" aria-controls="privacyCollapseOne">
              Introduction and Purpose
            </button>
          </h2>
          <div id="privacyCollapseOne" class="accordion-collapse collapse show" aria-labelledby="privacyHeadingOne" data-bs-parent="#privacyAccordion">
            <div class="accordion-body">
              Our Privacy Policy outlines how we collect, use, and safeguard user data. We ensure compliance with all relevant data protection laws, providing a secure environment for our users.
            </div>
          </div>
        </div>

        <!-- Data Collection and Types of Information Gathered -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="privacyHeadingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacyCollapseTwo" aria-expanded="false" aria-controls="privacyCollapseTwo">
              Data Collection and Types of Information Gathered
            </button>
          </h2>
          <div id="privacyCollapseTwo" class="accordion-collapse collapse" aria-labelledby="privacyHeadingTwo" data-bs-parent="#privacyAccordion">
            <div class="accordion-body">
              We collect personal information, usage data, and educational information to enhance our services and provide a better user experience. The specific types of information we gather include:

              <div class="numbered-list mt-3">
                <ol>
                  <li>Personal Information: This includes details such as your name, email address, and photo.</li>
                  <li>Usage Data: We track how users interact with our platform, including frequency and purpose of use.</li>
                  <li>Educational Information: This may encompass data on user learning habits, English proficiency level, or other relevant educational metrics.</li>
                </ol>
              </div>
              The primary purpose of collecting this data is to refine the accuracy and effectiveness of our services.
            </div>
          </div>
        </div>

        <!-- Data Sharing and Disclosure -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="privacyHeadingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacyCollapseThree" aria-expanded="false" aria-controls="privacyCollapseThree">
              Sharing and Disclosure of Information
            </button>
          </h2>
          <div id="privacyCollapseThree" class="accordion-collapse collapse" aria-labelledby="privacyHeadingThree" data-bs-parent="#privacyAccordion">
            <div class="accordion-body">
              We are committed to maintaining the confidentiality of user information and will never share it with any external parties outside of our tutoring service.
            </div>
          </div>
        </div>

        <!-- User Rights Regarding Personal Data -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="privacyHeadingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacyCollapseFour" aria-expanded="false" aria-controls="privacyCollapseFour">
              User Rights Regarding Personal Data
            </button>
          </h2>
          <div id="privacyCollapseFour" class="accordion-collapse collapse" aria-labelledby="privacyHeadingFour" data-bs-parent="#privacyAccordion">
            <div class="accordion-body">
              Users can request access, correction, deletion, or transfer of their personal data in accordance with relevant data protection laws.
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