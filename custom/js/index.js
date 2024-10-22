function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

document.getElementById("menuToggle").addEventListener("click", openNav);

document.addEventListener("DOMContentLoaded", function () {
  var dropdowns = document.querySelectorAll(".dropdown-toggle");
  dropdowns.forEach(function (dropdown) {
    dropdown.addEventListener("click", function (event) {
      // event.preventDefault();
      var dropdownMenu = this.nextElementSibling;
      dropdownMenu.classList.toggle("show");
    });
  });

  window.addEventListener("click", function (event) {
    if (!event.target.matches(".dropdown-toggle")) {
      var dropdowns = document.getElementsByClassName("dropdown-menu");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains("show")) {
          openDropdown.classList.remove("show");
        }
      }
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".nav-item.dropdown");

  dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("mouseenter", function () {
      const dropdownMenu = this.querySelector(".dropdown-menu");
      dropdownMenu.classList.add("show");
    });

    dropdown.addEventListener("mouseleave", function () {
      const dropdownMenu = this.querySelector(".dropdown-menu");
      dropdownMenu.classList.remove("show");
    });
  });
});

function togglePassword() {
  const passwordInput = document.getElementById("password");
  const toggleButton = passwordInput.nextElementSibling;
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleButton.textContent = "Hide";
  } else {
    passwordInput.type = "password";
    toggleButton.textContent = "Show";
  }
}

const brands = {
  A: [
    { name: "Abarth", count: 350 },
    { name: "AC", count: 1 },
    { name: "Alfa Romeo", count: 593 },
    { name: "Aston Martin", count: 224 },
    { name: "Audi", count: 17305 },
  ],
  B: [
    { name: "Bentley", count: 469 },
    { name: "BMW", count: 16572 },
    { name: "BMC", count: 1 },
    { name: "Bugatti", count: 3 },
  ],
  C: [
    { name: "Cadillac", count: 21 },
    { name: "Chevrolet", count: 372 },
    { name: "Citroen", count: 5791 },
    { name: "Chrysler", count: 142 },
  ],
  D: [
    { name: "Dacia", count: 1327 },
    { name: "Dodge", count: 78 },
    { name: "DAF Trucks", count: 3 },
  ],
};

for (let i = 69; i <= 90; i++) {
  const letter = String.fromCharCode(i);
  if (!brands[letter]) {
    brands[letter] = [
      { name: `${letter}rand 1`, count: Math.floor(Math.random() * 1000) },
      { name: `${letter}rand 2`, count: Math.floor(Math.random() * 1000) },
    ];
  }
}

const brandContainer = document.getElementById("brandContainer");

Object.keys(brands).forEach((letter) => {
  const colDiv = document.createElement("div");
  colDiv.className = "col-md-3 col-sm-6 mb-4";

  const letterCard = document.createElement("div");
  letterCard.className = "letter-card";

  const letterHeader = document.createElement("div");
  letterHeader.className = "letter-header";
  letterHeader.textContent = letter;
  letterHeader.addEventListener("click", () => toggleContent(letterContent));

  const letterContent = document.createElement("div");
  letterContent.className = "letter-content";

  brands[letter].forEach((brand) => {
    const brandItem = document.createElement("div");
    brandItem.className = "brand-item";

    const brandLogo = document.createElement("div");
    brandLogo.className = "brand-logo";
    brandLogo.textContent = brand.name[0];

    const brandInfo = document.createElement("div");
    brandInfo.innerHTML = `<span class="brand-name">${brand.name}</span><span class="brand-count">(${brand.count})</span>`;

    brandItem.appendChild(brandLogo);
    brandItem.appendChild(brandInfo);
    letterContent.appendChild(brandItem);
  });

  letterCard.appendChild(letterHeader);
  letterCard.appendChild(letterContent);
  colDiv.appendChild(letterCard);
  brandContainer.appendChild(colDiv);
});

function toggleContent(content) {
  if (content.style.display === "block") {
    content.style.display = "none";
  } else {
    content.style.display = "block";
  }
}
let slideIndex = 1;
const slides = document.getElementsByClassName("custom-slide");
const dots = document.getElementsByClassName("custom-dot");

// Function to show a specific slide
function showSlides(n) {
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  // Hide all slides
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Remove the "custom-active" class from all dots
  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" custom-active", "");
  }

  // Display the current slide and mark its corresponding dot as active
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " custom-active";
}

// Function to advance to the next slide
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Function to navigate to a specific slide
function currentSlide(n) {
  showSlides((slideIndex = n));
}

// Automatically advance to the next slide every 3 seconds (3000 milliseconds)
setInterval(function () {
  plusSlides(1);
}, 5000);

// Initialize the slider
showSlides(slideIndex);






















