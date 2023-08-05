<script>
import orderApi from '../../../libs/apis/orderApi'
import orderDetailApi from '../../../libs/apis/orderDetailApi'
export default {
    data() {
        return {
            quantity: 1,
            forDelivery: false,
            order: {},
            open_ConfirmModal: false

        }
    }, methods: {
        async onAddPaymentMethod(e) {
            e.preventDefault();

        },
        async completeOrder() {
            const res = await orderApi.update({ 'status': 'pending' })
            if (!res) alert('unable to complete order')
            else await orderApi.create()
        }
    }, async mounted() {
        this.order = await orderApi.currentOrder()
    },
}
</script>




<template>
    <div class="h-full w-full flex flex-col gap-2">
        <div class="w-full mb-2 flex border-b font-bold text-[1.25rem] max-sm:text-[1rem]">
            <button @click="$emit('backToCart')">Cart</button>
            <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                    class="h-4 rotate-180"></div>
            <button @click="$emit('backToCustomerInfo')"> Cutomer Infomation</button>
            <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                    class="h-4 rotate-180"></div>
            <div class="text-[var(--menu-active-color)]"> PaymentMethod</div>
        </div>
        <div class="w-full mb-2 font-bold text-[1.1rem]">
            <div>
                <input type="checkbox" checked disabled>
                <label class="ml-1">Order Pickup</label>
            </div>
        </div>
        <!-- <form action="#" @submit="onAddPaymentMethod()"> -->
        <div class="flex flex-col gap-2">
            <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
                <div>Payment method</div>
            </div>
            <div>
                <input type="text" placeholder="Card number"
                    class="w-full px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal">
            </div>
            <div class="flex justify-between">
                <input type="text" placeholder="Name in card"
                    class="w-[28%] px-2 rou h-[2.5rem] border-gray-300 border text-sm font-normal">
                <input type="text" placeholder="MM/YY"
                    class="w-[28%] px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal">
                <input type="text" placeholder="CVV"
                    class="w-[28%] px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal">
            </div>
            <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
                <div>Remember me</div>
            </div>
            <div class="w-full px-2 flex items-center rounded-sm h-[2.5rem] border-gray-900 border text-sm font-normal">
                <input type="checkbox">
                <label class="ml-2 text-gray-500">Save my information for faster checkout</label>
            </div>
            <div class="flex justify-around text-white mt-4">
                <button type="button" @click="$emit('backToCustomerInfo')"
                    class="pr-6 py-2 text-[.8rem] font-bold flex items-center bg-[var(--blood-red-background)]">
                    <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                            class=""></div>
                    <div>
                        Back
                    </div>
                </button>
                <button type="submit" @click="open_ConfirmModal = true"
                    class="px-6 py-2 text-[.8rem] font-bold bg-[var(--purple-background)]">Complete order</button>
            </div>

        </div>
        <div v-if="open_ConfirmModal">
            <teleport to='body'>
                <div
                    class="fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20  background-opacity-70percent-black">
                    <div class="w-[350px] h-fit p-4 pb-8 flex flex-col gap-4 items-center bg-white rounded">
                        <div>
                            <img class="w-[5rem] filter-black" src="../../../assets/image/XCircle.svg" alt="">
                        </div>
                        <div class="text-[2rem] text-gray-800 font-semibold">
                            Are your sure?
                        </div>
                        <div>
                            <p class="text-center text-gray-500">
                                Please confirm your purchase on the products!
                            </p>
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click=" open_ConfirmModal = false;"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click=" open_ConfirmModal = false; $emit('orderHasCompleted');completeOrder()"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">OK</button>
                        </div>
                    </div>
                </div>
            </teleport>

        </div>
    </div>
</template>