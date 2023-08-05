<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Footer_ from '@/components/Client/Footer.vue'
import Header_ from '@/components/Client/Header.vue'
import auth from '../libs/apis/auth'
</script>


<template>
    <div>
        <Header_ />
        <RouterView />
        <Footer_ />
    </div>
</template>