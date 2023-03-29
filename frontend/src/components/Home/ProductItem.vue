<script setup></script>

<template>
  <RouterLink to="/product">
    <li class="productItem">
      <img
        src="https://chicorei.imgix.net/18517/fd1fa3a2-3066-11ed-bbbf-5363f251770f.jpg?auto=compress%2Cformat&q=65&fit=crop&w=330&h=495"
      />
      <div class="productDetails">
        <div>
          <div class="color-selector blue" />
        </div>
        <h3>Camiseta Pagodinho</h3>
        <div class="price-container">
          <span class="normal-price">R$ 79,99</span>
          <span class="actual-price">R$ 39,90</span>
        </div>
      </div>
    </li>
  </RouterLink>
</template>

<style>
.productItem {
  max-width: 300px;
  height: fit-content;

  display: flex;
  flex-direction: column;
  gap: 0.5rem;

  flex: 1;

  /* border-radius: 10px; */
  /* box-shadow: 0px 2px 5px rgb(156, 156, 156); */
  background-color: #fafafa;
}

.productDetails {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  padding: 0.5rem;
}

.productDetails h3 {
  font-size: 1.2rem;
}

.productItem img {
  /* border-radius: 10px; */
  width: 100%;
  align-self: center;

  box-shadow: 0px 1px 15px rgb(156, 156, 156);
}

.color-selector {
  width: 10px;
  height: 10px;
  border-radius: 100%;

  display: flex;
  align-items: center;

  border: 1px solid black;
}

.price-container {
  display: flex;
  gap: 1rem;
  align-items: center;
  font-size: 1.1rem;
}

.normal-price {
  text-decoration: line-through;
}

.actual-price {
  font-weight: bold;
}

.blue {
  background-color: blue;
}
</style>
