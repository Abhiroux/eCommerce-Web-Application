document.addEventListener("DOMContentLoaded", function () {
  fetchTshirt();
  fetchShorts();
  fetchTrousers();
  fetchJacket();
  fetchBlouse();
});

function fetchTshirt() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list-tshirt");
      products.forEach((product) => {
        if (product.type === "Shirt") {
          let productCard = `
                    <div class="col-md-3 mb-4 cardbox">
                          <div class="card">
                              <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                              <div class="card-body">
                                  <h5 class="card-title">${product.name}</h5>
                                  <p class="card-text">${product.description}</p>
                                  <p class="card-text">Price: $${product.price}</p>
                                  <button class="add-to-cart-btn btn btn-success" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-url="${product.image_url}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>                              </div>
                          </div>
                      </div>`;
          productList.innerHTML += productCard;
        }
      });
    });
}

function fetchShorts() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list-shorts");
      products.forEach((product) => {
        if (product.type === "Shorts") {
          let productCard = `
                      <div class="col-md-3 mb-4 cardbox">
                          <div class="card">
                              <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                              <div class="card-body">
                                  <h5 class="card-title">${product.name}</h5>
                                  <p class="card-text">${product.description}</p>
                                  <p class="card-text">Price: $${product.price}</p>
                                  <button class="add-to-cart-btn btn btn-success" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-url="${product.image_url}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>                              </div>
                          </div>
                      </div>`;
          productList.innerHTML += productCard;
        }
      });
    });
}

function fetchTrousers() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list-Trousers");
      products.forEach((product) => {
        if (product.type === "Trousers") {
          let productCard = `
                        <div class="col-md-3 mb-4 cardbox">
                          <div class="card">
                              <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                              <div class="card-body">
                                  <h5 class="card-title">${product.name}</h5>
                                  <p class="card-text">${product.description}</p>
                                  <p class="card-text">Price: $${product.price}</p>
                                  <button class="add-to-cart-btn btn btn-success" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-url="${product.image_url}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>                              </div>
                          </div>
                      </div>`;
          productList.innerHTML += productCard;
        }
      });
    });
}

function fetchJacket() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list-Jacket");
      products.forEach((product) => {
        if (product.type === "Jacket") {
          let productCard = `
                          <div class="col-md-3 mb-4 cardbox">
                          <div class="card">
                              <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                              <div class="card-body">
                                  <h5 class="card-title">${product.name}</h5>
                                  <p class="card-text">${product.description}</p>
                                  <p class="card-text">Price: $${product.price}</p>
                                  <button class="add-to-cart-btn btn btn-success" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-url="${product.image_url}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>                              </div>
                          </div>
                      </div>`;
          productList.innerHTML += productCard;
        }
      });
    });
}

function fetchBlouse() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list-Blouse");
      products.forEach((product) => {
        if (product.type === "Blouse") {
          let productCard = `
                      <div class="col-md-3 mb-4 cardbox">
                          <div class="card">
                              <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                              <div class="card-body">
                                  <h5 class="card-title">${product.name}</h5>
                                  <p class="card-text">${product.description}</p>
                                  <p class="card-text">Price: $${product.price}</p>
                                  <button class="add-to-cart-btn btn btn-success" data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-url="${product.image_url}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>                              </div>
                          </div>
                      </div>`;
          productList.innerHTML += productCard;
        }
      });
    });
}

//jquery to add items in cart
$(document).ready(function () {
  // Delegated event listener for dynamically generated .add-to-cart-btn elements
  $(document).on("click", ".add-to-cart-btn", function () {
    const productId = $(this).data("id");
    const productName = $(this).data("name");
    const productPrice = $(this).data("price");
    const productImage = $(this).data("url");

    console.log("Add to Cart clicked"); // Check if button click is registered
    console.log("Product ID:", productId); // Check product data
    console.log("Product Name:", productName);
    console.log("Product Price:", productPrice);
    console.log("Product Image URL:", productImage);

    $.ajax({
      url: "Backend/add_to_cart.php",
      method: "POST",
      data: {
        id: productId,
        name: productName,
        price: productPrice,
        Image: productImage,
      },
      success: function (response) {
        alert("Item added to cart!");
      },
      error: function () {
        alert("There was an error adding the item to the cart.");
      },
    });
  });
});
