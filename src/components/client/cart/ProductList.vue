<script>
import orderApi from '../../../libs/apis/orderApi'
import orderDetailApi from '../../../libs/apis/orderDetailApi'
export default {
    data() {
        return {
            quantityChange: false,
            open_RemoveProductModal: false,
            confirm_ToRemoveProduct: false,
            selectedProduct: null,
            order: {},
            orderDetails: [],
            totalCost: 0,
        }
    },
    methods: {
        async delelteProductDetail() {
            const res = await orderDetailApi.delete(this.selectedProduct.id)
            if (!res) alert('fail to remocve order');
            else this.$emit('reloadPage');
            this.order = await orderApi.currentOrder()
            this.orderDetails = this.order.order_details;

            this.quantityChange = false;
        },
        async updateOrderDetail(data) {
            if (!this.quantityChange) return;
            this.$emit('reloadPage');
            const res = await orderDetailApi.update(data)
            if (!res) alert('fail to remocve order');

            this.order = await orderApi.currentOrder()
            this.orderDetails = this.order.order_details;
        },
        disableScroll_OnOpenModal() {
            document.body.classList.add('modal-open');
        },
        enableScroll_OnCloseModal() {
            document.body.classList.remove('modal-open');
        },
    },
    async mounted() {
        this.order = await orderApi.currentOrder()
        this.orderDetails = this.order.order_details;
        this.orderDetails.forEach(od => {
            this.totalCost += od.subtotal;
        })
    },
    watch: {
        open_RemoveProductModal(newVal) {
            if (this.open_RemoveProductModal) {
                this.disableScroll_OnOpenModal();
            } else {
                this.enableScroll_OnCloseModal();
            }
        }
    }
}
</script>



<template>
    <div>
        <div class="w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]">
            <div class="flex">
                <div class="text-[var(--menu-active-color)]">Cart</div>
                <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                        class="h-4 rotate-180"></div>
                <div> Cutomer Infomation</div>
                <div class="w-6 flex items-center justify-center"><img src="../../../assets/image/arrow-left.svg"
                        class="h-4 rotate-180"></div>
                <div> PaymentMethod</div>
            </div>
            <div>{{ orderDetails.length }} Items</div>

        </div>
        <div class="w-ful flex">
            <div class="w-[40%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem]  text-gray-500 pl-4">Product
            </div>
            <div
                class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem]  text-gray-500 flex justify-center">
                Quantity</div>
            <div
                class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem]  text-gray-500 flex justify-center">
                Price</div>
            <div
                class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem]  text-gray-500 flex justify-center">
                Total</div>
        </div>
        <!-- play as table... -->
        <ul>
            <li v-for="odt in orderDetails" :key="odt.id" class="w-full flex flex-col gap-3 max-sm:gap-1">
                <div class="w-full h-[5.6rem] flex border-b">
                    <div class="w-[40%] min-w-fit  flex items-center gap-2 font-bold text-[1.1rem] text-gray-500">
                        <div class=" h-[70%] overflow-hidden">
                            <img class="h-full max-sm:w-[3.5rem] max-sm:h-fit object-contain" :src="odt.product.imageUrl"
                                alt="">
                        </div>
                        <div>
                            <div class="text-[1.35rem] max-sm:text-[1rem]   font-bold max-sm:font-semibold text-black">
                                {{ odt.product.name }}</div>
                            <div v-if="odt.product.discount > 0"
                                class="text-[.9rem] max-sm:text-[.75rem] font-semibold text-[var(--purple-background)]">
                                Doiscount {{ odt.product.discount }}%</div>
                            <button @click="open_RemoveProductModal = true; selectedProduct = odt"
                                class="text-[.9rem] max-sm:text-[.75rem] font-semibold  text-[var(--blood-red-background)]">remove</button>
                        </div>
                    </div>

                    <div class="w-[20%] font-bold text-[1.1rem] text-black  flex justify-center">
                        <div class="flex gap-1 max-sm:gap-0 items-center h-full">
                            <button
                                class="font-bold text-[1.4rem] p-2 max-sm:p-1 max-sm:font-semibold  max-sm:text-[.9rem] "
                                type="button" @mouseleave="updateOrderDetail(odt)"
                                @click="() => { odt.quantity != 1 ? odt.quantity-- : odt.quantity; quantityChange = true }">-</button>
                            <div
                                class="w-[3rem] max-sm:w-6 h-[3rem] max-sm:h-6 max-sm:font-semibold  max-sm:text-[.9rem]  flex justify-center items-center border-[2px] max-sm:border[1px] rounded">
                                {{ odt.quantity }}
                            </div>
                            <button
                                class="font-bold text-[1.4rem] max-sm:p-1 p-2 max-sm:font-semibold  max-sm:text-[.9rem] "
                                type="button" @mouseleave="updateOrderDetail(odt)"
                                @click="() => { odt.quantity = odt.quantity + 1; quantityChange = true }">+</button>
                        </div>
                    </div>

                    <div
                        class="w-[20%] font-bold max-sm:font-semibold  max-sm:text-[.9rem] text-[1.1rem] flex justify-center items-center text-black">
                        <div>{{ odt.product.price }}$</div>
                    </div>
                    <div
                        class="w-[20%] font-bold text-[1.1rem]  max-sm:font-semibold  max-sm:text-[.9rem]  flex justify-center items-center text-black">
                        <div>{{ (odt.product.price * odt.quantity).toFixed(2) }}$</div>
                    </div>
                </div>
            </li>
        </ul>
        <div v-if="open_RemoveProductModal">
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
                                Do you really want to remove this product? This process can not be undone
                            </p>
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click=" open_RemoveProductModal = false;"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click="delelteProductDetail(); open_RemoveProductModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Remove
                            </button>
                        </div>
                    </div>
                </div>
            </teleport>

        </div>
    </div>
</template>
<style></style>