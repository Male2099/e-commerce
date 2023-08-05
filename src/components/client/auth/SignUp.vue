
<script>
import auth from '../../../libs/apis/auth';
import SignSuccess from './SignSuccess.vue';
export default {
    components: {
        SignSuccess,
    },
    data() {
        return {
            email: '',
            password: '',
            firstName: '',
            lastName: '',
            open_SignUpSuccessMoldal: false,
            onSignUpFail: false,

        }
    },
    methods: {
        async onSubmit(e) {
            e.preventDefault();
            const result = await auth.register({
                email: this.email, password: this.password,
                firstName: this.firstName, lastName: this.lastName
            });
            if (result) {
                this.$emit('registered');
                this.open_SignUpSuccessMoldal = true;
            } else {
                this.onSignUpFail = true
            }
        }
    }
}

</script>
<template>
    <div class="h-[100vh] w-[100vw] background-opacity-70percent-black fixed top-0 z-20 flex items-center justify-center">
        <form v-if="!open_SignUpSuccessMoldal" action="#" @submit="onSubmit">
            <div
                class="py-2 pb-8 sm:px-8  h-auto flex flex-col login_backgrounImage rounded-[10px] overflow-hidden relative">
                <button type="button" @click="$emit('onCancel')" class="absolute top-2 right-3 h-fit w-fit z-10">
                    <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                </button>
                <div class="w-full flex items-center justify-center">
                    <img src="@/assets/image/login_register/Login_img.png" class="w-[20rem]">
                </div>
                <!--  -->


                <div class="flex flex-col gap-4 justify-center items-center">
                    <div class="w-[250px]">
                        <input required type="text" v-model="firstName" placeholder="First name"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px]">
                        <input required type="text" v-model="lastName" placeholder="Last name"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px]">
                        <input required type="email" v-model="email" placeholder="Email"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="w-[250px]">
                        <input required type="password" v-model="password" placeholder="Password"
                            class="w-full px-3 py-1 text-[1rem] rounded ">
                    </div>
                    <div class="h-fit w-[250px] flex flex-col items-center text-white gap-2">
                        <button class="px-[1.5rem] py-[3px] rounded-2xl purple_background_color">Sign
                            Up</button>
                        <div v-if="onSignUpFail" class="bg-red-500 w-full py-2 text-center rounded">
                            The provided information is incorrect!
                        </div>
                        <p>Already have an account?
                            <button @click="$emit('openLogin')">
                                <strong>Login</strong>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <div v-else>
            <SignSuccess @onContinue="open_SignUpSuccessMoldal = false" @onCancel="$emit('onCancel')" />
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
    /* set the height of the container to fit the height of its content */
}
</style>