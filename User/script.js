document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("bookingForm");
  if (form) {
    form.addEventListener("submit", e => {
      e.preventDefault();
      alert("Your booking has been submitted successfully!");
    });
  }
});
