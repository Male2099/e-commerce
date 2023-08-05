
<script>
import Login from '@/components/client/auth/Login.vue';
import SignUp from '@/components/client/auth/SignUp.vue';
import auth from '../../libs/apis/auth';
import router from '../../router';
import logo from '../logo.vue';


export default {
    components: {
        Login,
        SignUp,
        logo
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
        async onLogout() {
            const result = await auth.logout();
            if (result) {
                this.authenticatedUser = false;
                router.push('/')
            }
        },
        handleScroll() {
            const header = document.querySelector('header');
            const searchList = document.getElementById('searchlist');

            if (window.scrollY > header.offsetHeight) {
                searchList.style.top = '0';
            } else {
                searchList.style.top = '';
            }
        },
        disableScroll_OnOpenModal() {
            document.body.classList.add('modal-open');
        },
        enableScroll_OnCloseModal() {
            document.body.classList.remove('modal-open');
        },
    },
    beforeCreate() {
        auth.getMe().then(me => {
            if (me) this.authenticatedUser = true
            else this.authenticatedUser = false
        }).catch(e => {
            console.log(e);
        });
    },

    watch: {
        open_LoginModal(newVal) {
            if (this.open_LoginModal) {
                this.disableScroll_OnOpenModal();
            } else {
                this.enableScroll_OnCloseModal();
            }
        }
    },
    async mounted() {
        // await this.authMe()
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>
<template>
    <header
        class="relative min-w-full min-h-fit nav-background-linear-gradient flex items-center justify-between shadow-lg gap-4 z-10">
        <div class="flex max-sm:flex-col ">
            <div class=" w-[15rem] h-[60px] flex justify-center items-center max-sm:h-[50px] max-sm:justify-start max-sm:pl-1">
                <router-link to="/" class="w-fit">
                    <logo />
                </router-link>
            </div>
            <nav class="h-full w-[350px] max-sm:py-2 flex justify-between items-center text-white self-center max-sm:justify-evenly">
                <router-link to="/"><strong>Home</strong></router-link>
                <router-link to="/menu"><strong>Menu</strong></router-link>
                <router-link to="/about"><strong>About</strong></router-link>
                <router-link to="/contact"><strong>Contact</strong></router-link>
            </nav>
        </div>

        <div id="searchlist"
            class="fixed z-20 flex gap-2 max-lg:gap-1 h-fit items-center right-2 max-lg:right-1 top-[.8rem] ">
            <div class="flex items-center h-[34px] w-fit">
                <button class="px-1 flex items-center gap-1 text-white bg-[#283856] rounded-[4px] max-lg:p-0">
                    <img src="../../assets/image/searchIcon.svg" class="h-[1.7rem] filter-white">
                </button>
            </div>

            <div class="flex gap-2 max-lg:gap-1">
                <div v-if="!authenticatedUser" class="flex items-center h-[1.7rem] w-fit">
                    <button @click="open_LoginModal = true;"
                        class="px-2 flex items-center gap-1 text-white bg-[#283856] rounded-[4px] max-lg:p-0">
                        <img src="../../assets/image/user.svg" alt="" class="h-[1.7rem]  filter-white">

                        <strong class="max-sm:hidden">Login</strong>
                    </button>
                </div>

                <div v-else class="w-[4.3rem] max-lg:w-[1.7rem] h-[1.7rem] flex flex-col items-start relative ">
                    <div class="absolute flex flex-col h-[1.7rem] hover:h-fit w-full overflow-hidden hover:w-[7rem]">
                        <button class="w-fit pr-2 flex items-center gap-1 text-white bg-[#283856] rounded-[4px] max-lg:p-0">
                            <img src="../../assets/image/user.svg" alt="" class="h-[1.7rem]  filter-white">
                            <strong class="max-sm:hidden">You</strong>
                        </button>
                        <div class="w-[4.4rem] flex flex-col items-start M-on_hover_profile text-[.8rem]">
                            <router-link to="/me/profile"
                                class="px-2 py-[4px] bg-[#283856] w-full text-white rounded hover:bg-yellow-600">
                                Profile
                            </router-link>
                            <router-link to="/me/pending"
                                class="px-2 py-[4px] bg-[#283856] w-full text-white rounded hover:bg-yellow-600">
                                Pending
                            </router-link>
                            <router-link to="/me/history"
                                class="px-2 py-[4px] bg-[#283856] w-full text-white rounded hover:bg-yellow-600">
                                History
                            </router-link>
                            <button @click="onLogout()"
                                class=" py-[4px] bg-[#283856] w-full text-white rounded hover:bg-yellow-600">
                                Logout
                            </button>
                        </div>
                    </div>
                </div>

                <router-link v-if="authenticatedUser" to="/me/cart" class="flex items-center h-fit w-fit">
                    <button class="px-2 flex items-center gap-1 text-white bg-[#283856] rounded-[4px] max-lg:p-0">
                        <img src="../../assets/image/Cart.svg" alt="" class="h-[1.7rem]  filter-white">

                        <strong class="max-sm:hidden">Cart</strong>
                    </button>
                </router-link>
                <button v-else @click="open_LoginModal = true" class="flex items-center h-fit w-fit">
                    <button class="px-2 flex items-center gap-1 text-white bg-[#283856] rounded-[4px] max-lg:p-0">
                        <img src="../../assets/image/Cart.svg" alt="" class="h-[1.7rem]  filter-white">

                        <strong class="max-sm:hidden">Cart</strong>
                    </button>
                </button>
            </div>
        </div>
        <div v-if="open_LoginModal && !authenticatedUser" class="absolute">
            <teleport to="body">
                <login v-if="!open_SingUpModal" @openSignUp="open_SingUpModal = true"
                    @onCancel="open_LoginModal = false; open_SingUpModal = false"
                    @loggedIn="authenticatedUser = true; open_LoginModal = false; open_SingUpModal = false" />

                <SignUp v-else @openLogin="open_SingUpModal = false"
                    @onCancel="open_LoginModal = false; open_SingUpModal = false"
                    @registered="authenticatedUser = true; open_LoginModal = false; open_SingUpModal = false" />
            </teleport>
        </div>
    </header>
</template>

<style>
body.modal-open {
    overflow: hidden;
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
}
</style>