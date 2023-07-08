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
    <div class="w-full flex flex-col items-center py-4">
        <div class="w-[var(--fixed-width)] max-w-[100vw] p-4 max-sm:p-0 flex max-sm:flex-col gap-4 relative">
            <!-- <router-link to="/" class="absolute left-0 top-4 max-sm:top-0 flex items-center gap-[2px]">
                <span>
                    <img src="../../assets/image/arrow-left.svg" class="h-4" alt="">
                </span>
                <span> Back</span>
            </router-link> -->
            <section class="w-[50%] max-sm:w-full p-4 max-sm:p-0">
                <div class="w-full overflow-hidden">
                    <img class="max-w-full" src="@/assets/random-image/donutoffer.png" alt="">
                </div>
                <div class="h-[5rem] flex items-center gap-4 ">
                    <span class="h-full overflow-hidden">
                        <img class="h-full" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                    <span class="h-[70%] overflow-hidden">
                        <img class="h-full brightness-75" src="@/assets/random-image/donutoffer.png" alt="">
                    </span>
                </div>
            </section>
            <section class="w-[50%] max-sm:w-full p-4 flex flex-col overflow-auto">
                <span class="w-fit px-2 rounded purple_background_color text-white">
                    <strong>30% Discount</strong>
                </span>
                <div class="text-[2.25rem] max-sm:text-[1.5rem] flex items-center gap-1 font-semibold">
                    <div class="h-[3.5rem] flex items-center overflow-hidden rounded">
                        <img class="w-[3.5rem] h-fit object-contain" src="@/assets/random-image/donutoffer.png" alt="">
                    </div>
                    <div>Donut12333</div>
                </div>
                <!-- <div class=" flex gap-2 mb-4">
                    <span class="h-6 flex items-center">
                        <img class="h-full" src="@/assets/image/star.svg" alt="">
                        <img class="h-full" src="@/assets/image/star.svg" alt="">
                        <img class="h-full" src="@/assets/image/star.svg" alt="">
                        <img class="h-full" src="@/assets/image/star.svg" alt="">
                        <img class="h-full" src="@/assets/image/star.svg" alt="">
                        <span class="ml-1 text-[1.2rem]  text-sm">(10 reviewers)</span>
                    </span>
                </div> -->
                <strong>Description</strong>
                <ul class="pl-6 pt-2">
                    <li class="list-disc">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                    <li class="list-disc">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                    <li class="list-disc">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                    <li class="list-disc">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                    <li class="list-disc">Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                </ul>
                <strong class="mt-2">Ingrediants</strong>
                <ul class="pl-6 pt-2">
                    <li class="list-disc">salt 100%</li>
                    <li class="list-disc">salt 100%</li>
                    <li class="list-disc">salt 100%</li>
                </ul>
            </section>
        </div>
        <div
            class="w-[85%] max-sm:w-full p-1 pl-4 max-sm:p-0 pr-8 flex max-sm:flex-col items-center justify-between border-[1px] max-sm:border-none shadow rounded top-[72vh]">
            <div class="flex w-[70%] max-sm:w-full justify-between">
                <div class="text-[1.1rem] flex items-center gap-1 font-semibold">
                    <div class="h-[3.5rem] flex items-center overflow-hidden rounded">
                        <img class="w-[3.5rem] h-fit object-contain" src="@/assets/random-image/donutoffer.png" alt="">
                    </div>
                    <div>Donut12333</div>
                </div>
                <div class=" flex gap-3 items-center">
                    <div class="max-sm:hidden">Quantity</div>
                    <div class="sm:hidden max-sm:static">QTY</div>
                    <button @click="() => { quantity != 1 ? quantity-- : quantity }"
                        class="px-[.3rem] rounded border-[2px] border-[var(--sky-background)]">-</button>
                    <div
                        class="min-w-[2rem] minw-fit h-[2rem] flex justify-center items-center rounded border-[2px] border-gray-500">
                        {{ quantity }}
                    </div>
                    <button @click="() => { quantity = quantity + 1 }"
                        class="px-[.4rem] rounded border-[2px] border-[var(--sky-background)]">+</button>
                </div>
            </div>
            <div>
                <button class="font-bold px-4 py-2 rounded text-white bg-[var(--sky-background)]">ADD TO CART</button>
            </div>
        </div>


    </div>
</template>