<template>
    <div class="w-full flex justify-center">
        <div class="w-[var(--fixed-width)] p-4 flex max-sm:flex-col gap-4">
            <section class="w-[50%] max-sm:w-full h-fit M-style-on-input">
                <form action="#">
                    <div class="p-4 h-fit w-[85%]  max-sm:w-full max-sm:text max-sm:p-2 text-center flex flex-col gap-4 ">
                        <strong class="text-[2rem]">Contact</strong>
                        <p>Please fill out the form below to get touch with us. We'll do our best to respond to your inquiry
                            as
                            soon
                            as possible</p>
                        <div class="h-[2.2rem] w-full border rounded">
                            <input required="false" type="text" placeholder=" Your name">
                        </div>
                        <div class="h-[2.2rem] w-full  border rounded">
                            <input required="false" type="text" placeholder=" Email">
                        </div>
                        <div class="h-[15rem] w-full  border rounded">
                            <textarea class="min-w-full min-h-full pl-4 border rounded" placeholder="Message"></textarea>
                        </div>
                        <button class="w-full bg-[var(--blood-red-background)] flex justify-center">
                            <strong class="py-2 text-white font-bold">SEND</strong>
                        </button>
                    </div>
                </form>
                <div class="w-[82%] flex max-sm:flex-col justify-between pl-4 font-semibold text-[.9rem]">
                    <div class="flex gap-2">
                        <div>
                            <img src="../../assets/image/phone.svg" class=" h-7">
                        </div>
                        <div class="h-full flex flex-col justify-between">
                            <div>PHONE</div>
                            <div class="text-[var(--blood-red-background)]">123 123 123</div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <img src="../../assets/image/email.svg" class=" h-7">
                        </div>
                        <div class="h-full flex flex-col justify-between">
                            <div>EMAIL</div>
                            <div class="text-[var(--blood-red-background)]">someone@something.com</div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="w-[50%] flex items-center justify-center max-sm:w-full ">
                <div class="w-full ">
                    <img class="w-full"
                        src="https://th.bing.com/th/id/R.2cf02d4b5fb0c4ab07e8e89d0c346dfe?rik=eguXH5%2fhbxOivw&pid=ImgRaw&r=0"
                        alt="">
                </div>
            </section>
        </div>
    </div>
</template>
<style>
.M-style-on-input input {
    border-radius: 4px;
    width: 100%;
    padding: .25rem 0 .25rem 0;
    padding-left: .8rem;
    font-size: 1rem;
}

.M-style-on-input input:focus,
.M-style-on-input textarea:focus {
    border-radius: 4px;
    border: 2px solid var(--purple-background);
    outline: none;
}

.M-style-on-input input:focus::placeholder {
    color: transparent;
}
</style>