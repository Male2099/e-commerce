<script>
import axios from 'axios';
import productApi from '../../../libs/apis/productApi';

export default {
    name: 'ProductDetail',
    data() {
        return {
            product: null,
        };
    },
    async mounted() {
        const productId = this.$route.params.id;
        this.product = await productApi.get(productId)
        if (!this.product) {
            alert('fail to get product data')
        }
    },
};
</script>

<template>
    <div class="w-full flex flex-col items-center px-4 relative">
        <form action="#" @submit="OnUpdateProduct" v-if="product" class="w-[var(--fixed-width)] max-w-[100vw] p-4 max-sm:p-0 flex max-sm:flex-col gap-4 relative">
            <section class="w-[50%] max-sm:w-full p-4 max-sm:p-0">
                <div class="w-full overflow-hidden">
                    <img class="max-w-full" src="@/assets/random-image/donutoffer.png" alt="">
                </div>
                <div class="h-[5rem] flex items-center gap-4 ">
                    <span class="h-full overflow-hidden">
                        <img class="h-full" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                </div>
            </section>
            <section class="w-[50%] max-sm:w-full p-4 flex flex-col overflow-auto">

                <div class="text-[2.25rem] max-sm:text-[1.5rem] flex items-center gap-1 font-semibold">

                    <div>{{ product.name }}</div>
                </div>
                <!-- <div class="flex gap-2 w-fit mb-2 font-bold text-white">
                    <span class="rounded bg-blue-500 px-1">Sweet</span>
                    <span class="rounded bg-orange-500 px-1">Salty</span>
                    <span class="rounded bg-yellow-500 px-1">Delicous</span>
                    <span class="rounded bg-green-500 px-1">Best</span>
                </div> -->
                <div v-if="product.discount !== 0"
                    class="w-fit mb-2 px-2 rounded purple_background_color text-white font-bold">
                    30% Discount
                </div>
                <div class="w-fit mb-2 px-2 rounded">
                    {{ product.title }}
                </div>
                <div v-for="desc in product.product_details" :key="desc.id">
                    <strong>{{ desc.title }}</strong>
                    <ul class="pl-6 pt-2">
                        <li class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                    </ul>
                </div>

            </section>
        </form>

    </div>
</template>