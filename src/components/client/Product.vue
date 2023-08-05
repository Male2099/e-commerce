<script>
import productApi from '../../libs/apis/productApi'
import orderApi from '../../libs/apis/orderApi'
import orderDetailApi from '../../libs/apis/orderDetailApi'

import loading from '../loading.vue'
export default {
    components: {
        loading,
    },
    data() {
        return {
            quantity: 1,
            product: null,
            loadAddToCart: false
        }
    }, methods: {
        async addToCart() {
            this.product['quantity'] = this.quantity
            const res = await orderDetailApi.create({ product_id: this.product.id, quantity: this.quantity });
            this.loadAddToCart = false
            if (!res) alert('fail to add product to cart')
        }
    },
    async mounted() {
        const productId = this.$route.params.id;
        this.product = await productApi.get(productId)
    }
}
</script>

<template>
    <div v-if="product" class="w-full min-h-[90vh] flex flex-col items-center px-4 relative">
        <div class="w-[var(--fixed-width)] max-w-[100vw] p-4 max-sm:p-0 flex max-sm:flex-col gap-4 relative">
            <section class="w-[50%] max-sm:w-full p-4 max-sm:p-0">
                <div class="w-full overflow-hidden">
                    <img class="max-w-full" :src="product.imageUrl" alt="">
                </div>
                <!-- <div class="h-[5rem] flex items-center gap-4 ">
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
                </div> -->
            </section>
            <section class="w-[50%] max-sm:w-full p-4 flex flex-col overflow-auto">

                <div class="text-[2.25rem] max-sm:text-[1.5rem] flex items-center gap-1 font-semibold">

                    <div>{{ product.name }}</div>
                </div>
                <div class="flex gap-2 w-fit mb-2 font-bold text-white">
                    <span class="rounded bg-blue-500 px-1">Sweet</span>
                    <span class="rounded bg-orange-500 px-1">Salty</span>
                    <span class="rounded bg-yellow-500 px-1">Delicous</span>
                    <span class="rounded bg-green-500 px-1">Best</span>
                </div>
                <div v-if="product.discount > 0" class="w-fit mb-2 px-2 rounded purple_background_color text-white">
                    <strong>{{ product.discount }}% Discount</strong>
                </div>
                <div>
                    {{ product.title }}
                </div>
                <div class="font-bold">Description</div>
                <ul class="pl-6 pt-2">
                    <li class="list-disc">{{ product.desc }}</li>
                </ul>
                <div class="mt-2 font-bold">Ingrediants</div>
                <ul class="pl-6 pt-2">
                    <li>{{ product.incrediant }}</li>
                </ul>
            </section>
        </div>
        <div class="w-[85%] max-sm:w-full p-1 pl-4 max-sm:p-0 pr-8 flex max-sm:flex-col items-center justify-between
                     bg-white z-10 border-[1px] max-sm:border-none shadow rounded 
                      top-[90vh]">

            <div class="flex w-[70%] max-sm:w-full justify-between items-center">
                <div class="text-[1.1rem] flex items-center gap-1 font-semibold">
                    <div class="h-[3.5rem] flex items-center overflow-hidden rounded">
                        <img class="w-[3.5rem] h-fit object-contain" :src="product.imageUrl" alt="">
                    </div>
                    <div>{{ product.name }}</div>
                </div>
                <div class="mr-[12%] font-bold">{{ product.price }}$</div>
                <div class=" flex gap-3 items-center">
                    <div class="max-sm:hidden">Quantity</div>
                    <div class="sm:hidden max-sm:static">QTY</div>
                    <button @click="() => { quantity != 1 ? quantity-- : quantity }"
                        class="px-[.3rem] rounded border-[2px] border-[var(--sky-background)]">-</button>
                    <div
                        class="min-w-[2rem] minw-fit h-[2rem] flex justify-center items-center rounded border-[2px] border-gray-500">
                        {{ quantity }}
                    </div>
                    <button @click="() => { quantity = quantity + 1 }"
                        class="px-[.4rem] rounded border-[2px] border-[var(--sky-background)]">+</button>
                </div>
            </div>
            <button v-if="!loadAddToCart" @click="addToCart(); loadAddToCart = true"
                class="w-[9rem] h-[2.2rem] font-bold px-4 rounded text-white bg-blue-500 hover:text-[var(--menu-active-color)]">ADD
                TO CART
            </button>
            <div v-else class="w-[9rem] h-[2.2rem] relative flex items-center justify-center  bg-blue-500">
                <loading class="top-[2px]" />
            </div>
        </div>
    </div>
</template>