<script>
import productApi from "../../libs/apis/productApi";
// import loadingVue from '../loading.vue';

export default {
    // components: {
    //     loadingVue
    // },
    data() {
        return {
            speciaListProducts: [],
            discounts: [],

        }
    },
    async mounted() {
        this.speciaListProducts = await productApi.special();
        this.discounts = await productApi.discount();
    },
    methods: {


    }
}

</script>
<template>
    <div v-if="discounts[0]" class="w-full flex justify-center px-4">
        <div class="w-[var(--fixed-width)] max-w-[100vw] flex flex-col items-center  gap-4">
            <div class="w-[100vw]">
                <div class="flex justify-center text-[2.4rem] max-sm:text-[1.5rem] font-bold orange-backgroundColor">EXPLORE
                    THE
                    COLLECTION</div>
            </div>
            <section class="flex gap-4 justify-center w-full overflow-auto">
                <div class="w-full flex gap-1">
                    <ul class="w-full flex gap-1">
                        <li v-for="prod in speciaListProducts" :key="prod.id">
                            <router-link :to="{ name: 'product', params: { id: prod.id } }">
                                <div
                                    class="h-[11.5rem] w-[11rem] flex flex-col items-center shadow-md broder-[1px] rounded relative overflow-hidden">
                                    <div class="w-full h-[8.6rem] overflow-hidden"><img :src="prod.imageUrl"
                                            class="w-full object-contain" alt=""></div>
                                    <div class="font-bold py-[.65rem]">{{ prod.name }}</div>
                                    <span
                                        class="absolute right-[-37%] top-[5%] w-full orange-backgroundColor rotate-[45deg] flex justify-center">
                                        <div class="font-bold">{{ prod.price }}</div>
                                    </span>
                                    <span v-if="prod.discount > 0"
                                        class="absolute left-0 top-0 rounded purple_background_color text-white">
                                        <div class="font-bold">{{ prod.discount }}%</div>
                                    </span>
                                </div>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="w-full flex flex-col gap-4">
                <ul class="w-full flex flex-col gap-4">
                    <li v-for="(prod, index)  in discounts" :key="prod.id"
                        class="min-h-fit w-full gap-4 flex max-sm:flex-col-reverse rounded shadow-md overflow-hidden"
                        :class="{ 'flex-row-reverse': index % 2 == 0 }">
                        <div class="w-[50%] max-sm:w-full p-4 flex flex-col items-center">
                            <div class="font-bold">{{ prod.special_desc }}</div>
                            <div class="text-[1.8rem] font-bold">{{ prod.name }}</div>
                            <p class="">{{ prod.title }}
                            </p>
                            <div class="mt-auto mb-7">
                                <button v-if="prod.discount > 0"
                                    class="mr-4 px-4 py-1 font-bold text-white nav-background-linear-gradient rounded-2xl">
                                    {{ prod.discount }}OFF
                                </button>
                                <router-link :to="{ name: 'product', params: { id: prod.id } }"
                                    class="px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]">
                                    CHECK IT OUT
                                </router-link>

                            </div>
                        </div>
                        <div class="w-[50%] max-sm:w-full flex max-sm:justify-center"
                            :class="{ 'justify-end': index % 2 == 0 }">
                            <img :src="prod.imageUrl" class="h-full max-h-[40vh] object-contain overflow-hidden" alt="">
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <!-- <div v-else class="w-full min-h-[85vh] flex justify-center">
        <loadingVue />
    </div> -->
</template>