<script>
import orderApi from '../../libs/apis/orderApi'

// import 
export default {
    data() {
        return {
            orders: [],
            open_EditModal: false,
            selectedOrder: null,
        }
    },
    methods: {
        formatDateDDMMYY_HHMMSS(timestamp) {
            const date = new Date(timestamp);

            const day = date.getDate().toString().padStart(2, "0");
            const month = (date.getMonth() + 1).toString().padStart(2, "0");
            const year = date.getFullYear().toString().slice(-2);
            const hours = date.getHours().toString().padStart(2, "0");
            const minutes = date.getMinutes().toString().padStart(2, "0");
            const seconds = date.getSeconds().toString().padStart(2, "0");

            return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        }
        , async chnageStatusToFinish() {
            console.log(this.selectedOrder);
            const res = await orderApi.update_AdminOnly(this.selectedOrder);
            this.open_EditModal = false
            if (!res) alert('failed to change the status of order')
            this.orders = await orderApi.exclude_busyOrder();

        }
    },

    async mounted() {
        this.orders = await orderApi.exclude_busyOrder();
    }
}
</script>

<template>
    <div class="min-h-screen flex flex-col p-4">
        <section class="w-fit flex flex-col overflow-auto">

            <table class="table-autu max-w-4xl">
                <thead class="bg-[var(--dashboard-background)] font-bold text-white">
                    <tr>
                        <th class="px-3 border whitespace-nowrap py-2">#ID</th>
                        <th class="px-3 border whitespace-nowrap py-2">Customer</th>
                        <th class="px-3 border whitespace-nowrap py-2">Total</th>
                        <th class="px-3 border whitespace-nowrap py-2">cash_receive</th>
                        <th class="px-3 border whitespace-nowrap py-2">Status</th>
                        <th class="px-3 border whitespace-nowrap py-2">Method</th>
                        <th class="px-3 border whitespace-nowrap py-2">Create</th>
                        <th class="px-3 border whitespace-nowrap py-2">Last update</th>
                        <th class="px-3 border whitespace-nowrap py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in orders" :key="order.id" class="bg-white hover:bg-gray-100">
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.id }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.user.firstName }}&ensp;{{
                            order.user.lastName }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.total }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.cash_receive }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.status }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ order.delivery_method }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ formatDateDDMMYY_HHMMSS(order.order_date) }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ formatDateDDMMYY_HHMMSS(order.updated_at) }}</td>
                        <td class="px-1 flex justify-evenly items-center py-2">

                            <button v-if="order.status!=='finished' && order.status!=='busy'" @click="open_EditModal = true; selectedOrder = order">
                                <img src="../../assets/image/edit.svg" class="h-5">
                            </button>
                            <button class="border-[2px] rounded-full w-6 h-6 text-orange-600" style="border-color: orangered;">
                                !
                            </button>
                          
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
        <div v-if="open_EditModal">
            <teleport to='body'>
                <div
                    class="fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20  background-opacity-70percent-black">
                    <div class="w-[350px] h-fit p-4 pb-8 flex flex-col gap-4 items-center bg-white rounded">
                        <div class="text-[2rem] font-bold text-green-600">
                            Status Change
                        </div>
                        <div class="text-[2rem] text-gray-800 font-semibold">
                            Are your sure?
                        </div>
                        <div>
                            <p class="text-center text-gray-500">
                                Do you really want to change the Status to finished? This process can not be undone
                            </p>
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click="open_EditModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click="chnageStatusToFinish()"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Change</button>
                        </div>
                    </div>
                </div>
            </teleport>
        </div>
    </div>
</template>
<style scoped>
tbody>:nth-child(even) {
    background-color: rgba(227, 227, 227, 0.756);
}

table * {
    border-color: black;
}

tbody>tr:hover {
    background: var(--tr-background-on-hover);
}
</style>


