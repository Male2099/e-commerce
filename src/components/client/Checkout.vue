<script>
import ProductList from "@/components/client/cart/ProductList.vue"
import Customer_Info from "@/components/client/cart/Customer_Info.vue"
import Order_summarize from "@/components/client/cart/Order_summarize.vue"
import PaymentMethod from "@/components/client/cart/PaymentMethod.vue"
import CompletedOrder from '@/components/client/cart/CompletedOrder.vue'

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
        }
    }, methods: {

    }
}

</script>

<template>
    <div class="w-full flex justify-center py-4 px-4">
        <div v-if="showCompletedOrder == false" class="w-[var(--fixed-width)] p-4 flex gap-12">
            <section class="w-[65.5%] p-4">
                <ProductList v-if="showProductList" />
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
}" />
            </section>
            <section class="w-[30.5%] bg-[#F4F4F4] p-4 flex flex-col items-center">
                <Order_summarize
                    @checkout_step1="() => { showCustomer_Info = true; showProductList = false; enableCheckout = false }"
                    :backToCart="enableCheckout" />
            </section>
        </div>
        <div v-if="showCompletedOrder == true" class="w-[var(--fixed-width)] p-4 flex gap-12">
            <CompletedOrder />
        </div>
    </div>
</template>