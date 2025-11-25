class GrammarExercise {
  constructor() {
    this.score = 0;
    this.totalQuestions = 0;
    this.answeredQuestions = new Set(); // Track answered (correct)
    this.attemptedQuestions = new Set(); // Track all attempts
    this.init();
  }

  init() {
    // Count total questions
    this.totalQuestions =
      document.querySelectorAll(".grammar-question").length +
      document.querySelectorAll(".compound-question").length;

    // Setup question handlers
    this.setupSimpleQuestions();
    this.setupCompoundQuestions();

    // Setup button handlers
    this.setupButtons();

    // Initialize progress display
    this.updateProgress();
  }

  setupSimpleQuestions() {
    const grammarQuestions = document.querySelectorAll(".grammar-question");

    grammarQuestions.forEach((select, index) => {
      select.addEventListener("change", (e) => {
        const selectedValue = e.target.value;
        const correctValue = e.target.dataset.correct;
        const resultElement = e.target
          .closest(".card")
          .querySelector(".result");

        // Generate unique ID if missing
        const questionId = e.target.id || e.target.name || `simple-q-${index}`;

        // Skip if "blank" selected (user deselected)
        if (selectedValue === "blank") {
          resultElement.textContent = "";
          this.attemptedQuestions.delete(questionId);
          if (this.answeredQuestions.has(questionId)) {
            this.answeredQuestions.delete(questionId);
            this.score--;
          }
          this.updateProgress();
          return;
        }

        // Mark as attempted
        this.attemptedQuestions.add(questionId);

        // Check if answer is correct
        const isCorrect = selectedValue === correctValue;

        if (isCorrect) {
          resultElement.textContent = "✅ Correct!";
          resultElement.style.color = "green";

          // Track this question as answered correctly
          if (!this.answeredQuestions.has(questionId)) {
            this.answeredQuestions.add(questionId);
            this.score++;
          }
        } else {
          resultElement.textContent = "❌ Try again!";
          resultElement.style.color = "red";

          // If was previously correct, remove from score
          if (this.answeredQuestions.has(questionId)) {
            this.answeredQuestions.delete(questionId);
            this.score--;
          }
        }

        this.updateProgress();
      });
    });
  }

  setupCompoundQuestions() {
    const compoundQuestions = document.querySelectorAll(".compound-question");

    compoundQuestions.forEach((question, index) => {
      const fields = question.querySelectorAll(".compound-field");
      const resultElement = question.querySelector(".compound-result");

      // Generate unique ID if missing
      const questionId =
        question.id || question.dataset.id || `compound-q-${index}`;

      fields.forEach((field) => {
        field.addEventListener("change", () => {
          let allAnswered = true;
          let allCorrect = true;

          // Check if all fields are filled and correct
          fields.forEach((input) => {
            if (input.value === "blank" || input.value === "") {
              allAnswered = false;
            } else if (input.value !== input.dataset.correct) {
              allCorrect = false;
            }
          });

          // Clear result if not all fields are answered
          if (!allAnswered) {
            resultElement.textContent = "";

            // Remove from both tracking sets
            this.attemptedQuestions.delete(questionId);
            if (this.answeredQuestions.has(questionId)) {
              this.answeredQuestions.delete(questionId);
              this.score--;
            }
          }
          // All fields filled - mark as attempted
          else {
            this.attemptedQuestions.add(questionId);

            if (allCorrect) {
              resultElement.textContent =
                question.dataset.correctMsg || "✅ Correct! Well done!";
              resultElement.style.color = "green";

              // Add to correct answers if not already there
              if (!this.answeredQuestions.has(questionId)) {
                this.answeredQuestions.add(questionId);
                this.score++;
              }
            } else {
              resultElement.textContent =
                question.dataset.hint || "❌ Try again!";
              resultElement.style.color = "red";

              // Remove from correct answers if was previously correct
              if (this.answeredQuestions.has(questionId)) {
                this.answeredQuestions.delete(questionId);
                this.score--;
              }
            }
          }

          this.updateProgress();
        });
      });
    });
  }

  setupButtons() {
    const checkButton = document.getElementById("check-score-btn");
    const tryAgainButton = document.getElementById("try-again-btn");

    if (checkButton) {
      checkButton.addEventListener("click", () => this.showScore());
    }

    if (tryAgainButton) {
      tryAgainButton.addEventListener("click", () => this.reset());
    }
  }

  updateProgress() {
    const progressIndicator = document.getElementById("progress-indicator");
    if (progressIndicator) {
      const attemptedCount = this.attemptedQuestions.size;

      // Debug: Log which questions are tracked
      console.log("Attempted questions:", Array.from(this.attemptedQuestions));
      console.log("Total questions:", this.totalQuestions);

      progressIndicator.textContent = `Answered: ${attemptedCount}/${this.totalQuestions}`;

      // Update badge color based on progress
      progressIndicator.className = "badge fs-6";
      if (attemptedCount === 0) {
        progressIndicator.classList.add("bg-secondary");
      } else if (attemptedCount === this.totalQuestions) {
        progressIndicator.classList.add("bg-secondary");
      } else {
        progressIndicator.classList.add("bg-secondary");
      }
    }
  }

  showScore() {
    const percentage = Math.round((this.score / this.totalQuestions) * 100);

    // Determine feedback
    let emoji = "";
    let feedback = "";
    let message = "";
    let progressColor = "";

    if (percentage >= 90) {
      emoji = "🎉";
      feedback = "Excellent work!";
      message = "You have mastered this grammar!";
      progressColor = "success";
    } else if (percentage >= 70) {
      emoji = "👍";
      feedback = "Good job!";
      message = "You're doing well. Keep practicing!";
      progressColor = "info";
    } else if (percentage >= 50) {
      emoji = "💪";
      feedback = "Keep practicing!";
      message = "You're making progress. Review mistakes and try again.";
      progressColor = "warning";
    } else {
      emoji = "📚";
      feedback = "Review and try again!";
      message = "Take your time to review then try again.";
      progressColor = "danger";
    }

    // Debug: Check if emoji is set
    console.log("Percentage:", percentage);
    console.log("Emoji:", emoji);
    console.log("Feedback:", feedback);

    // Update display elements BEFORE showing modal
    const emojiElement = document.getElementById("score-emoji");
    const feedbackElement = document.getElementById("score-feedback");
    const scoreNumberElement = document.getElementById("score-number");
    const totalQuestionsElement = document.getElementById("total-questions");
    const percentageElement = document.getElementById("score-percentage");
    const messageElement = document.getElementById("score-message");
    const progressBar = document.getElementById("score-progress");

    if (emojiElement) emojiElement.textContent = emoji;
    if (feedbackElement) {
      feedbackElement.textContent = feedback;
      feedbackElement.className = `mb-3 text-${progressColor}`;
    }
    if (scoreNumberElement) {
      scoreNumberElement.textContent = this.score;
      scoreNumberElement.className = `display-4 fw-bold text-${progressColor}`;
    }
    if (totalQuestionsElement) {
      totalQuestionsElement.textContent = this.totalQuestions;
    }
    if (percentageElement) {
      percentageElement.textContent = `${percentage}%`;
    }
    if (messageElement) {
      messageElement.textContent = message;
    }

    // Update progress bar
    if (progressBar) {
      progressBar.className = `progress-bar bg-${progressColor} progress-bar-striped progress-bar-animated`;
      progressBar.style.width = "0%";
    }

    // Show the modal AFTER updating content
    const scoreModal = new bootstrap.Modal(
      document.getElementById("scoreModal")
    );
    scoreModal.show();

    // Animate progress bar after modal is shown
    setTimeout(() => {
      if (progressBar) {
        progressBar.style.width = `${percentage}%`;
      }
    }, 300);
  }

  reset() {
    // Reset tracking
    this.score = 0;
    this.answeredQuestions.clear();
    this.attemptedQuestions.clear();

    // Reset simple questions
    document.querySelectorAll(".grammar-question").forEach((select) => {
      select.value = "blank";
      const result = select.closest(".card")?.querySelector(".result");
      if (result) result.textContent = "";
    });

    // Reset compound questions
    document.querySelectorAll(".compound-field").forEach((field) => {
      field.value = "blank";
    });

    document.querySelectorAll(".compound-result").forEach((result) => {
      result.textContent = "";
    });

    // Hide modal if visible
    const modalElement = document.getElementById("scoreModal");
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
      modalInstance.hide();
    }

    this.updateProgress();

    // Show toast notification instead of alert
    this.showToast("Exercise reset! Try again. 📝");
  }

  showToast(message) {
    // Create toast element
    const toastHTML = `
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show" role="alert">
          <div class="toast-header bg-secondary text-dark">
            <strong class="me-auto">🔄 Reset Complete</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
          </div>
          <div class="toast-body">
            ${message}
          </div>
        </div>
      </div>
    `;

    // Add to page
    const toastContainer = document.createElement("div");
    toastContainer.innerHTML = toastHTML;
    document.body.appendChild(toastContainer);

    // Auto remove after 3 seconds
    setTimeout(() => {
      toastContainer.remove();
    }, 3000);
  }
}

// Initialize when DOM loads
document.addEventListener("DOMContentLoaded", () => {
  new GrammarExercise();
});
