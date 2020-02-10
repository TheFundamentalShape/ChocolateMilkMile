<template>
    <div>
        <a :href="url" class="w-full inline-block hover:bg-gray-600 hover:shadow py-5 px-4"><slot></slot></a>
    </div>
</template>

<script>
    export default {
        props: ['url'],
        name: "NavigationLink"
    }
</script>

<style scoped>

</style>