document.addEventListener("DOMContentLoaded", function () {
  const video = document.querySelector(".hero-video");

  // Add loading state
  video.addEventListener("loadstart", () => {
    video.classList.add("loading");
  });

  video.addEventListener("canplay", () => {
    video.classList.remove("loading");
  });
});
