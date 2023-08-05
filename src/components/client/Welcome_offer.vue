<script>
import productApi from "../../libs/apis/productApi";
import loadingVue from '../loading.vue';
export default {
    components: {
        loadingVue
    },
    data() {
        return {
            product: {},
        }
    },
    async mounted() {
        const [firstProduct] = await productApi.welcomeOffer();
        this.product = firstProduct;
    }
}
</script>

<template>
    <div v-if="product.id" class="w-full flex min-h-fit justify-center">
        <ul class="relative w-[var(--fixed-wdith)] h-fit">
            <li class="flex max-lg:flex-col-reverse max-lg:items-center overflow-hidden">
                <div class="p-4 w-[50%] max-sm:w-full flex flex-col gap-[1.4rem] items-center justify-center">
                    <strong class="text-[2.4rem]">{{ product.name }}</strong>
                    <p class="w-[75%] text-base">{{ product.title }}</p>
                    <div class="flex gap-[6rem] max-sm:gap-4">
                        <button v-if="product.discount > 0"
                            class="px-4 py-1 font-bold text-white nav-background-linear-gradient rounded-2xl">
                            {{ product.discount }}% OFF
                        </button>
                        <router-link :to="{ name: 'product', params: { id: product.id - 0 } }"
                            class="px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]">
                            CHECK IT OUT
                        </router-link>
                    </div>
                </div>
                <div class="w-[50%] max-sm:w-full flex max-sm:justify-center">
                    <img :src="product.imageUrl" class="h-full max-h-[50vh] object-contain" alt="">
                </div>
            </li>
        </ul>
    </div>
    <div v-else class="w-full min-h-[85vh] flex justify-center">
        <loadingVue />
    </div>
</template>