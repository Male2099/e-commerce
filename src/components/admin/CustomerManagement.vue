
<script>
import auth from '../../libs/apis/auth';
export default {
    data() {
        return {
            open_deleteModal: false,
            users: [],
            selectedUser: null,
        }
    },
    methods: {
        async ban() {
            const success = await auth.ban(this.selectedUser.id);
            if (!success) {
                alert('Error: Unable to ban the user.');
            }
            this.selectedUser = null
            this.users = await auth.allUsers();
            this.open_deleteModal = false
        },
    },
    async mounted() {
        this.users = await auth.allUsers();
    }

}
</script>

<template>
    <div v-if="users" class="min-h-screen flex flex-col">
        <div v-if="open_deleteModal">
            <teleport to='body'>
                <div
                    class="fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20  background-opacity-70percent-black">
                    <div class="w-[350px] h-fit p-4 pb-8 flex flex-col gap-4 items-center bg-white rounded">
                        <div>
                            <img class="w-[5rem] filter-black" src="@/assets/image/XCircle.svg" alt="">
                        </div>
                        <div class="text-[2rem] text-gray-800 font-semibold">
                            Are your sure?
                        </div>
                        <div>
                            <p class="text-center text-gray-500">
                                Do you really want to ban this user? This process can not be undone
                            </p>
                            <!-- <p v-else class="text-center text-gray-500">
                                Do you really want to unban this user?
                            </p> -->
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click="open_deleteModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click="ban(); open_deleteModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Remove</button>
                        </div>
                    </div>
                </div>
            </teleport>
        </div>
        <section class="w-full flex pl-4 justify-start overflow-auto">
            <table class="table-autu max-w-4xl">
                <thead class="bg-[var(--dashboard-background)] font-bold text-white">
                    <tr>
                        <th class="px-3 border whitespace-nowrap py-2">#ID</th>
                        <th class="px-3 border whitespace-nowrap py-2">Fist name</th>
                        <th class="px-3 border whitespace-nowrap py-2">Last name</th>
                        <th class="px-3 border whitespace-nowrap py-2">Email</th>
                        <th class="px-3 border whitespace-nowrap py-2">Purchase</th>
                        <th class="px-3 border whitespace-nowrap py-2">Order</th>
                        <th class="px-3 border whitespace-nowrap py-2">address</th>
                        <th class="px-3 border whitespace-nowrap py-2">Latest online</th>
                        <th class="px-3 border whitespace-nowrap py-2">Phone number</th>
                        <th class="px-3 border whitespace-nowrap py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.email" :class="{ 'bg-red-500': user.banned }">
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.id }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.firstName }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.lastName }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.email }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.purchase }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.order }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.address }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.updated_at }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ user.tel }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">
                            <button @click="open_deleteModal = true; selectedUser = user">
                                <img src="../../assets/image/delete.svg" class="h-5">
                            </button>
                            <button @click="open_deleteModal = true; selectedUser = user">
                                <img src="@\assets\image\detail.svg" class="ml-1 h-5">
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
        <!-- <tr>
                        <th class="px-4 border whitespace-nowrap py-2">#ID</th>
                        <th class="px-4 border whitespace-nowrap py-2">Fist name</th>
                        <th class="px-4 border whitespace-nowrap py-2">Last name</th>
                        <th class="px-4 border whitespace-nowrap py-2">Email</th>
                        <th class="px-4 border whitespace-nowrap py-2">password</th>
                        <th class="px-4 border whitespace-nowrap py-2">Purchase</th>
                        <th class="px-4 border whitespace-nowrap py-2">Order</th>
                        <th class="px-4 border whitespace-nowrap py-2">history</th>
                        <th class="px-4 border whitespace-nowrap py-2">review</th>
                        <th class="px-4 border whitespace-nowrap py-2">address</th>
                        <th class="px-4 border whitespace-nowrap py-2">Date creaded</th>
                        <th class="px-4 border whitespace-nowrap py-2">Latest online</th>
                        <th class="px-4 border whitespace-nowrap py-2">social meida</th>
                        <th class="px-4 border whitespace-nowrap py-2">Payment information</th>
                        <th class="px-4 border whitespace-nowrap py-2">Newsletter subscription:</th>
                        <th class="px-4 border whitespace-nowrap py-2">Phone number</th>
                        <th class="px-4 border whitespace-nowrap py-2">return</th>
                        <th class="px-4 border whitespace-nowrap py-2">refund</th>
                        <th class="px-4 border whitespace-nowrap py-2">gender</th>
                        <th class="px-4 border whitespace-nowrap py-2">customer life time</th>
                        <th class="px-4 border whitespace-nowrap py-2">cart info</th>
                        <th class="px-4 border whitespace-nowrap py-2">date of birth</th>
                        <th class="px-4 border whitespace-nowrap py-2">message/feedback</th>
                        <th class="px-4 border whitespace-nowrap py-2">order delivery/pickup</th>
                        <th class="px-4 border whitespace-nowrap py-2">Wish list</th>
                        <th class="px-4 border whitespace-nowrap py-2">Action</th>
                    </tr> -->
    </div>
</template>
<style scoped>
tbody>:nth-child(even) {
    background-color: rgba(227, 227, 227, 0.756);
}

table * {
    border-color: black;
}

tbody>tr:hover {
    background: var(--tr-background-on-hover);
}
</style>


