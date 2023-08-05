<script>
import auth from '../../../libs/apis/auth';
export default {
    data() {
        return {
            quantity: 1,
            forDelivery: false,
            user: {},
        }
    },
    async mounted() {
        const res = await auth.getMe();
        this.user = res.data;
    }
}
</script>




<template>
    <div class="h-full min-h-[86vh] w-full flex flex-col gap-2">
        <div class="w-full mb-2 flex border-b font-bold text-[1.25rem]">
            <div>Thanks you, </div>
            <div>{{ ' ' + user.firstName + ' ' + user.lastName }}</div>
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
            <p>Pickup</p>
        </div>
        <div>
            <div class="w-full mb-2 flex font-bold text-[1.1rem]">
                <div>Shipping address</div>
            </div>
            <p>xx xxxxx xxxxx xxxxx, xxxxx, xxxxx</p>
        </div>

        <div>
            <div class="w-full mb-2 flex font-bold text-[1.1rem]">
                <div>Payment method</div>
            </div>
            <p>VISA Ending in xxxx - xxxx$</p>
        </div>

        <div class="text-white">
            <router-link to="/me/pending"
                class="mb-4 w-fit pr-6 py-2 text-[.8rem] font-bold flex items-center bg-green-600">
                <div class="w-8 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg" class="">
                </div>
                <div>
                    See your order
                </div>
                <!-- </button> -->
            </router-link>
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