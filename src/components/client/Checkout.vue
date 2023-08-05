<script>
import ProductList from "@/components/client/cart/ProductList.vue"
import Customer_Info from "@/components/client/cart/Customer_Info.vue"
import Order_summarize from "@/components/client/cart/Order_summarize.vue"
import PaymentMethod from "@/components/client/cart/PaymentMethod.vue"
import CompletedOrder from '@/components/client/cart/CompletedOrder.vue'

import orderApi from '../../libs/apis/orderApi'
export default {
    components: {
        ProductList,
        Customer_Info,
        Order_summarize,
        PaymentMethod,
        CompletedOrder,
    },

    data() {
        return {
            enableCheckout: true,
            showProductList: true,
            showCustomer_Info: false,
            showPaymentMethod: false,
            showCompletedOrder: false,
            order: {},
            orderDetails: [],
            reloadPage: false,
        }
    }, methods: {

    }, async mounted() {
        const __order = await orderApi.currentOrder()
        if (!__order) {
            this.order = await orderApi.currentOrder()
        } else {
            this.order = __order;
        }
        this.orderDetails = this.order.order_details;
    },
}

</script>

<template>
    <div class="w-[100vw] flex justify-center px-4 max-sm:p-2">
        <div v-if="showCompletedOrder == false"
            class="w-[var(--fixed-width)] min-h-[100vh] max-w-full p-4 max-sm:p-0 flex flex-row-reverse max-sm:flex-col max-sm:items-start gap-12">
            <section class="w-[30.5%] max-sm:w-full bg-[#F4F4F4] p-4 flex flex-col items-center ">
                <Order_summarize
                    @checkout_step1="() => { showCustomer_Info = true; showProductList = false; enableCheckout = false }"
                    :backToCart="enableCheckout" :reloadPage="reloadPage" />
            </section>
            <section class="w-[65.5%] p-4 max-sm:p-0 max-sm:w-full">
                <ProductList v-if="showProductList" @reloadPage="reloadPage = !reloadPage" />
                <Customer_Info v-if="showCustomer_Info" @checkout_step2="() => {
                    showPaymentMethod = true;
                    showCustomer_Info = false;
                    showProductList = false
                }" @backToCart="() => {
    showPaymentMethod = false;
    showCustomer_Info = false;
    showProductList = true,
        enableCheckout = true;
}" />

                <PaymentMethod v-if="showPaymentMethod" @orderHasCompleted="() => {
                    showPaymentMethod = false;
                    showCustomer_Info = false;
                    showProductList = false;
                    showCompletedOrder = true;
                }" @backToCustomerInfo="() => {
    showPaymentMethod = false;
    showCustomer_Info = true;
    showProductList = false;
    showCompletedOrder = false;
}" @backToCart="() => {
    showPaymentMethod = false;
    showCustomer_Info = false;
    showProductList = true,
        enableCheckout = true;
}" />
            </section>
        </div>

        <div v-if="showCompletedOrder == true" class="w-[var(--fixed-width)] p-4 flex gap-12">
            <CompletedOrder />
        </div>
    </div>
</template>