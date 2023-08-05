<template>
    <div class="w-[20rem] pb-8 sm:px-8 h-fit flex flex-col bg-white rounded-[10px] relative overflow-hidden">
        <!-- <button type="button" @click="$emit('onCancel')" class="absolute top-2 right-3 h-fit w-fit z-10">
            <img src="@/assets/image/XCircle.svg" class="M-cancel-on-hover">
        </button> -->
        <div class="h-[50%] flex justify-center bg-yellow-400 ">
            <img src="@/assets/image/XCircle.svg" class="bg-yellow-400 w-[40%] object-contain">
        </div>
        <div class="h-[50%] flex flex-col items-center gap-4 text-center">
            <strong class="text-[1.5rem] mt-6 mb-6">Congratulations! </strong>
            <p>You have successfully registered for an account</p>
            <button  @click="$emit('onCancel')" class="px-2 py-1 font-bold bg-purple-500 text-white rounded-md">Continue</button>
        </div>
    </div>
</template>