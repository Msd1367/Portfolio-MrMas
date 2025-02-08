document.addEventListener("DOMContentLoaded", () => {
  const ratings = document.querySelectorAll(".testimonial-rating");

  ratings.forEach((ratingElement) => {
      const ratingValue = parseFloat(ratingElement.getAttribute("data-rating"));
      const stars = "★".repeat(Math.round(ratingValue)) + "☆".repeat(5 - Math.round(ratingValue));
      ratingElement.textContent = stars;
  });
});
