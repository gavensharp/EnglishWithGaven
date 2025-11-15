// Shuffle words and add drag & drop functionality for each sentence exercise

document.addEventListener("DOMContentLoaded", () => {
  // Get all sentence exercises
  const sentenceExercises = document.querySelectorAll(".sentence-exercise");

  sentenceExercises.forEach((exercise) => {
    const wordsContainer = exercise.querySelector(".words-column");
    // Shuffle words in this container
    shuffleWords(wordsContainer);

    // Attach drag & drop for each word-box in this container
    addDragAndDrop(wordsContainer);

    // Attach check button handler
    const checkBtn = exercise.querySelector(".check-btn");
    const resultMsg = exercise.querySelector(".result-msg");
    checkBtn.addEventListener("click", () => {
      // Create current sentence from the words in this container
      const currentSentence = Array.from(
        wordsContainer.querySelectorAll(".word-box")
      )
        .map((word) => word.textContent)
        .join(" ");
      // Define the correct sentence for each exercise if needed.
      // For this example, we'll assume both exercises have their own correct sentence.
      let correctSentence = "";
      if (exercise.querySelector("h3").textContent.includes("Sentence 1")) {
        correctSentence = "The cat sits on the table";
      } else if (
        exercise.querySelector("h3").textContent.includes("Sentence 2")
      ) {
        correctSentence = "The table is under the cat";
      }

      if (currentSentence === correctSentence) {
        resultMsg.textContent = "Correct! Well done!";
        resultMsg.style.color = "green";
      } else {
        resultMsg.textContent = "Try again!";
        resultMsg.style.color = "red";
      }
    });
  });
});

// Shuffle function
function shuffleWords(container) {
  const wordBoxes = Array.from(container.querySelectorAll(".word-box"));
  wordBoxes.sort(() => Math.random() - 0.5);
  wordBoxes.forEach((word) => container.appendChild(word));
}

// Drag & drop functionality function
function addDragAndDrop(container) {
  const wordBoxes = container.querySelectorAll(".word-box");
  let draggedItem = null;

  wordBoxes.forEach((box) => {
    box.addEventListener("dragstart", function () {
      draggedItem = this;
      setTimeout(() => this.classList.add("dragging"), 0);
    });

    box.addEventListener("dragend", function () {
      this.classList.remove("dragging");
    });

    box.addEventListener("dragover", function (e) {
      e.preventDefault();
    });

    box.addEventListener("drop", function (e) {
      e.preventDefault();
      if (this !== draggedItem) {
        const boxes = [...container.querySelectorAll(".word-box")];
        const draggedIndex = boxes.indexOf(draggedItem);
        const droppedIndex = boxes.indexOf(this);

        if (draggedIndex < droppedIndex) {
          this.parentNode.insertBefore(draggedItem, this.nextSibling);
        } else {
          this.parentNode.insertBefore(draggedItem, this);
        }
      }
    });
  });
}
