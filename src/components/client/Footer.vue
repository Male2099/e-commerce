<template>
    <footer class=" w-full bg-black text-white p-2 pb-6 mt-4 flex justify-center max-sm:relative">
        <div class=" w-[var(--fixed-wdith)] flex max-sm:flex-col justify-between">
            <section class="max-sm:w-full flex flex-col relative max-sm:static">
                <div class="flex flex-col">
                    <div class="text-[1.25rem] font-bold text-[var(--menu-active-color)]">
                        NEWSLETTER SUBSCRIPTION
                    </div>
                    <p>Get 10% discount for first purchase!</p>
                    <div class="flex flex-col justify-between">

                        <form action="#">
                            <div class="flex gap-2 my-2">
                                <input type="text" name="" id="" class="h-[35px] w-[230px] pl-4 text-gray-500 rounded">
                                <button class="w-[100px] h-[35px] rounded bg-red-600">SUBSCRIBE</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex">
                        <input type="checkbox" name="" id="">
                        <p>I have read and accept shop's
                            <a href="#" class=" border-b-[1px] pr-[2px]">Term</a>
                            and
                            <a href="#" class=" border-b-[1px] pr-[2px] pl-[1px]">Privacy</a>
                        </p>
                    </div>
             
                </div>

            </section>
            <section class=" max-sm:w-full flex flex-col max-sm:flex-row justify-between">
                <div class="flex flex-col max-sm:w-full ">
                    <div class="text-[1.25rem] font-bold text-[var(--menu-active-color)]">
                        Help
                    </div>
                    <a href="#">Online ordering</a>
                    <a href="#">Accessibility</a>
                    <a href="#">Shipping</a>
                    <a href="#">Return and Exchange</a>
                    <a href="#">FAQ</a>
                </div>
                <div class="flex flex-col  max-sm:w-full">
                    <div class="text-[1.25rem] font-bold text-[var(--menu-active-color)]">
                        Feedback
                    </div>
                    <a href="#">Leave a feedback</a>
                </div>
            </section>
            <section class=" max-sm:w-full flex gap-[8rem]">
                <div class=" max-sm:w-full flex flex-col">
                    <div class="text-[1.25rem] font-bold text-[var(--menu-active-color)]">
                        Navigation
                    </div>
                    <a href="#">Home</a>
                    <a href="#">Menu</a>
                    <a href="#">Contact</a>
                    <a href="#">About</a>
                </div>
                <div class=" max-sm:w-full flex flex-col">
                    <div class="text-[1.25rem] font-bold text-[var(--menu-active-color)]">
                        Follow
                    </div>
                    <a href="#">YouTube</a>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Instagram</a>
                </div>
            </section>
        </div>
        <!-- <div class="absolute bottom-0 sm:left-0 max-sm:right-4 max-sm:bottom-6 ">
                        © All copy right reserved 2023
                    </div> -->
    </footer>
</template>

<style>
a:hover {
    color: var(--menu-active-color);
    cursor: pointer;
}

/* footer{
    background-image: url('https://th.bing.com/th/id/R.4016cfe76860c30b6b40646dc25fb825?rik=1CjFhsqMi5XilQ&pid=ImgRaw&r=0');
} */
</style>