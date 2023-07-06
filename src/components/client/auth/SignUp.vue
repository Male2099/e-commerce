<template>
    <div class="h-[100vh] w-[100vw] background-opacity-70percent-black fixed top-0 z-20 flex items-center justify-center">
        <form action="#">
            <div
                class="h-[24rem] w-[50rem] flex login_backgrounImage  rounded-[10px] overflow-hidden M-style-on-input relative">
                <button type="button" @click="$emit('onCancel')"
                    class="absolute top-2 right-3 h-fit w-fit  z-10">
                    <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                </button>
                <div class="w-[50%] h-full p-6 overflow-hidden flex flex-col gap-4  justify-center items-end ">
                    <div class="h-[2rem] w-[250px] text[1.4rem] font-bold text-white ">
                        <strong>Sign Up</strong>
                    </div>
                    <div class="h-[2.2rem] w-[250px]">
                        <input required="false" type="text" placeholder="  First name">
                    </div>
                    <div class="h-[2.2rem] w-[250px] ">
                        <input required="false" type="text" placeholder="  Last name">
                    </div>
                    <div class="h-[2.2rem] w-[250px] ">
                        <input required="false" type="text" placeholder="  Email">
                    </div>
                    <div class="h-[2.2rem] w-[250px] ">
                        <input required="false" type="password" placeholder="  Password">
                    </div>
                    <div class="h-[2.2rem] w-[250px] flex flex-col items-center text-white gap-2">
                        <button class="px-[1.5rem] py-[3px] rounded-2xl purple_background_color">Sign
                            Up</button>
                        <p>Already have an account?
                            <button @click="$emit('openLogin')">
                                <strong>Login</strong>
                            </button>
                        </p>
                    </div>
                </div>
                <div class="w-[50%] overflow-hidden flex items-center justify-center relative">
                    <div class="w-[32rem] h-[30rem] absolute flex justify-end items-center">
                        <img src="@/assets/image/login_register/Login_img.png" class="w-[32rem]">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<!-- @click="() => { open_LoginModal = false; open_SingUpModal = false }"  -->
<!--  @click="open_SingUpModal = true" -->