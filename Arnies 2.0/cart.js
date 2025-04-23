document.addEventListener("DOMContentLoaded", function () {
  const quantityInputs = document.querySelectorAll(".quantity-input-unique");
  const cartTotalElement = document.getElementById("cart-total-unique");
  const selectItemCheckboxes = document.querySelectorAll(".select-item-unique");

  function updateTotal() {
    let total = 0;
    document.querySelectorAll(".cart-item-unique").forEach((item) => {
      const checkbox = item.querySelector(".select-item-unique");
      if (checkbox.checked) {
        const quantity = parseInt(
          item.querySelector(".quantity-input-unique").value,
          10
        );
        const priceText = item.querySelector(".price-unique").textContent;
        const price = parseFloat(
          priceText.replace("Rs. ", "").replace(",", "")
        );
        const itemTotal = quantity * price;
        item.querySelector(
          ".total-unique"
        ).textContent = `Rs. ${itemTotal.toFixed(2)}`;
        total += itemTotal;

        // Update quantity in the server
        const productId = item.dataset.productId;
        fetch("update_cart.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `product_id=${productId}&quantity=${quantity}`,
        });
      } else {
        item.querySelector(".total-unique").textContent = `Rs. 0.00`;
      }
    });
    cartTotalElement.textContent = total.toFixed(2);
  }

  quantityInputs.forEach((input) => {
    input.addEventListener("change", function () {
      if (this.value < 1) {
        this.value = 1;
      }
      updateTotal();
    });
  });

  selectItemCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", updateTotal);
  });

  updateTotal();
});
