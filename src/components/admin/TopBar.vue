<script>
import auth from '../../libs/apis/auth';
import router from '../../router';
export default {
    methods: {
        async logout() {
            const result = await auth.logout()
            if (result) {
                router.push('/')
            }
        }
    }
}
</script>

<template>
    <div class="w-full h-[4.2rem]  bg-[var(--dashboard-background)] text-white">
        <div class="relative">
            <button @click="logout()"
                class="absolute top-[50%] translate-y-[50%] right-[1vw] rounded-sm font-bold bg-red-500 px-2 py-1 hover:text-green-500">Logout</button>
       </div>
    </div>
</template>