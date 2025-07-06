<template>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 md:p-10 my-8">
        <slot />
    </div>
</template>

<script lang="ts">
export default {
    name: 'Card',
};
</script>

<style scoped>
.bg-white {
    background-color: #fff;
}
</style>
