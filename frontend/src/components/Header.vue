<script setup></script>

<template>
  <header>
    <RouterLink to="/">
      <h1>Chico Rei</h1>
    </RouterLink>
    <nav>
      <RouterLink to="/cart">
        <v-icon name="io-cart" />
      </RouterLink>
    </nav>
  </header>
</template>

<style>
header {
  padding: 0 1rem;
  height: 4rem;
  display: flex;
  justify-content: space-between;
  align-items: center;

  background-color: #f2efe980;

  backdrop-filter: blur(2px);

  color: red;

  position: sticky;
  top: 0;
}
</style>
