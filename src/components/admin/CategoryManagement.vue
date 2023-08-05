
<script>
import category from "../../libs/apis/categoryApi"

export default {
    data() {
        return {
            name: '',
            desc: '',
            categories: [],
            selectedCTG: { id: '' },
            new_name: '',
            new_desc: '',
            open_deleteModal: false,
            selected_id: ''
        }
    },
    methods: {
        async onSubmit(e) {
            e.preventDefault();
            const result = await category.create({ name: this.name, desc: this.desc })
            if (!result) alert('something went wrong when create category')
            this.categories = await category.all();
            this.name = '';
            this.desc = '';
        },
        async deleteCTG() {
            const result = await category.delete(this.selected_id);
            if (!result) alert('something went wrong when delete category')
            this.categories = await category.all();
            this.name = '';
            this.desc = '';
        },
        async onEditCTG() {
            const result = await category.update({ id: this.selectedCTG.id, name: this.new_name, desc: this.new_desc });
            if (!result) alert('soemthing went wrong when update category')
            this.categories = await category.all();
            this.resetSelectCTG()
        },
        resetSelectCTG() {
            this.selectedCTG = { id: '' };
        }
    },
    async mounted() {
        this.categories = await category.all();
        // console.log(this.categories);
    }
}
</script>

<template>
    <div class="min-h-screen flex flex-col p-4">
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
                                Do you really want to remove this category? This process can not be undone
                            </p>
                        </div>
                        <div class="flex w-full justify-around mt-4">
                            <button @click="open_deleteModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--green-background)]">Cancel</button>
                            <button @click="deleteCTG(); open_deleteModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Remove</button>
                        </div>
                    </div>
                </div>
            </teleport>
        </div>
        <section class="w-full flex gap-4 max-sm:flex-col">
            <div
                class="M-head-ctg-background h-[20rem] min-w-[14rem] max-w-[12rem]  max-sm:max-w-fit max-sm:w-full max-sm:h-fit  p-4 flex flex-col items-start bg-black text-[1.5rem] text-white font-bold rounded-2xl">
                <div class="text-[2rem]">
                    Selct any type
                </div>
                <div class="text-[1rem] font-normal">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias recusandae iusto dolorum quibusdam
                    provident odio aliquid rem culpa maxime fuga amet pariatur
                </div>
            </div>
            <ul class="flex flex-wrap  overflow-auto gap-1 whitespace-normal break-words ">
                <li v-for="cate in categories" :key="cate.name"
                    class=" relative h-[18rem]  min-w-[12rem] max-w-[12rem]  rounded-2xl  M-ctg-background-image overflow-hidden">
                    <div v-if="selectedCTG.id !== cate.id"
                        class="absolute z-10 w-full h-full p-4 flex flex-col text-white font-bold">
                        <input type="text" v-model="cate.name" disabled class="text-[1.25em] bg-transparent">
                        <textarea type="text" v-model="cate.desc" disabled
                            class="text-[1rem] min-h-[10rem] max-h-[10rem] font-semibold bg-transparent text-[var(--menu-active-color)]">
                        </textarea>
                        <div class="w-full flex justify-center mt-auto">
                            <button @click="() => { selectedCTG = cate; new_name = cate.name; new_desc = cate.desc }"
                                class="px-4 py-1 font-bold text-white border-[2px] border-white rounded-2xl hover:text-[var(--menu-active-color)]">
                                EDIT
                            </button>
                            <button @click="open_deleteModal = true; selected_id = cate.id"
                                class="px-4 py-1 font-bold text-white border-[2px] border-white rounded-2xl hover:text-[var(--menu-active-color)]">
                                DELETE
                            </button>
                        </div>
                    </div>
                    <div v-else class="absolute z-10 w-full h-full p-4 flex flex-col text-white font-bold">
                        <input type="text" v-model="new_name"
                            :class="{ 'border-[1px] border-white': selectedCTG.id === cate.id }"
                            class="text-[1.25em] bg-transparent">
                        <textarea type="text" v-model="new_desc"
                            :class="{ 'border-[1px] border-white': selectedCTG.id === cate.id }"
                            class="text-[1rem] min-h-[10rem] max-h-[10rem] font-semibold bg-transparent text-[var(--menu-active-color)]">
                        </textarea>
                        <div class="w-full flex justify-center mt-auto">
                            <button @click="resetSelectCTG()"
                                class="px-4 py-1 font-bold text-white border-[2px] border-red-600 rounded-2xl hover:text-[var(--menu-active-color)]">
                                Cancel
                            </button>
                            <button @click="onEditCTG(cate)"
                                class="px-4 py-1 font-bold text-white border-[2px] border-white rounded-2xl hover:text-[var(--menu-active-color)]">
                                OK
                            </button>
                        </div>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                        <img src="https://i.pinimg.com/originals/d3/55/c8/d355c8054ecd8802a4e0fc3233df355f.jpg"
                            class="w-full h-full">
                    </div>
                </li>

                <li
                    class=" relative h-[18rem]  min-w-[12rem] max-w-[12rem]  rounded-2xl  M-ctg-background-image overflow-hidden">
                    <form action="#" @submit="onSubmit" class="w-full h-full">
                        <div class="absolute z-10 w-full h-full p-4 flex flex-col gap-1 text-white font-bold ">
                            <div>
                                <input required type="text" name="name" v-model="name" placeholder="Category name"
                                    class="rounded px-4 py-1 w-full text-black">
                            </div>
                            <div>
                                <textarea name="desc" v-model="desc"
                                    class="rounded px-4 py-1 w-full min-h-[10rem] max-h-[10rem] text-black"
                                    placeholder="Enter desciption"></textarea>
                            </div>
                            <div class="w-full flex justify-center mt-auto">
                                <button
                                    class="px-4 py-1 font-bold text-white border-[2px] border-white rounded-2xl hover:text-[var(--menu-active-color)]">
                                    ADD
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                        <img src="https://i.pinimg.com/originals/d3/55/c8/d355c8054ecd8802a4e0fc3233df355f.jpg"
                            class="w-full h-full">
                    </div>
                </li>

            </ul>
        </section>
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


