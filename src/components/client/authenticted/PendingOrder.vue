<script>
export default {
    data() {
        return {
            quantity: 1,
            open_CancelOrderModal: false,
        }
    },
    methods: {
        disableScroll_OnOpenModal() {
            document.body.classList.add('modal-open');
        },
        enableScroll_OnCloseModal() {
            document.body.classList.remove('modal-open');
        },
    },
    watch: {
        open_CancelOrderModal(newVal) {
            if (this.open_CancelOrderModal) {
                this.disableScroll_OnOpenModal();
            } else {
                this.enableScroll_OnCloseModal();
            }
        }
    }
}
</script>


<template>
    <div class="w-full flex justify-center py-4 max-sm:p-0 min-h-[85vh]">
        <div class="w-[var(--fixed-width)] max-w-[100vw] h-fit  p-4 max-sm:p-2 flex max-sm:flex-col max-sm:gap-4 gap-8">
            <section class=" w-[45%] max-sm:w-full flex flex-col">
                <div class="w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]">
                    <div>Pendign order</div>
                    <div>6 orders</div>
                </div>
                <ul class=" flex flex-col gap-4">
                    <li class="border-b">

                        <div class="w-full mb-2 font-bold text-[1.25rem]">
                            <div class=" font-bold text-[1.1rem] text-gray-500">Date: 10-12-2023 11AM</div>
                        </div>
                        <div class="w-full gap-4 flex font-bold text-[1rem] justify-between">
                            <div class="w-full gap-4 flex ">
                                <div class="h-full flex items-center">
                                    <img class="h-[3rem]" src="../../../assets/image/resourceicon.svg" alt="">
                                </div>
                                <div class="text-[var(--purple-background)]">
                                    <div>Item 3</div>
                                    <div>Total: 5.99$</div>
                                    <div>Promocode: none</div>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between">
                                <button class="px-2 py-1 rounded text-white bg-[var(--purple-background)]">Detail</button>
                                <button @click="open_CancelOrderModal=true" 
                                 class="w-[7rem] text-[var(--blood-red-background)]">Cancel order</button>
                            </div>
                        </div>
                    </li>
        

                </ul>



            </section>
            <section
                class="min-h-[100vh] max-sm:h-fit max-sm:min-h-fit w-[55%] max-sm:w-full pl-4 max-sm:pl-0 bg-[#F4F4F4]">
                <div class="w-full mb-2 border-b font-bold text-[1.25rem]">
                    <div>item 1</div>
                </div>
                <div class="w-ful flex">
                    <div class="w-[40%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 pl-4">
                        Product</div>
                    <div
                        class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center">
                        Quantity</div>
                    <div
                        class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center">
                        Price</div>
                    <div
                        class="w-[20%] font-bold max-sm:font-semibold text-[1.1rem] max-sm:text-[1rem] text-gray-500 flex justify-center">
                        Total</div>
                </div>
                <ul>
                    <li class="w-full flex flex-col gap-3 max-sm:gap-1">

                        <div class="w-full h-[5.6rem] flex border-b">
                            <div class="w-[40%]  flex items-center font-bold text-[1.1rem] gap-1 text-gray-500">
                                <div class=" h-[70%] overflow-hidden">
                                    <img class="h-full max-sm:w-[3.5rem] max-sm:h-fit object-contain"
                                        src="@/assets/random-image/donutoffer.png" alt="">
                                </div>
                                <div class="h-[100%] flex flex-col justify-around">
                                    <div
                                        class="text-[1.35rem] max-sm:text-[1rem]   font-bold max-sm:font-semibold text-black">
                                        Donut123</div>
                                    <div
                                        class="text-[.9rem] max-sm:text-[.75rem] font-semibold text-[var(--purple-background)]">
                                        Doiscount 10%</div>
                                </div>
                            </div>

                            <div class="w-[20%] font-bold text-[1.1rem] text-black  flex justify-center">
                                <div class="flex gap-1 max-sm:gap-0 items-center h-full">

                                    <div
                                        class="w-[3rem] max-sm:w-6 h-[3rem] max-sm:h-6 max-sm:font-semibold  max-sm:text-[.9rem]  flex justify-center items-center rounded">
                                        {{ quantity }}
                                    </div>

                                </div>
                            </div>
                            <div
                                class="w-[20%] font-bold max-sm:font-semibold  max-sm:text-[.9rem] text-[1.1rem] flex justify-center items-center text-black">
                                <div>0.99$</div>
                            </div>
                            <div
                                class="w-[20%] font-bold text-[1.1rem]  max-sm:font-semibold  max-sm:text-[.9rem]  flex justify-center items-center text-black">
                                <div>12.99$</div>
                            </div>
                        </div>
                    </li>

                </ul>
            </section>

        </div>
        <div v-if="open_CancelOrderModal">
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
                                Do you really want to remove this order? <br/> you will need provide reason
                            </p>
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click="open_CancelOrderModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click="open_CancelOrderModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Remove</button>
                        </div>
                    </div>
                </div>
            </teleport>

        </div>
    </div>
</template>