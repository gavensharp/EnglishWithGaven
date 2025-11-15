document
  .getElementById("quizForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let score = 0;
    for (let i = 1; i <= 5; i++) {
      const answer =
        document.querySelector('input[name="q' + i + '"]:checked')?.value || 0;
      score += parseFloat(answer);
    }

    let level = calculateLevel(score);
    displayResults(level);
  });

function calculateLevel(score) {
  if (score <= 1) {
    return "A1";
  } else if (score <= 2) {
    return "A2";
  } else if (score <= 3) {
    return "B1";
  } else if (score <= 4) {
    return "B2";
  } else {
    return "C1";
  }
}

function displayResults(level) {
  let levelText = "";
  let descriptionText = "";

  switch (level) {
    case "A1":
      levelText = "A1 - Beginner";
      descriptionText =
        "You can understand and use familiar everyday expressions and very basic phrases.";
      break;
    case "A2":
      levelText = "A2 - Elementary";
      descriptionText =
        "You can communicate in simple and routine tasks requiring a direct exchange of information.";
      break;
    case "B1":
      levelText = "B1 - Intermediate";
      descriptionText =
        "You can understand the main points of clear standard input on familiar matters regularly encountered in work, school, or leisure.";
      break;
    case "B2":
      levelText = "B2 - Upper Intermediate";
      descriptionText =
        "You can produce clear, detailed text on a wide range of subjects and explain a viewpoint on a topical issue giving the advantages and disadvantages of various options.";
      break;
    case "C1":
      levelText = "C1 - Advanced";
      descriptionText =
        "You can understand a wide range of demanding, longer texts, and recognize implicit meaning.";
      break;
    default:
      levelText = "Unable to determine level.";
      descriptionText = "Please try again.";
  }

  document.getElementById("level").textContent = levelText;
  document.getElementById("description").textContent = descriptionText;
  document.getElementById("results").style.display = "block";
}
