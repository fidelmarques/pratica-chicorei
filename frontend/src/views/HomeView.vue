<script setup>
import ProductList from '../components/Home/ProductList.vue'
</script>

<template>
  <div class="home-wrapper">
    <ProductList />
  </div>
</template>

<style>
.home-wrapper {
  width: 100%;
  max-width: 1280px;
  height: fit-content;

  display: flex;
  justify-content: space-between;
}
</style>
