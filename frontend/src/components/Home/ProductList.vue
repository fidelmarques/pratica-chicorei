<script setup>
import ProductItem from './ProductItem.vue'
</script>

<template>
  <ul class="productList">
    <ProductItem />
    <ProductItem />
    <ProductItem />
    <ProductItem />
  </ul>
</template>

<style>
.productList {
  width: 100%;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 2rem 0;
}
</style>
