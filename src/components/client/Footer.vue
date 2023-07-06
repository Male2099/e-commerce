<template>
    <footer class="h-[290px] w-full bg-black text-white py-4 mt-4 flex justify-center">
        <div class="h-full w-[var(--fixed-wdith)] flex justify-between">
            <section class="h-full flex flex-col justify-between">
                <div>
                    <strong class="font-[22px]">
                        NEWSLETTER SUBSCRIPTION
                    </strong>
                    <p class="mt-4">Get 10% discount for first purchase!</p>
                    <div class="flex flex-col justify-between">
                        <form action="#">
                            <div class="flex gap-2 h-[35px] my-2">
                                <input type="text" name="" id="" class="h-full w-[250px] pl-4 text-gray-500 rounded">
                                <button class="w-[120px] rounded bg-red-600">SUBSCRIBE</button>
                            </div>
                        </form>
                        <div class="flex">
                            <input type="checkbox" name="" id="">
                            <p>I have read and accept shop's
                                <a href="#" class=" border-b-[1px] pr-[2px]">Term</a>
                                and
                                <a href="#" class=" border-b-[1px] pr-[2px] pl-[1px]">Privacy</a>
                            </p>
                        </div>
                    </div>
                </div>
                <strong class=" font-[22px]">
                    <span class="mr-1 text-[1.1rem] font-bold"> ©</span>2023 online shop .All right reserved
                </strong>
            </section>
            <section class="flex flex-col justify-between">
                <div class="flex flex-col">
                    <strong class=" font-[22px] mb-4">
                        Help
                    </strong>
                    <a href="#">Online ordering</a>
                    <a href="#">Accessibility</a>
                    <a href="#">Shipping</a>
                    <a href="#">Return and Exchange</a>
                    <a href="#">FAQ</a>
                </div>
                <div class="flex flex-col">
                    <strong class=" font-[22px] my-4">
                        Feedback
                    </strong>
                    <a href="#">Leave a feedback</a>
                </div>
            </section>
            <section class="flex flex-col">
                <strong class=" font-[22px] mb-4">
                    Follow
                </strong>
                <a href="#">YouTube</a>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </section>
        </div>
    </footer>
</template>

<style>
a:hover{
    color: var(--menu-active-color);
    cursor: pointer;
}
</style>