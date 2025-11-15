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
          // Check if any field is still unselected
          if (input.value === "blank") {
            allAnswered = false;
          }
          // Check the answer against the value in data-correct
          else if (input.value !== input.dataset.correct) {
            allCorrect = false;
          }
        });

        if (!allAnswered) {
          // Do not display any feedback until all selections are made.
          resultElement.textContent = "";
        } else if (allCorrect) {
          resultElement.textContent = "Correct! Well done!";
          resultElement.style.color = "green";
        } else {
          resultElement.textContent = "Try again!";
          resultElement.style.color = "red";
        }
      });
    });
  });
});
