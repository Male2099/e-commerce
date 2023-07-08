<template>
    <div class="h-[100vh] w-[100vw] background-opacity-70percent-black fixed top-0 z-20 flex items-center justify-center overflow-hidden">
        <form action="#">
            <div class="py-2 pb-8 sm:px-8 h-fit flex flex-col login_backgrounImage rounded-[10px] relative overflow-hidden">
                <button type="button" @click="$emit('onCancel')" class="absolute top-2 right-3 h-fit w-fit z-10">
                    <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                </button>
                <div class="w-full flex items-center justify-center">
                    <img src="@/assets/image/login_register/Login_img.png" class="w-[20rem]">
                </div>
                <div class="flex flex-col gap-4 justify-center items-center">
                    <div class="w-[250px]">
                        <input required type="text" placeholder="Email" class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px]">
                        <input required type="password" placeholder="Password" class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px] flex flex-col items-center text-white gap-2">
                        <button class="px-[1.5rem] py-[3px] rounded-2xl purple_background_color">Login</button>
                        <p>Not yet have an account?
                            <button @click="$emit('openSignUp')">
                                <strong>Sign Up</strong>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<style>

.py-2.login_backgrounImage {
    background-image: url("@/assets/image/login_register/login_background.png");
    background-size: auto 100%;
    background-repeat: no-repeat;
    background-position: center;
    height: fit-content; 
}
</style>