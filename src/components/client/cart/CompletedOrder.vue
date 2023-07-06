<script>
export default {
    data() {
        return {
            quantity: 1,
            forDelivery: false,
        }
    }
}
</script>




<template>
    <div class="h-full w-full flex flex-col gap-2">
        <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
            <div>Thanks you, </div>
            <div> Customer 123</div>
        </div>
        <div>
            <p>Your order is confirmed</p>
            <p>We have accepted your order and we're getting it ready for you</p>
        </div>
        <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
            <div>Customer information </div>
        </div>
        <div>
            <div class="w-full mb-2 flex font-bold text-[1.1rem]">
                <div>Method</div>
            </div>
            <p>Delivery</p>
        </div>
        <div>
            <div class="w-full mb-2 flex font-bold text-[1.1rem]">
                <div>Shipping address</div>
            </div>
            <p>12 Waldo Point road, Mishauk, Phnom Penh</p>
        </div>

        <div>
            <div class="w-full mb-2 flex font-bold text-[1.1rem]">
                <div>Payment method</div>
            </div>
            <p>VISA Ending in 3217 - 11.35$</p>
        </div>

        <div class="text-white">
            <router-link to="/"
                class="w-fit pr-6 py-2 text-[.8rem] font-bold flex items-center bg-[var(--blood-red-background)]">
                <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg" class="">
                </div>
                <div>
                    Back to home
                </div>
            <!-- </button> -->
            </router-link>
        </div>

    </div>
</template>