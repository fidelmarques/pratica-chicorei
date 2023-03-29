<script setup>
import { RouterView } from 'vue-router'

import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
</script>

<template>
  <Header />

  <main>
    <RouterView />
  </main>

  <Footer />
</template>

<style scoped>
main {
  min-height: 86vh;
  padding: 1rem;

  display: flex;
  justify-content: center;
}
</style>
