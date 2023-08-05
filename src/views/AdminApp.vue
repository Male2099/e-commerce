<script setup>
import Dashboard from '../components/admin/Dashboard.vue';
import Topbar from '../components/admin/TopBar.vue';
</script>

<template>
    <div class="w-[100vw] min-h-[100vh] flex justify-center">
        <div class="w-full flex">
            <section class=" w-[14%]  h-full min-h-[100vh] bg-[var(--dashboard-background)]">
                <Dashboard />
            </section>
            <section class="w-[86%]">
                <Topbar />
                <RouterView />
            </section>

        </div>
    </div>
</template>
<style>

</style>