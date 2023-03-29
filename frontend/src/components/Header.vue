<script setup></script>

<template>
  <header>
    <div class="header-wrapper">
      <RouterLink to="/">
        <!-- <h1>Chico Rei</h1> -->
        <img
          class="logo"
          src="https://chico-rei.imgix.net/images/site/2021/brand/chico-rei-text.svg"
        />
      </RouterLink>
      <nav>
        <RouterLink to="/cart">
          <v-icon class="cartIcon" name="io-cart" />
        </RouterLink>
      </nav>
    </div>
  </header>
</template>

<style>
header {
  padding: 0 1rem;
  height: 4rem;
  display: flex;
  justify-content: center;
  align-items: center;

  background-color: #f2efe980;

  backdrop-filter: blur(2px);

  color: red;

  position: sticky;
  top: 0;
}

.header-wrapper {
  width: 100%;
  max-width: 1280px;

  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  width: 100px;
  fill: black;
}

.cartIcon {
  max-height: 30px;
  fill: black;
}
</style>
