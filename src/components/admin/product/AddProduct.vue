<template>
    <section class="w-full flex justify-between">
        <form action="#" class="w-full">
            <div class="w-fit p-4 rounded  flex justify-between items-end gap-8 bg-gray-700 text-white M-sec1">
                <div>
                    <label>Name</label>
                    <input type="text" required placeholder="product name">
                </div>
                <div>
                    <label>category</label>
                    <select required class="flex h-[1.72rem] items-center">

                    </select>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" step="0.01" min="0" value="0" required>
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" required value="0">
                </div>
                <div class="flex flex-col items-center gap-2">
                    <label>Available</label>
                    <input type="checkbox" required checked class="h-6 w-6">
                </div>
                <button class="h-fit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add product
                </button>
            </div>
        </form>
    </section>
</template>
<style scoped>
.M-sec1>* {
    display: flex;
    flex-direction: column;
    gap: .5rem;
}


.M-sec1 input,
.M-sec1 select {
    width: 10rem;
    padding: .1rem 0 .1rem 0;
    border-radius: 2px;
    padding-left: .5rem;
    color: gray;
}
</style>