document.addEventListener("DOMContentLoaded", function () {
  fetchProducts();
});

function fetchProducts() {
  fetch("Backend/get_products.php")
    .then((response) => response.json())
    .then((products) => {
      let productList = document.getElementById("product-list");
      products.forEach((product) => {
        let productCard = `
                    <div class="col-md-3 mb-4 cardbox">
                        <div class="card">
                            <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">Price: $${product.price}</p>
                                <button class="btn btn-success" onclick="addToCart(${product.id})"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>`;
        productList.innerHTML += productCard;
      });
    });
}
