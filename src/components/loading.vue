<template>
    <div class="relative">
        <div class="ring">
        
        </div>
    </div>
</template>
<style scoped>
.ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background: transparet;
    border-radius: 50%;
}

.ring:before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    width: 120%;
    height: 120%;
    border: 3px solid transparent;
    border-top: 3px solid rgb(19, 19, 19);
    border-right: 3px solid rgb(18, 18, 18);
    border-bottom: 3px solid rgb(18, 18, 18);
    border-radius: 50%;
    animation: animateC 1.5s linear infinite;
}



@keyframes animateC {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

</style>