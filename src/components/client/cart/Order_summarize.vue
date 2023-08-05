<script>
import orderApi from '../../../libs/apis/orderApi'
import orderDetailApi from '../../../libs/apis/orderDetailApi'
export default {
    props: {
        backToCart: {
            type: Boolean,
            required: true,
        },
        reloadPage: {
            type: Boolean,
            required: true,
        },
    }
    ,
    data() {
        return {
            quantity: 1,
            enableCheckout: true,
            enableApplyPromocode: true,
            promoCode: '',
            order: {},
        }
    },
    methods: {
        async onApplyPromocode(e) {
            e.preventDefault();
            this.enableApplyPromocode = false;
        },
    },
    async mounted() {
        this.order = await orderApi.currentOrder()
    }, computed: {
        orderDetailsLength() {
            if (this.order && Array.isArray(this.order.order_details)) {
                return this.order.order_details.length;
            } else {
                return 0;
            }
        }
    }, watch: {
        async reloadPage(newVal) {
            this.order = await orderApi.currentOrder()
        }
    }
}
</script>


<template >
    <div class="w-full">
        <div class="w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]">
            <div>Order summaize</div>
        </div>
        <div class="w-full mb-2 flex justify-between font-bold text-[1.1rem] text-gray-500">
            <div>ITEM {{ orderDetailsLength }}</div>
            <div>{{ order.total }}$</div>
        </div>
        <!-- <div class="w-full mb-2 flex justify-between font-bold text-[1.1rem] text-gray-500">
            <div class="text-[var(--purple-background)]">Discount</div>
            <div>12.9$</div>
        </div> -->
        <form action="#" @submit="onApplyPromocode" class="w-full">
            <div v-if="enableApplyPromocode" class="w-full mb-2 flex flex-col gap-3 font-bold text-[1.1rem] text-gray-500">
                <div class="">Promo code</div>
                <input type="text" v-model="promoCode" name="promocode" required id="promocode"
                    placeholder="Enter code here" class="w-full px-2 rounded h-[2.5rem] text-sm font-normal">
            </div>
            <div v-else class="w-full mb-2 flex flex-col gap-3 font-bold text-[1.1rem]">
                <div class="">Promo code</div>
                <div
                    class="w-full px-2 rounded h-[2.5rem] flex items-center justify-between text-sm  font-normal border-[2px] border-[var(--purple-background)]">
                    <div>
                        {{ promoCode }}
                    </div>
                    <div>5$</div>
                </div>
            </div>

            <div class="w-full mb-2 flex justify-between font-bold text-[1.1rem] text-gray-500">
                <button type="submit" v-if="enableApplyPromocode"
                    class="px-6 py-2 text-[.7rem]  font-bold text-white bg-[var(--purple-background)]">APPLY</button>
                <button type="submit" v-else class="px-6 py-2 text-[.7rem]  font-bold text-white bg-gray-500">APPLY</button>
            </div>
        </form>
        <div class="w-full mb-2 flex justify-between border-t mt-2 font-bold text-[1.1rem] text-gray-500">
            <div>Total cost</div>
            <div>{{ order.total }}$</div>
        </div>
        <div class="w-full mb-2 flex  justify-center font-bold text-[1.1rem] text-gray-500">
            <button @click="$emit('checkout_step1'); enableCheckout = false"
                v-if="(enableCheckout || backToCart) && orderDetailsLength > 0"
                class="px-6 py-2 text-[.7rem] font-bold text-white bg-[var(--purple-background)]">CHECKEOUT</button>
        </div>
    </div>
</template>