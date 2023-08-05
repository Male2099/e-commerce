<script>
import auth from '../../../libs/apis/auth';
import LoginSuccess from './LoginSuccess.vue';
export default {
    components: {
        LoginSuccess
    },
    data() {
        return {
            email: '',
            password: '',
            open_loginSuccessMoldal: false,
            onLoginFail: false,
        }
    },
    methods: {
        async onSubmit(e) {
            e.preventDefault();
            const result = await auth.login({ email: this.email, password: this.password });
            if (result) {
                this.open_loginSuccessMoldal = true;
                this.$emit('loggedIn')
            } else {
                this.onLoginFail = true;
            }
        }
    }
}
</script>


<template>
    <div
        class="h-[100vh] w-[100vw] background-opacity-70percent-black fixed top-0 z-20 flex items-center justify-center overflow-hidden">
        <form v-if="!open_loginSuccessMoldal" action="#" @submit="onSubmit">
            <div class="py-2 pb-8 sm:px-8 h-fit flex flex-col login_backgrounImage rounded-[10px] relative overflow-hidden">
                <button type="button" @click="$emit('onCancel')" class="absolute top-2 right-3 h-fit w-fit z-10">
                    <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                </button>
                <div class="w-full flex items-center justify-center">
                    <img src="@/assets/image/login_register/Login_img.png" class="w-[20rem]">
                </div>


                <!--  -->
                <div class="flex flex-col gap-4 justify-center items-center">
                    <div class="w-[250px]">
                        <input required type="email" name="email" v-model="email" placeholder="Email"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px]">
                        <input required type="password" name="password" v-model="password" placeholder="Password"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px] flex flex-col items-center text-white gap-2">
                        <button class="px-[1.5rem] py-[3px] rounded-2xl purple_background_color">Login</button>
                        <div v-if="onLoginFail" class="bg-red-500 w-full py-2 text-center rounded">
                            The provided information is incorrect!
                        </div>
                        <p>Not yet have an account?
                            <button @click="$emit('openSignUp')">
                                <strong>Sign Up</strong>
                            </button>
                        </p>
                    </div>
                </div>

            </div>
        </form>
        <div v-else>
            <LoginSuccess @onContinue="open_loginSuccessMoldal = false;"
                @onCancel="open_loginSuccessMoldal = false; $emit('onCancel')" />
        </div>
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