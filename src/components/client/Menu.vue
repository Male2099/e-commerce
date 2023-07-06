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
        <div class="w-[var(--fixed-width)] flex flex-col items-center  gap-4">
            <section class="w-full">
                <div class="flex justify-center gap-6 text-[1.5rem] text-white font-bold">
                    <router-link to="#">
                        <div class="py-[0.6rem] px-4 rounded  bg-[var(--ctg-background)]">
                            All
                        </div>
                    </router-link>
                    <router-link to="#">
                        <div class="py-[0.6rem] px-4 rounded  bg-[var(--ctg-background)]">
                            Long Johns
                        </div>
                    </router-link>
                    <router-link to="#">
                        <div class="py-[0.6rem] px-4 rounded  bg-[var(--ctg-background)]">
                            Long Johns
                        </div>
                    </router-link>
                </div>
            </section>
            <section class="w-full flex flex-col">
                <div class="w-full flex flex-wrap gap-4 justify-center">
                    <donut />
                    <donut />
                    <donut />
                    <donut />
                    <donut />
                </div>
                <div class=" relative p-4">
                    <div class="absolute right-6 flex gap-3">
                        <button class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black bg-[var(--orange-background)]">1</button>
                        <button class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black">2</button>
                        <button class="h-[32px] w-[29px] font-bold rounded border-[1px] border-black">3</button>
                    </div>
                </div>
            </section>
        </div>

    </div>
</template>