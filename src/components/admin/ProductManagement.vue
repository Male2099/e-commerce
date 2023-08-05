<script>
import AddProduct from './product/AddProduct.vue';
import categoryApi from '../../libs/apis/categoryApi';
import productApi from '../../libs/apis/productApi'
// import 
export default {
    components: {
        AddProduct
    },
    data() {
        return {
            open_deleteModal: false,
            open_editeModal: false,
            open_AddModal: false,
            name: '',
            cate_id: '',
            price: 0,
            quantity: 1,
            imageUrl: '',
            discount: 0,
            desc: 'no desc',
            onSale: true,
            categories: [],
            products: [],
            selected_id: '',
            selectedProduct: null,
            updateProudctData: null,
            imagePreview: null,
            imageFile:null,
        }
    },
    methods: {
        async onCreateProduct(e) {
            e.preventDefault();
            const result = await productApi.create({
                name: this.name, category_id: this.cate_id, price: this.price,
                quantity: this.quantity, imageUrl: this.imageUrl, discount: this.discount,
                desc: this.desc
            })
            if (!result) {
                alert('failed to create product')
            }
            this.open_AddModal = false
            this.categories = await categoryApi.all();
            this.products = await productApi.all();
        }, formatDateDDMMYY_HHMMSS(timestamp) {
            const date = new Date(timestamp);

            const day = date.getDate().toString().padStart(2, "0");
            const month = (date.getMonth() + 1).toString().padStart(2, "0");
            const year = date.getFullYear().toString().slice(-2);
            const hours = date.getHours().toString().padStart(2, "0");
            const minutes = date.getMinutes().toString().padStart(2, "0");
            const seconds = date.getSeconds().toString().padStart(2, "0");

            return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        },
        async onDeleteProduct() {
            const result = await productApi.delete(this.selected_id);
            if (!result) {
                alert('failed to delete product')
            }
            this.categories = await categoryApi.all();
            this.products = await productApi.all();
        },
        async onUpdateProduct(e) {
            e.preventDefault()
            const result = await productApi.update(this.selectedProduct);
            if (!result) {
                alert('failed to update product')
            }
            this.categories = await categoryApi.all();
            this.products = await productApi.all();
            this.open_editeModal = false
        },
        previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = () => {
                this.imagePreview = reader.result;
            };

            reader.readAsDataURL(file);
        },
    },
    async mounted() {
        this.categories = await categoryApi.all();
        this.products = await productApi.all();

    },
}
</script>

<template>
    <div class="min-h-screen flex flex-col p-4">
        <div v-if="open_editeModal">
            <teleport to='body'>
                <div
                    class="fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20  background-opacity-70percent-black">
                    <form action="#" @submit="onUpdateProduct">
                        <div
                            class="w-full h-fit p-4 flex flex-col gap-4 items-center justify-center bg-gray-700 rounded relative">
                            <button type="button" @click="open_editeModal = false"
                                class="absolute top-2 right-3 h-fit w-fit z-10">
                                <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                            </button>
                            <div>
                                <img :src="imagePreview" alt="Preview"
                                    class="w-[10rem] h-[10rem] object-contain border border-white" />
                                <input type="file" id="image" @change="previewImage" />
                            </div>
                            <div
                                class="w-full p-4 rounded  flex flex-wrap items-center justify-center gap-6   text-black M-sec1">
                                <div class="relative w-[8rem]">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Name</label>
                                    <input type="text" v-model="selectedProduct.name" required placeholder="Name"
                                        class="w-full px-2 py-2 rounded-sm">
                                </div>

                                <div class="relative w-[8rem]">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Category</label>
                                    <select required v-model="selectedProduct.category_id"
                                        class="w-full px-2 py-[.65rem] rounded-sm flex items-center">
                                        <option v-for="cate in categories" :key="cate.name" :value="cate.id"
                                            :selected="cate.id === selectedProduct.category_id">{{
                                                cate.name }}
                                        </option>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Price</label>
                                    <input v-model="selectedProduct.price" type="number" step="0.01" min="0"
                                        placeholder="price" required class="w-[3rem] p-2 rounded-sm">
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">QTY.</label>
                                    <input v-model="selectedProduct.quantity" type="number" min="1" required
                                        class="w-[3rem] p-2 rounded-sm">
                                </div>
                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Discount</label>
                                    <input v-model="selectedProduct.discount" type="number" min="0" required
                                        class="w-[3rem] p-2 rounded-sm">
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Image Url</label>
                                    <input v-model="selectedProduct.imageUrl" type="text" class="w-[20rem] p-2 rounded-sm">
                                </div>
                                <br>
                                <div class="relative w-full">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Desciption</label>
                                    <textarea v-model="selectedProduct.desc" class="min-h-[5rem] w-full max-h-[5rem]">
                                    </textarea>
                                </div>


                                <button
                                    class="h-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-[5px] px-4 rounded">
                                    Update product
                                </button>
                            </div>
                            <div></div>
                            <div></div>
                        </div>
                    </form>
                </div>
            </teleport>
        </div>
        <div v-if="open_AddModal">
            <teleport to='body'>
                <div
                    class="fixed w-[100vw] min-h-[100vh] flex justify-center items-center top-0 left-0 z-20  background-opacity-70percent-black">
                    <form action="#" @submit="onCreateProduct">
                        <div
                            class="w-full h-fit p-4 flex flex-col gap-4 items-center justify-center bg-gray-700 rounded relative">
                            <button type="button" @click="open_AddModal = false"
                                class="absolute top-2 right-3 h-fit w-fit z-10">
                                <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
                            </button>
                            <div>
                                <img :src="imagePreview" alt="Preview"
                                    class="w-[10rem] h-[10rem] object-contain border border-white" />
                                <input type="file" id="image" @change="previewImage" />
                            </div>
                            <div
                                class="w-full p-4 rounded  flex flex-wrap items-center justify-center gap-6   text-black M-sec1">
                                <div class="relative w-[8rem]">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Name</label>
                                    <input type="text" v-model="name" required placeholder="Name"
                                        class="w-full px-2 py-2 rounded-sm">
                                </div>

                                <div class="relative w-[8rem]">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Category</label>
                                    <select v-model="cate_id" required
                                        class="w-full px-2 py-[.65rem] rounded-sm flex items-center">
                                        <option v-for="cate in categories" :key="cate.name" :value="cate.id">{{
                                            cate.name }}
                                        </option>
                                    </select>
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Price</label>
                                    <input v-model="price" type="number" step="0.01" min="0" placeholder="price" required
                                        class="w-[3rem] p-2 rounded-sm">
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">QTY.</label>
                                    <input v-model="quantity" type="number" min="1" required
                                        class="w-[3rem] p-2 rounded-sm">
                                </div>
                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Discount</label>
                                    <input v-model="discount" type="number" min="0" required
                                        class="w-[3rem] p-2 rounded-sm">
                                </div>

                                <div class="relative">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Image Url</label>
                                    <input v-model="imageUrl" type="text" class="w-[20rem] p-2 rounded-sm">
                                </div>
                                <br>
                                <div class="relative w-full">
                                    <label class="absolute top-[-1.3rem] text-[1rem] text-white">Desciption</label>
                                    <textarea v-model="desc" class="min-h-[5rem] w-full max-h-[5rem]">
                                    </textarea>
                                </div>


                                <button
                                    class="h-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-[5px] px-4 rounded">
                                    Add product
                                </button>
                            </div>
                            <!-- <div></div>
                            <div></div> -->
                        </div>
                    </form>
                </div>
            </teleport>
        </div>
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
                            <button @click="onDeleteProduct(); open_deleteModal = false"
                                class="rounded font-semibold px-4 py-1 text-white border bg-[var(--blood-red-background)]">Remove</button>
                        </div>
                    </div>
                </div>
            </teleport>
        </div>
        <button @click="open_AddModal = true"
            class="h-fit w-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-[5px] px-4 rounded">
            Add product
        </button>
        <section class="w-fit flex flex-col overflow-auto">

            <table class="table-autu max-w-4xl">
                <thead class="bg-[var(--dashboard-background)] font-bold text-white">
                    <tr>
                        <th class="px-3 border whitespace-nowrap py-2">#ID</th>
                        <th class="px-3 border whitespace-nowrap py-2">Name</th>
                        <th class="px-3 border whitespace-nowrap py-2">Category</th>
                        <th class="px-3 border whitespace-nowrap py-2">Price</th>
                        <th class="px-3 border whitespace-nowrap py-2">Quantity</th>
                        <th class="px-3 border whitespace-nowrap py-2">onSale</th>
                        <th class="px-3 border whitespace-nowrap py-2">Discount</th>
                        <th class="px-3 border whitespace-nowrap py-2">Solve</th>
                        <!-- <th class="px-3 border whitespace-nowrap py-2">Rating</th> -->
                        <th class="px-3 border whitespace-nowrap py-2">Latest order</th>
                        <th class="px-3 border whitespace-nowrap py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" :key="product.name" class="bg-white hover:bg-gray-100">
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.id }}</td>
                        <td class="px-3 border whitespace-nowrap py-2"> {{ product.name }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.category_name }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.price }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.quantity }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.available ? 'Yes' : 'No' }}</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.discount }}%</td>
                        <td class="px-3 border whitespace-nowrap py-2">{{ product.sale_count }}</td>
                        <!-- <td class="px-3 border whitespace-nowrap py-2">{{ product.rating_value }}</td> -->

                        <td class="px-3 border whitespace-nowrap py-2">{{ formatDateDDMMYY_HHMMSS(product.updated_at) }}
                        </td>
                        <td class="px-1 flex justify-evenly items-center py-2">

                            <button @click="open_editeModal = true; selectedProduct = { ...product }">
                                <img src="../../assets/image/edit.svg" class="h-5">
                            </button>
                            <button @click="open_deleteModal = true; selected_id = product.id">
                                <img src="../../assets/image/delete.svg" class="h-5">
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
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


