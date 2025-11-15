// Shuffle words when page loads
/*
window.onload = function () {
  const container = document.getElementById("sentence-container");
  const words = Array.from(container.children);
  words.sort(() => Math.random() - 0.5);
  words.forEach((word) => container.appendChild(word));
};*/

// Shuffle only the word boxes inside the words column on page load
window.onload = function () {
  // Select the words column (which has order-md-1)
  const wordsContainer = document.querySelector("#sentence-container .order-md-1");
  // Get only the word boxes inside that column
  const words = Array.from(wordsContainer.querySelectorAll(".word-box"));
  words.sort(() => Math.random() - 0.5);
  words.forEach((word) => wordsContainer.appendChild(word));
};

// Check sentence when button is clicked
document.getElementById("checkButton").addEventListener("click", () => {
  const currentSentence = Array.from(document.querySelectorAll(".word-box"))
    .map((word) => word.textContent)
    .join(" ");
  const correctSentence = "The cat sits on the table";

  const resultMessage = document.getElementById("resultMessage");
  if (currentSentence === correctSentence) {
    resultMessage.textContent = "Correct! Well done!";
    resultMessage.style.color = "green";
  } else {
    resultMessage.textContent = "Try again!";
    resultMessage.style.color = "red";
  }
});

// Drag & drop functionality
document.addEventListener("DOMContentLoaded", () => {
  const wordBoxes = document.querySelectorAll(".word-box");
  let draggedItem = null;

  wordBoxes.forEach((box) => {
    box.addEventListener("dragstart", function (e) {
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
        const allItems = [...document.querySelectorAll(".word-box")];
        const draggedIndex = allItems.indexOf(draggedItem);
        const droppedIndex = allItems.indexOf(this);

        if (draggedIndex < droppedIndex) {
          this.parentNode.insertBefore(draggedItem, this.nextSibling);
        } else {
          this.parentNode.insertBefore(draggedItem, this);
        }
      }
    });
  });
});
