<script>
import donut from "@/random/data.vue"
export default {
    components: {
        donut
    }
}
</script>
<template>
    <div class="w-full flex justify-center py-4 px-4">
        <div class="w-[var(--fixed-width)] max-w-[100vw] flex flex-col items-center  gap-4">
            <div class="w-[100vw]">
                <div class="flex justify-center text-[2.4rem] max-sm:text-[1.5rem] font-bold orange-backgroundColor">EXPLORE
                    THE
                    COLLECTION</div>
            </div>
            <section class="flex gap-4 justify-center py-4 w-full overflow-auto">
                <div class="w-full flex gap-1">
                    <donut />
                    <donut />

                </div>
            </section>
            <section class="flex flex-col gap-4">
                <div class="h-fit w-full flex max-sm:flex-col-reverse rounded shadow-md overflow-hidden">
                    <div class="w-[50%] max-sm:w-full p-4 flex flex-col items-center">
                        <Strong class="w-[20rem]">Sweeten Up this July 4th</Strong>
                        <div class="text-[1.8rem] font-bold w-[20rem]">WITH KRISPY KREME CATERING</div>
                        <p class="w-[20rem]">With delivery up to 30 miles, we are here to make your event one to remember!
                        </p>
                        <div class="mt-4">
                            <button
                                class="px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]">
                                <a href="/product/1">CHECK IT OUT</a>
                            </button>
                        </div>
                    </div>
                    <div class="w-[50%] max-sm:w-full">
                        <img src="@/assets/random-image/Frame_44.png" class="w-full overflow-hidden" alt="">
                    </div>
                </div>
                <div class="h-fit w-full flex-row-reverse flex max-sm:flex-col-reverse rounded shadow-md overflow-hidden ">
                    <div class="w-[50%] max-sm:w-full p-4 flex flex-col items-center">
                        <Strong class="w-[20rem]">Sweeten Up this July 4th</Strong>
                        <div class="text-[1.8rem] font-bold w-[20rem]">WITH KRISPY KREME CATERING</div>
                        <p class="w-[20rem]">With delivery up to 30 miles, we are here to make your event one to remember!
                        </p>
                        <div class="mt-4">
                            <button
                                class="px-4 py-1 font-bold text-black border-[2px] border-black rounded-2xl hover:text-[var(--menu-active-color)]">
                                <a href="/product/1">CHECK IT OUT</a>
                            </button>
                        </div>
                    </div>
                    <div class="w-[50%] max-sm:w-full">
                        <img src="@/assets/random-image/Frame_44.png" class="w-full overflow-hidden" alt="">
                    </div>

                </div>





            </section>
        </div>
</div>
</template>