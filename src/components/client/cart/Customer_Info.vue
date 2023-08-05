
<script>
export default {
    data() {
        return {
            selectedOption: "pickup",
            formSubmitted: false,
            quantity: 1,
            address: {
                firstName: '',
                lastName: '',
                address: '',
                additionalInfo: ''
            }
        };
    }, methods: {
        async onAddressToDeliver(e) {
            e.preventDefault();
            this.formSubmitted = true
        }
    }, mounted() {
        if (this.formSubmitted) {

        }
    }
    ,
    computed: {
        // Computed property to set the checked attribute of the checkboxes
        pickupChecked() {
            return this.selectedOption === 'pickup';
        },
        deliveryChecked() {
            return this.selectedOption === 'delivery';
        }
    }
};
</script>




<template>
    <div class="w-full mb-2 flex border-b font-bold text-[1.25rem] max-sm:text-[1rem]">
        <button @click="$emit('backToCart')">Cart</button>
        <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                class="h-4 rotate-180"></div>
        <div class="text-[var(--menu-active-color)]"> Cutomer Infomation</div>
        <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                class="h-4 rotate-180"></div>
        <div> PaymentMethod</div>
    </div>
    <div class="w-full mb-2 font-bold text-[1.25rem]">
        <div>Choose ordering method </div>
        <div class="pl-4 text-[.85em]">
            <div>
                <input type="checkbox" :checked="selectedOption === 'pickup'" @change="selectedOption = 'pickup'">
                <label class="ml-1">Order Pickup</label>
            </div>
            <div>
                <input type="checkbox" :checked="selectedOption === 'delivery'" @change="selectedOption = 'delivery'">
                <label class="ml-1">Order Delivery</label>
            </div>
        </div>
    </div>
    <form action="#" @submit="onAddressToDeliver()">
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2 relative">

                <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]"
                    :class="{ 'text-gray-400': selectedOption === 'pickup' }">
                    <div>Shipping address</div>
                </div>
                <div class="flex justify-between">
                    <input v-model="address.firstName" type="text" placeholder="First name"
                        :disabled="selectedOption === 'pickup'" required
                        :class="{ 'bg-gray-200': selectedOption === 'pickup' }"
                        class="w-[47%] px-2 rou h-[2.5rem] border-gray-300 border text-sm font-normal">
                    <input v-model="address.lastName" type="text" placeholder="Last name"
                        :disabled="selectedOption === 'pickup'" :class="{ 'bg-gray-200': selectedOption === 'pickup' }"
                        required class="w-[47%] px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal">
                </div>
                <div>
                    <input v-model="address.address" type="text" placeholder="Address"
                        :disabled="selectedOption === 'pickup'" :class="{ 'bg-gray-200': selectedOption === 'pickup' }"
                        class="w-full px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal" required>

                </div>
                <div>
                    <input v-model="address.additionalInfo" type="text" placeholder="Additional incormation"
                        :disabled="selectedOption === 'pickup'" :class="{ 'bg-gray-200': selectedOption === 'pickup' }"
                        class="w-full px-2 rounded-sm h-[2.5rem] border-gray-300 border text-sm font-normal" required>
                </div>
            </div>
            <div class="flex justify-around text-white">
                <button type="button" @click="$emit('backToCart')"
                    class="pr-6 py-2 text-[.8rem] font-bold flex items-center bg-[var(--blood-red-background)]">
                    <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                            class="">
                    </div>
                    <div>
                        Back to cart
                    </div>
                </button>
                <button v-if="selectedOption == 'pickup'" type="submit" @click=" $emit('checkout_step2')"
                    class="px-6 py-2 text-[.8rem] font-bold bg-[var(--purple-background)]">Continue to payment
                    method</button>

                <button v-else type="submit"
                    @click="(address.firstName != '' && address.lastName != '' && address.address != '') ? $emit('checkout_step2') : ''"
                    class="px-6 py-2 text-[.8rem] font-bold bg-[var(--purple-background)]">Continue to payment
                    method</button>
            </div>
        </div>
    </form>
</template>
<style>
.background-opacity-70percent-black {
    background-color: rgb(0, 0, 0, 0.7)
}
</style>

<!-- 
                <button v-else type="submit"   @click="formSubmitted ? $emit('checkout_step2') : '1'"

 -->