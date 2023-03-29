<template>
  <div class="cart-wrapper">
    <ul class="cartList">
      <li>
        <div class="cartItem">
          <div class="cartItem-imageWrapper">
            <img
              src="https://chicorei.imgix.net/18517/fd1fa3a2-3066-11ed-bbbf-5363f251770f.jpg?auto=compress%2Cformat&q=65&fit=crop&w=330&h=495"
            />
          </div>
          <div class="cartItem-detailsWrapper">
            <h3>Camiseta Pagodinho</h3>
            <div class="cartItem-colorWrapper">
              <h3>Cor:</h3>
              <button class="color-selector blue" />
            </div>
            <div class="price-container">
              <span class="normal-price">R$ 79,99</span>
              <span class="actual-price">R$ 39,90</span>
            </div>
          </div>
          <div class="cartItem-optionsWrapper">
            <button>-</button>
            <input />
            <button>+</button>
          </div>
        </div>
      </li>
      <li>
        <div class="cartItem"></div>
      </li>
      <li>
        <div class="cartItem"></div>
      </li>
      <li>
        <div class="cartItem"></div>
      </li>
      <li>
        <div class="cartItem"></div>
      </li>
    </ul>
  </div>
</template>

<style>
.cart-wrapper {
  width: 100%;
  max-width: 1280px;

  display: flex;
  flex-direction: column;
  align-items: center;

  padding: 1rem;

  background-color: #e5e8e9;
}

.cartList {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 1rem;
}

.cartList li {
  width: 100%;
}

.cartItem {
  background-color: rgb(221, 221, 221);
  width: 100%;
  height: 150px;

  box-sizing: border-box;

  padding: 1rem;

  display: flex;
  justify-content: space-between;
}

.cartItem-imageWrapper {
  display: flex;
  align-items: center;
  height: 100%;
}

.cartItem-imageWrapper img {
  height: 100%;
  box-shadow: 0px 2px 5px rgb(156, 156, 156);
}

.cartItem-detailsWrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 5px;
}

.cartItem-colorWrapper {
  display: flex;
  align-items: center;
  gap: 10px;
}

.cartItem-optionsWrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
}

.cartItem-optionsWrapper input {
  width: 50px;
  background-color: #e5e8e9;
}

.cartItem-optionsWrapper button {
  width: 20px;
  background-color: #e5e8e9;
  text-align: center;
  box-sizing: border-box;
}
</style>
