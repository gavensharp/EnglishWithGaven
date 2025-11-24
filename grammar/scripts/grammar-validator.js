// Wait until DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  // Get all grammar select elements
  const grammarQuestions = document.querySelectorAll(".grammar-question");

  grammarQuestions.forEach((select) => {
    select.addEventListener("change", function () {
      const selectedValue = this.value;
      const correctValue = this.dataset.correct;

      // Find the result element within the same card
      const resultElement = this.closest(".card").querySelector(".result");

      if (selectedValue === correctValue) {
        resultElement.textContent = "✅ Correct!";
        resultElement.style.color = "green";
      } else {
        resultElement.textContent = "❌ Try again!";
        resultElement.style.color = "red";
      }
    });
  });
});

// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  const compoundQuestions = document.querySelectorAll(".compound-question");

  compoundQuestions.forEach((question) => {
    const fields = question.querySelectorAll(".compound-field");
    const resultElement = question.querySelector(".compound-result");

    // Attach an event listener to each compound field
    fields.forEach((field) => {
      field.addEventListener("change", () => {
        let allAnswered = true;
        let allCorrect = true;

        fields.forEach((input) => {
          if (input.value === "blank") {
            allAnswered = false;
          } else if (input.value !== input.dataset.correct) {
            allCorrect = false;
          }
        });

        if (!allAnswered) {
          resultElement.textContent = "";
        } else if (allCorrect) {
          // Use the custom message set in a data attribute:
          resultElement.textContent =
            question.dataset.correctMsg || "Correct! Well done!";
          resultElement.style.color = "green";
        } else {
          // Use the hint stored in your compound question container:
          resultElement.textContent = question.dataset.hint || "Try again!";
          resultElement.style.color = "red";
        }
      });
    });
  });
});
