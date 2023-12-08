<script setup>
console.log('ok');
</script>
<template>
    <header class=" pt-4 pb-3 border-b">
        <h1 class=" text-center">Layout</h1>
    </header>
    <div class="container mx-auto bg-[#f2f2f2]">
        <slot />
    </div>
    <footer class="py-6 border-t">
        <h2 class="text-center ">Footer</h2>
    </footer>
</template>
