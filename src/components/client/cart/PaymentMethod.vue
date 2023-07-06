<script>
export default {
    data() {
        return {
            quantity: 1,
            forDelivery: false,

        }
    }, methods: {
        async onAddPaymentMethod(e) {
            e.preventDefault();

        }
    }
}
</script>




<template>
    <div class="h-full w-full flex flex-col gap-2">
        <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
            <div>Cart </div>
            <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                    class="h-4 rotate-180"></div>
            <div> Cutomer Infomation</div>
            <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                    class="h-4 rotate-180"></div>
            <div> PaymentMethod</div>
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
                            Back to customer information
                        </div>
                    </button>
                    <button type="submit"  @click="$emit('orderHasCompleted')" 
                        class="px-6 py-2 text-[.8rem] font-bold bg-[var(--purple-background)]">Complete order</button>
                </div>
                
            </div>
        <!-- </form> -->
    </div>
</template>