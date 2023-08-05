<script>
import auth from '../../../libs/apis/auth';
import orderApi from '../../../libs/apis/orderApi'
export default {
    data() {
        return {
            me: null,
            orderCount: 0,
            pendingOrderCount: 0,
        }
    },
    async mounted() {
        this.orderCount = (await orderApi.finishedORder()).length;
        this.pendingOrderCount = (await orderApi.pendingOrders()).length;
    }
    ,
    beforeCreate() {
        auth.getMe()
            .then(result => {
                this.me = result.data;
            })
            .catch(error => {
                // Handle the error here
                if (error.response && error.response.status === 401) {
                    // User is not authenticated, do nothing
                } else {
                    console.error(error);
                }
            });
    }
}
</script>


<template>
    <div v-if="me" class="w-full flex justify-center py-4 px-4 max-sm:p-0">
        <div
            class="w-[var(--fixed-width)] max-w-[100vw] p-4 max-sm:p-2 flex max-sm:flex-col max-sm:items-center gap-12 max-sm:gap-4">
            <div class="h-fit w-[25%] max-sm:w-fit overflow-hidden border">
                <img src="@/assets/random-image/prime.png" class="h-[18rem] min-w-fit object-contain">
            </div>
            <div class="w-[75%] max-sm:w-full flex flex-col gap-4 max-sm:items-center ">
                <div class="w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]">
                    <div>{{ me.firstName }} &ensp;{{ me.lastName }}</div>
                </div>
                <div class="w-full flex max-sm:justify-between">
                    <div class="w-[40%] ">
                        <div class="text-[.7rem] font-normal text-gray-500">First name</div>
                        <div>{{ me.firstName }}</div>
                        <hr class="w-[90%] max-sm:w-full">
                    </div>
                    <div class="w-[40%] ">
                        <div class="text-[.7rem] font-normal text-gray-500">Last name</div>
                        <div>{{ me.lastName }}</div>
                        <hr class="w-[90%] max-sm:w-full">
                    </div>
                </div>
                <div class="w-[100%] ">
                    <div class="text-[.7rem] font-normal text-gray-500">Email</div>
                    <div>{{ me.email }}</div>
                    <hr class="w-[76%] max-sm:w-full ">
                </div>
                <div class="w-[100%] ">
                    <div class="text-[.7rem] font-normal text-gray-500 flex gap-2 items-center">Purchase
                        <router-link to="/me/history"><img class="h-4" src="../../../assets/image/redirectArrow.svg"></router-link>
                    </div>
                    <div>{{ orderCount }}</div>
                    <hr class="w-[76%] max-sm:w-full">
                </div>
                <div class="w-[100%] ">
                    <div class="text-[.7rem] font-normal text-gray-500 flex gap-2 items-center">Pending order
                        <router-link to="/me/pending"><img class="h-4"
                                src="../../../assets/image/redirectArrow.svg"></router-link>
                    </div>
                    <div>{{ pendingOrderCount }}</div>
                    <hr class="w-[76%] max-sm:w-full">
                </div>
                <div class="w-[100%] ">
                    <div class="text-[.7rem] font-normal text-gray-500">Spend</div>
                    <div>xxxxx$</div>
                    <hr class="w-[76%] max-sm:w-full">
                </div>
                <div class="w-full flex justify-between bg-gray-300 font-bold text-[1.25rem]">
                    <div>Setting</div>
                </div>
                <div
                    class="w-[100%] h-fit flex justify-between items-center  border-b-[1px] border-[var(--blood-red-background)] ">
                    <div class="flex flex-col justify-between">
                        <div class="font-bold text-[1.1rem]">Update your information</div>
                        <div>Change your infomation on this website</div>
                    </div>
                    <button
                        class="px-2 py-1 h-fit text-[var(--blood-red-background)] border-[2px] rounded border-[var(--blood-red-background)]">Change</button>
                </div>
                <div
                    class="w-[100%] flex justify-between items-center  border-b-[1px] border-[var(--blood-red-background)] ">
                    <div class="flex flex-col justify-between">
                        <div class="font-bold text-[1.1rem]">Credit card information</div>
                        <div>Remove my information for checkout</div>
                    </div>
                    <button
                        class="px-2 py-1 h-fit text-[var(--blood-red-background)] border-[2px] rounded border-[var(--blood-red-background)]">Remove</button>
                </div>
                <div
                    class="w-[100%] flex justify-between items-center border-b-[1px] border-[var(--blood-red-background)] ">
                    <div class="flex flex-col justify-between ">
                        <div class="font-bold text-[1.1rem]">Paasword</div>
                        <div>Change your current password</div>
                    </div>
                    <button
                        class="px-2 py-1 h-fit text-[var(--blood-red-background)] border-[2px] rounded border-[var(--blood-red-background)]">Change</button>
                </div>
                <div
                    class="w-[100%] flex justify-between items-center border-b-[1px] border-[var(--blood-red-background)] ">
                    <div class="flex flex-col justify-between ">
                        <div class="font-bold text-[1.1rem]">Remove account</div>
                        <div>Remove your account from the shop</div>
                    </div>
                    <button
                        class="px-2 py-1 h-fit text-[var(--blood-red-background)] border-[2px] rounded border-[var(--blood-red-background)]">Remove</button>
                </div>
            </div>


        </div>
    </div>
</template>