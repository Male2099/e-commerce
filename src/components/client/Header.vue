<script>
import Login from '@/components/client/auth/Login.vue';
import SignUp from '@/components/client/auth/SignUp.vue';
export default {
    components: {
        Login,
        SignUp,
    },
    data() {
        return {
            open_LoginModal: false,
            open_SingUpModal: false,
            fristName: '',
            lastName: '',
            email: '',
            password: '',
            authenticatedUser: false,
        }
    },
    methods: {

    },
    mounted() {

    }
}

</script>

<template>
    <header class="fixed min-w-full nav-background-linear-gradient flex items-center justify-between shadow-lg gap-4 z-10">
        <div class="flex">
            <div class=" bg-white w-[18rem]">
                <button @click="authenticatedUser = !authenticatedUser">logo</button>
                <!-- <router-link to="/">
                    logo
                </router-link> -->
            </div>
            <nav class="h-[60px] w-[350px] flex justify-between items-center text-white self-center">
                <router-link to="/"><strong>Home</strong></router-link>
                <router-link to="/menu"><strong>Menu</strong></router-link>
                <router-link to="/about"><strong>About</strong></router-link>
                <router-link to="/contact"><strong>Contact</strong></router-link>
            </nav>
        </div>
        <div class="flex gap-[1rem]">
            <div class="flex items-center">
                <div class=" h-[34px] w-[250px] flex rounded-[4px] bg-white">
                    <input required="false" type="text" placeholder=" search"
                        class="pl-[.5rem] h-[34px] w-[250px] rounded-[4px] bg-white">
                    <button><img src="../../assets/image/searchIcon.svg" class="h-[2rem] filter-black" alt=""></button>
                </div>
            </div>

            <div class="flex gap-4 ">
                <div v-if="!authenticatedUser">
                    <button @click="open_LoginModal = true"
                        class="pl-1 py-[2px] pr-[0.6rem] flex items-center gap-1 text-white bg-[#283856] rounded-[4px]">
                        <div class="relative h-8 w-8">
                            <img src="../../assets/image/user.svg" alt=""
                                class="h-[2rem] filter-white absolute left-[-.8rem]">
                        </div>
                        <strong v-if="!authenticatedUser">Login</strong>
                        <strong v-else>You</strong>
                    </button>
                </div>

                <div v-else class="flex flex-col items-start relative">
                    <div class="absolute flex flex-col">
                        <button
                            class="pl-1 py-[2px] pr-[0.6rem] flex items-center gap-1 text-white bg-[#283856] rounded-[4px]">
                            <div class="relative h-8 w-8">
                                <img src="../../assets/image/user.svg" alt=""
                                    class="h-[2rem] filter-white absolute left-[-.8rem]">
                            </div>
                            <strong>You</strong>
                        </button>
                        <div class="flex flex-col items-start">
                            <button class="px-1 py-[2px] bg-[#283856] w-[10rem] text-white rounded hover:bg-yellow-600">Your
                                profile</button>
                            <button
                                class="px-1 py-[2px] bg-[#283856] w-[10rem] text-white rounded hover:bg-yellow-600">Pending
                                order</button>
                            <button
                                class="px-1 py-[2px] bg-[#283856] w-[10rem] text-white rounded hover:bg-yellow-600">History</button>
                            <button
                                class="px-1 py-[2px] bg-[#283856] w-[10rem] text-white rounded hover:bg-yellow-600">Logout</button>
                        </div>
                    </div>
                </div>

                <router-link to="/cart">
                    <button class="pl-1 py-[2px] pr-[0.6rem] flex items-center gap-1 text-white bg-[#283856] rounded-[4px]">
                        <div class="relative h-8 w-8">
                            <img src="../../assets/image/Cart.svg" alt=""
                                class="h-[2rem] filter-white absolute left-[-.8rem]">
                        </div>
                        <strong>Cart</strong>
                    </button>
                </router-link>
            </div>
        </div>
    </header>
    <div v-if="open_LoginModal && !authenticatedUser" class="absolute">
        <teleport to="body">
            <login v-if="!open_SingUpModal" @openSignUp="open_SingUpModal = true"
                @onCancel="open_LoginModal = false; open_SingUpModal = false" />

            <SignUp v-else @openLogin="open_SingUpModal = false"
                @onCancel="open_LoginModal = false; open_SingUpModal = false" />
        </teleport>
    </div>
</template>

<style>
.background-opacity-70percent-black {
    background-color: rgb(0, 0, 0, 0.7)
}

.login_backgrounImage {
    background-image: url("@/assets/image/login_register/login_background.png");
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
}

.login_Image {
    background-image: url("@/assets/image/login_register/Login_img.png");
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
}

.M-style-on-input input {
    border-radius: 4px;
    width: 100%;
    padding: .25rem 0 .25rem 0;
    padding-left: .8rem;
    font-size: 1rem;
}

.M-style-on-input input:focus {
    border-radius: 4px;
    border: 2px solid var(--purple-background);
    outline: none;
}

.M-style-on-input input:focus::placeholder {
    color: transparent;
}

.M-cancel-on-hover:hover {
    filter: invert(100%) sepia(100%) saturate(100%) hue-rotate(0deg) brightness(100%) contrast(120%);
    cursor: pointer;
}</style>