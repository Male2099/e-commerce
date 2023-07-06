<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer from './components/Client/Footer.vue'
import Header from './components/Client/Header.vue'
</script>

<template>
    <div id="app">
        <Header />
        <!-- push content from top Header.height="60xp" -->
        <RouterView class="pt-[60px]"/>
        <Footer/>
    </div>
</template>
<style></style>

