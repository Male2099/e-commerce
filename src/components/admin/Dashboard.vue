<script setup>
    import logo from '../logo.vue';
</script>

<template>
    <div class="w-[14vw] fixed flex flex-col">
        <div class="h-[5rem]">
            <logo />
        </div>
        <nav class="flex flex-col  py-4 text-white font-semibold">
            <router-link :to="{name:'admin/dashboard'}">
                <div class="w-full py-3 px-6 rounded hover:bg-white hover:text-black">
                    Dashboard
                </div>
            </router-link>
            <router-link :to="{name:'admin/order'}">
                <div class="w-full py-3 px-6 rounded hover:bg-white hover:text-black">
                    Order
                </div>
            </router-link>
            <router-link :to="{name:'admin/product'}">
                <div class="w-full py-3 px-6 rounded hover:bg-white hover:text-black">
                    Product
                </div>
            </router-link>
            <router-link :to="{name:'admin/category'}">
                <div class="w-full py-3 px-6 rounded hover:bg-white hover:text-black">
                    Category
                </div>
            </router-link>
            <router-link :to="{name:'admin/customer'}">
                <div class="w-full py-3 px-6 rounded hover:bg-white hover:text-black">
                    Cudstomer
                </div>
            </router-link>
            <!-- <router-link :to="{name:'admin/setting'}">
                <div class="w-full py-3 px-6 rounded hover:bg-cyan-500">
                    Setting
                </div>
            </router-link> -->
        </nav>

    </div>
</template>