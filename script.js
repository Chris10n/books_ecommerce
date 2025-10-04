// ----- CART -----
let cart = [];

function toggleCart() {
  const modal = document.getElementById("cartModal");
  modal.style.display = (modal.style.display === "block") ? "none" : "block";
}

function addToCart(id, title, price) {
  cart.push({id, title, price});
  renderCart();
  toggleCart();
}

function renderCart() {
  const cartItems = document.getElementById("cartItems");
  cartItems.innerHTML = "";
  cart.forEach((item, i) => {
    cartItems.innerHTML += `<p>${item.title} - ₱${item.price} <button onclick="removeItem(${i})">❌</button></p>`;
  });
}

function removeItem(i) {
  cart.splice(i,1);
  renderCart();
}

// ----- INFO MODAL -----
function showInfo(id) {
  const book = bookData.find(b => b.id === id);
  document.getElementById("infoTitle").innerText = book.title;
  document.getElementById("infoAuthor").innerText = "By " + book.author;
  document.getElementById("infoDesc").innerText = book.desc;
  document.getElementById("infoPrice").innerText = "₱" + book.price;
  document.getElementById("infoModal").style.display = "block";
}

function toggleInfo() {
  document.getElementById("infoModal").style.display = "none";
}

// ----- CAROUSEL -----
let currentSlide = 0;
function showSlide(index) {
  const slides = document.querySelectorAll(".slide");
  if (index >= slides.length) currentSlide = 0;
  else if (index < 0) currentSlide = slides.length - 1;
  else currentSlide = index;

  const offset = -currentSlide * 100;
  document.querySelector(".slides").style.transform = `translateX(${offset}%)`;
}
function nextSlide() { showSlide(currentSlide + 1); }
function prevSlide() { showSlide(currentSlide - 1); }

setInterval(nextSlide, 4000); // Auto slide
