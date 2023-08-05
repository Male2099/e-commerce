<script>
import categoryApi from "../../libs/apis/categoryApi";
import productApi from "../../libs/apis/productApi";
import loadingVue from '../loading.vue';

export default {
    components: {
        loadingVue
    },
    data() {
        return {
            categories: [],
            products: [],
            discounts: [],
            selectedCTG_id: '',
            onClickMenu: true,
        }
    }, methods: {
        async getProductByCTG(id) {
            this.onClickMenu = true;
            this.products = await categoryApi.get(id);
            this.onClickMenu = false;
        }, async allProducts() {
            this.products = await productApi.all()
        }
    }, async mounted() {
        this.categories = await categoryApi.all();
        this.discounts = await productApi.discount();
    }, async beforeCreate() {
        this.products = await productApi.all()

    }
}
</script>

<template>
    <div v-if="categories[0]" class="w-[100vw] flex justify-center py-4 px-4">
        <div class="w-[var(--fixed-width)] max-w-full flex flex-col items-center  gap-8">
            <section class=" w-full flex gap-4 max-sm:flex-col">
                <div @click="allProducts()"
                    class="M-head-ctg-background h-[20rem] min-w-[14rem] max-w-[12rem]  max-sm:max-w-fit max-sm:w-full max-sm:h-fit  p-4 flex flex-col items-start bg-black text-[1.5rem] text-white font-bold rounded-2xl">
                    <div class="text-[2rem]">
                        Selct any type
                    </div>
                    <div class="text-[1rem] font-normal">
                        With so many delicious donut options to choose from, it can be hard to decide
                        which one to try
                        first.Our shop offers a wide
                        variety of flavors and textures to satisfy any craving. Stop by today and
                        discover your new favorite
                        treat!
                    </div>
                </div>
                <ul class="flex overflow-auto gap-1">
                    <li v-for="cate in categories" :key="cate.id"
                        class=" h-[18rem]  min-w-[12rem] max-w-[12rem]  rounded-2xl  M-ctg-background-image">
                        <div class="w-full h-full p-4 flex flex-col text-white font-bold ">
                            <div class="text-[1.25em]">{{ cate.name }}</div>
                            <div class="text-[1rem] h-[13rem] overflow-auto font-semibold text-[var(--menu-active-color)]">
                                {{ cate.desc }}
                            </div>
                            <div class="w-full flex justify-center mt-auto">
                                <button @click="getProductByCTG(cate.id)"
                                    class="px-4 py-1 font-bold text-white border-[2px] border-white rounded-2xl hover:text-[var(--menu-active-color)]">
                                    SHOW
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section v-if="!onClickMenu" class="w-full flex flex-col">
                <ul v-if="products" class="w-full flex flex-wrap gap-4 max-sm:gap-x-1 justify-center">
                    <li v-for="prod in products" :key="prod.id">
                        <router-link :to="{ name: 'product', params: { id: prod.id } }">
                            <div
                                class="h-[11.5rem] w-[11rem] flex flex-col items-center shadow-md broder-[1px] rounded relative overflow-hidden">
                                <div class="w-full h-[8.6rem] overflow-hidden"><img :src="prod.imageUrl"
                                        class="w-full object-contain" alt=""></div>
                                <strong class="py-[.65rem]">{{ prod.name }}</strong>
                                <span
                                    class="absolute right-[-37%] top-[5%] w-full orange-backgroundColor rotate-[45deg] flex justify-center">
                                    <strong>{{ prod.price }}</strong>
                                </span>
                                <span v-if="prod.discount > 0"
                                    class="absolute left-0 top-0 rounded purple_background_color text-white">
                                    <strong>{{ prod.discount }}%</strong>
                                </span>
                            </div>
                        </router-link>
                    </li>
                </ul>
                <!-- <div class=" relative p-4">
                    <div class="absolute right-6 flex gap-3">
                        <button
                            class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black bg-[var(--orange-background)]">1</button>
                        <button class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black">2</button>
                        <button class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black">3</button>
                    </div>
                </div> -->
            </section>
            <section v-else class="h-[20vh] flex items-center">
                <loadingVue />
            </section>
        </div>
    </div>
    <div v-else class="w-full min-h-[85vh] flex justify-center">
        <loadingVue />
    </div>
</template>

<style>
.M-ctg-background-image {
    background-image: url('https://th.bing.com/th/id/OIP.e2iOhIrfl8r87ZfnhHbFXgHaHa?pid=ImgDet&rs=1');
}

.M-head-ctg-background {
    background-image: url('https://i.pinimg.com/originals/d3/55/c8/d355c8054ecd8802a4e0fc3233df355f.jpg');
    background-size: auto 100%;
    background-repeat: no-repeat;
    background-position: center;
    height: fit-content;
}
</style>