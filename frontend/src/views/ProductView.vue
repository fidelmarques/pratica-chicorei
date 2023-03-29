<script setup></script>

<template>
  <div class="product-wrapper">
    <div class="productImage-wrapper">
      <img
        src="https://chicorei.imgix.net/18517/fd1fa3a2-3066-11ed-bbbf-5363f251770f.jpg?auto=compress%2Cformat&q=65&fit=crop&w=330&h=495"
      />
    </div>
    <div class="productsDescription-wrapper">
      <div class="productsDescription">
        <h2 class="productsDescription-title">Camiseta Pagodinho</h2>
        <div class="productsDescription-section">
          <h3 class="productsDescription-subtitle">Modelo:</h3>
          <div class="productsDescription-modelSelectorWrapper">
            <button class="productsDescription-modelSelectorButton selector">
              CAMISETA REGULAR
            </button>
            <button class="productsDescription-modelSelectorButton selector">
              CAMISETA REGULAR
            </button>
          </div>
        </div>
        <div class="productsDescription-section">
          <h3 class="productsDescription-subtitle">Tamanho:</h3>
          <div class="productsDescription-modelSelectorWrapper">
            <button class="productsDescription-sizeSelectorButton selector">PP</button>
            <button class="productsDescription-sizeSelectorButton selector">P</button>
            <button class="productsDescription-sizeSelectorButton selector">M</button>
            <button class="productsDescription-sizeSelectorButton selector">G</button>
            <button class="productsDescription-sizeSelectorButton selector">GG</button>
            <button class="productsDescription-sizeSelectorButton selector">2GG</button>
            <button class="productsDescription-sizeSelectorButton selector">3GG</button>
            <button class="productsDescription-sizeSelectorButton selector">4GG</button>
          </div>
        </div>
        <div class="productsDescription-section">
          <h3 class="productsDescription-subtitle">Cor:</h3>
          <div class="productsDescription-colorSelectorWrapper">
            <button class="color-selector blue" />
          </div>
        </div>

        <div class="productsDescription-priceContainer">
          <span class="normal-price">R$ 79,99</span>
          <span class="actual-price">R$ 39,90</span>
        </div>
        <button class="productsDescription-addToCartButton">COMPRAR</button>
      </div>
    </div>
  </div>
</template>

<style>
.product-wrapper {
  width: 100%;
  max-width: 1280px;

  display: flex;
  justify-content: space-evenly;
  /* gap: 50px; */
  align-items: center;

  background-color: #e5e8e9;
}

.productImage-wrapper {
  display: flex;
  width: 35%;
  max-width: 450px;
  box-shadow: 0px 1px 15px rgb(156, 156, 156);
}

.productImage-wrapper img {
  flex: 1;
}

.productsDescription-wrapper {
  width: 50%;
  max-width: 500px;

  flex: 1;

  height: 75%;

  max-height: 750px;

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  /* box-shadow: 0px 1px 15px rgb(156, 156, 156); */
}

.productsDescription {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  /* max-height: 500px; */
  padding: 1rem;
}

.productsDescription-title {
  font-size: 2.5rem;
}

.productsDescription-subtitle {
  font-size: 1.5rem;
}

.productsDescription-modelSelectorWrapper {
  display: flex;
  gap: 5px;
}

.productsDescription-modelSelectorButton {
  border: 1px solid black;
  width: fit-content;
  padding: 5px 10px;
}

.productsDescription-sizeSelectorButton {
  border: 1px solid black;
  min-width: 40px;
  text-align: center;
  padding: 5px 5px;
}

.productsDescription-modelSelectorWrapper {
  display: flex;
  gap: 5px;
  flex-wrap: wrap;
}

.productsDescription-priceContainer {
  font-size: 2rem;
  display: flex;
  gap: 15px;
}

.selector {
  font-size: 1rem;
}

.selector:hover {
  background-color: black;
  color: white;
  transition: 0.4s;
}

.productsDescription-addToCartButton {
  border: 1px solid black;
  text-align: center;
  padding: 15px 5px;

  background-color: black;
  color: white;
  font-size: 1.1rem;
}

.productsDescription-addToCartButton:hover {
  background-color: rgb(83, 83, 83);
  transition: 0.4s;
}

.productsDescription-section {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
</style>
