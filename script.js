// Form submit confirmation
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (form) {
      form.addEventListener("submit", function (e) {
        alert("Thank you! Your message has been sent.");
      });
    }
  
    // Scroll to top button
    const scrollBtn = document.createElement("button");
    scrollBtn.innerText = "↑ Top";
    scrollBtn.id = "scrollTopBtn";
    scrollBtn.style.display = "none";
    document.body.appendChild(scrollBtn);
  
    scrollBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  
    window.addEventListener("scroll", () => {
      scrollBtn.style.display = window.scrollY > 300 ? "block" : "none";
    });
  
    // Show current date in homepage if element exists
    const dateElem = document.getElementById("currentDate");
    if (dateElem) {
      const now = new Date();
      dateElem.textContent = now.toLocaleString();
    }
  });

  // Lightbox for gallery images
document.addEventListener("DOMContentLoaded", () => {
    const galleryImages = document.querySelectorAll(".gallery-grid img");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
  
    galleryImages.forEach(img => {
      img.style.cursor = "pointer";
      img.addEventListener("click", () => {
        lightbox.style.display = "flex";
        lightboxImg.src = img.src;
      });
    });
  
    lightbox.addEventListener("click", () => {
      lightbox.style.display = "none";
    });
  });
  
  // Dark Mode Toggle
const toggleBtn = document.getElementById("darkToggle");
if (toggleBtn) {
  toggleBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    localStorage.setItem("dark", document.body.classList.contains("dark-mode"));
  });

  // Load mode on refresh
  if (localStorage.getItem("dark") === "true") {
    document.body.classList.add("dark-mode");
  }
}
