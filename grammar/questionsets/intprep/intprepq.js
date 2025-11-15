// Single question check
document.getElementById("answer1").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result1");

  if (answer === "beside") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});

// Compound question 2 check
function checkCompoundAnswer() {
  const answer1 = document.getElementById("answer2-1").value;
  const answer2 = document.getElementById("answer2-2").value;
  const resultDiv = document.getElementById("result2");

  if (answer1 === "above" && answer2 === "beyond") {
    resultDiv.innerHTML =
      '✅ Correct! "Above and beyond" is a common phrase meaning to do more than what is expected.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: This is a common English phrase about exceeding expectations.";
    resultDiv.style.color = "red";
  }
}

// Event listeners for compound question
document
  .getElementById("answer2-1")
  .addEventListener("change", checkCompoundAnswer);
document
  .getElementById("answer2-2")
  .addEventListener("change", checkCompoundAnswer);

  // Compound Question 3 check
function checkThirdQuestion() {
  const answer1 = document.getElementById("answer3-1").value;
  const answer2 = document.getElementById("answer3-2").value;
  const resultDiv = document.getElementById("result3");

  if (answer1 === "through" && answer2 === "among") {
    resultDiv.innerHTML =
      '✅ Correct! The bird flew "across" the forest and landed "among" the trees.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about how the bird moves and where it lands.";
    resultDiv.style.color = "red";
  }
}

// Event listeners for compound question 3
document.getElementById("answer3-1").addEventListener("change", checkThirdQuestion);
document.getElementById("answer3-2").addEventListener("change", checkThirdQuestion);

// Question 4: Single question check
document.getElementById("answer4").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result4");

  if (answer === "at") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
});

// Compound Question 5 check
function checkFifthQuestion() {
  const answer1 = document.getElementById("answer5-1").value;
  const answer2 = document.getElementById("answer5-2").value;
  const resultDiv = document.getElementById("result5");

  if (answer1 === "through" && answer2 === "at") {
    resultDiv.innerHTML =
      '✅ Correct! The car went "through" the tunnel and stopped "at" the stop sign.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about how the car moves and where it stops.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 5
document.getElementById("answer5-1").addEventListener("change", checkFifthQuestion);
document.getElementById("answer5-2").addEventListener("change", checkFifthQuestion);

// Single question 6 check
document.getElementById("answer6").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result6");

  if (answer === "opposite") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});

// Single question 7 check
document.getElementById("answer7").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result7");

  if (answer === "in front of") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});

// Compound Question 8 check
function checkEighthQuestion() {
  const answer1 = document.getElementById("answer8-1").value;
  const answer2 = document.getElementById("answer8-2").value;
  const resultDiv = document.getElementById("result8");

  if (answer1 === "until" && answer2 === "after") {
    resultDiv.innerHTML =
      '✅ Correct! The students stayed "until" the exams began and left "after" finishing their exam.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about the time sequence - they stayed up to a point and then left when something was completed.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 8
document.getElementById("answer8-1").addEventListener("change", checkEighthQuestion);
document.getElementById("answer8-2").addEventListener("change", checkEighthQuestion);

// Single question 9 check
document.getElementById("answer9").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result9");

  if (answer === "since") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});

// Compound Question 10 check
function checkTenthQuestion() {
  const answer1 = document.getElementById("answer10-1").value;
  const answer2 = document.getElementById("answer10-2").value;
  const resultDiv = document.getElementById("result10");

  if (answer1 === "during" && answer2 === "by") {
    resultDiv.innerHTML =
      '✅ Correct! The audience was laughing "during" the show and crying "by" the end.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about when they were laughing (time) and when they were crying (at what point).";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 10
document.getElementById("answer10-1").addEventListener("change", checkTenthQuestion);
document.getElementById("answer10-2").addEventListener("change", checkTenthQuestion);

// Compound Question 11 check
function checkEleventhQuestion() {
  const answer1 = document.getElementById("answer11-1").value;
  const answer2 = document.getElementById("answer11-2").value;
  const resultDiv = document.getElementById("result11");

  if (answer1 === "toward" && answer2 === "into") {
    resultDiv.innerHTML =
      '✅ Correct! The dog ran "toward" the park and dashed "into" the open field.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about the direction of movement - first approaching, then entering.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 11
document.getElementById("answer11-1").addEventListener("change", checkEleventhQuestion);
document.getElementById("answer11-2").addEventListener("change", checkEleventhQuestion);

// Single question 12 check
document.getElementById("answer12").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result12");

  if (answer === "beneath") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});

// Compound Question 13 check
function checkThirteenthQuestion() {
  const answer1 = document.getElementById("answer13-1").value;
  const answer2 = document.getElementById("answer13-2").value;
  const resultDiv = document.getElementById("result13");

  if (answer1 === "adjacent to" && answer2 === "at") {
    resultDiv.innerHTML =
      '✅ Correct! In a right triangle, the height is "adjacent to" the base and is "at" a 90° angle.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about geometric terms - the height's position relative to the base and the angle it forms.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 13
document.getElementById("answer13-1").addEventListener("change", checkThirteenthQuestion);
document.getElementById("answer13-2").addEventListener("change", checkThirteenthQuestion);



// Compound Question 14 check
function checkFourteenthQuestion() {
  const answer1 = document.getElementById("answer14-1").value;
  const answer2 = document.getElementById("answer14-2").value;
  const resultDiv = document.getElementById("result14");

  if (answer1 === "during" && answer2 === "underneath") {
    resultDiv.innerHTML =
      '✅ Correct! "During" winter we wear layers, with a shirt and vest "underneath" the sweater.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about the time period and the position of the clothes.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 14
document.getElementById("answer14-1").addEventListener("change", checkFourteenthQuestion);
document.getElementById("answer14-2").addEventListener("change", checkFourteenthQuestion);

// Compound Question 15 check
function checkFifteenthQuestion() {
  const answer1 = document.getElementById("answer15-1").value;
  const answer2 = document.getElementById("answer15-2").value;
  const resultDiv = document.getElementById("result15");

  if (answer1 === "in" && answer2 === "out") {
    resultDiv.innerHTML =
      '✅ Correct! The children were excited to play "in" the snow and ran "out" the door.';
    resultDiv.style.color = "green";
  } else if (answer1 !== "blank" && answer2 !== "blank") {
    resultDiv.innerHTML =
      "❌ Try again. Hint: Think about where they want to play and their movement through the door.";
    resultDiv.style.color = "red";
  } else {
    resultDiv.innerHTML = "";
  }
}

// Event listeners for compound question 15
document.getElementById("answer15-1").addEventListener("change", checkFifteenthQuestion);
document.getElementById("answer15-2").addEventListener("change", checkFifteenthQuestion);


// Single question 16 check
document.getElementById("answer16").addEventListener("change", function () {
  const answer = this.value;
  const resultDiv = document.getElementById("result16");

  if (answer === "beyond") {
    resultDiv.innerHTML = "✅ Correct!";
    resultDiv.style.color = "green";
  } else if (answer !== "blank") {
    resultDiv.innerHTML = "❌ Try again";
    resultDiv.style.color = "red";
  }
});