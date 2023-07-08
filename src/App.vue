<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer_ from '@/components/Client/Footer.vue'
import Header_ from '@/components/Client/Header.vue'
</script>

<template>
    <div id="app">
        <Header_ />
        <RouterView/>
        <Footer_ />
    </div>
</template>
<style></style>

