<script>
export default {
    data() {
        return {
            quantity: 1,

        }
    }
}
</script>


<template>
    <div class="w-full mb-2 flex justify-between border-b font-bold text-[1.25rem]">
        <div>Cart</div>
        <div>7 etems</div>
    </div>
    <!-- play as table... -->
    <div class="w-full flex flex-col gap-3">
        <div class="w-ful flex">
            <div class="w-[40%] font-bold text-[1.1rem] text-gray-500 pl-4">Product details</div>
            <div class="w-[20%] font-bold text-[1.1rem] text-gray-500 flex justify-center">Quantity</div>
            <div class="w-[20%] font-bold text-[1.1rem] text-gray-500 flex justify-center">Price</div>
            <div class="w-[20%] font-bold text-[1.1rem] text-gray-500 flex justify-center">Total</div>
        </div>
        <!-- tr -->
        <div class="w-full h-[6rem] flex">
            <div class="w-[40%]  flex items-center font-bold text-[1.1rem] text-gray-500">
                <div class="w-[8.1rem] h-[90%] overflow-hidden">
                    <img class="h-full object-contain" src="@/assets/random-image/donutoffer.png" alt="">
                </div>
                <div>
                    <div class="text-[1.35rem] font-bold text-black">Donut123</div>
                    <div class="text-[.9rem] font-bold text-[var(--purple-background)]">Doiscounr 10%</div>
                    <button class="text-[.9rem] text-[var(--blood-red-background)]">remove</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem] text-black  flex justify-center">
                <div class="flex gap-1 items-center h-full">
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity != 1 ? quantity-- : quantity }">-</button>
                    <div class="w-[3rem] h-[3rem] flex justify-center items-center border-[2px] rounded">
                        {{ quantity }}
                    </div>
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity = quantity + 1 }">+</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>0.99$</div>
            </div>
            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>12.99$</div>
            </div>
        </div>
        <!-- /tr -->
        <!-- tr -->
        <div class="w-full h-[6rem] flex">
            <div class="w-[40%]  flex items-center font-bold text-[1.1rem] text-gray-500">
                <div class="w-[8.1rem] h-[90%] overflow-hidden">
                    <img class="h-full object-contain" src="@/assets/random-image/donutoffer.png" alt="">
                </div>
                <div>
                    <div class="text-[1.35rem] font-bold text-black">Donut123</div>
                    <div class="text-[.9rem] font-bold text-[var(--purple-background)]">Doiscounr 10%</div>
                    <button class="text-[.9rem] text-[var(--blood-red-background)]">remove</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem] text-black  flex justify-center">
                <div class="flex gap-1 items-center h-full">
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity != 1 ? quantity-- : quantity }">-</button>
                    <div class="w-[3rem] h-[3rem] flex justify-center items-center border-[2px] rounded">
                        {{ quantity }}
                    </div>
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity = quantity + 1 }">+</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>0.99$</div>
            </div>
            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>12.99$</div>
            </div>
        </div>
        <!-- /tr -->
        <!-- tr -->
        <div class="w-full h-[6rem] flex">
            <div class="w-[40%]  flex items-center font-bold text-[1.1rem] text-gray-500">
                <div class="w-[8.1rem] h-[90%] overflow-hidden">
                    <img class="h-full object-contain" src="@/assets/random-image/donutoffer.png" alt="">
                </div>
                <div>
                    <div class="text-[1.35rem] font-bold text-black">Donut123</div>
                    <div class="text-[.9rem] font-bold text-[var(--purple-background)]">Doiscounr 10%</div>
                    <button class="text-[.9rem] text-[var(--blood-red-background)]">remove</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem] text-black  flex justify-center">
                <div class="flex gap-1 items-center h-full">
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity != 1 ? quantity-- : quantity }">-</button>
                    <div class="w-[3rem] h-[3rem] flex justify-center items-center border-[2px] rounded">
                        {{ quantity }}
                    </div>
                    <button class="font-bold text-[1.4rem] p-2" type="button"
                        @click="() => { quantity = quantity + 1 }">+</button>
                </div>
            </div>

            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>0.99$</div>
            </div>
            <div class="w-[20%] font-bold text-[1.1rem]  flex justify-center items-center text-black">
                <div>12.99$</div>
            </div>
        </div>
        <!-- /tr -->
    </div>
    <!--  -->
</template>