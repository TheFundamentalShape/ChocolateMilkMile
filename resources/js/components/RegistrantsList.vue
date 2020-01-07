<template>
    <div>

    </div>
</template>

<script>
    export default {
        name: "RegistrantsList",
        data() {
            return {
                event: null
            }
        },
        created() {
            this.$on('event-selected', event => {
                console.log(event);
            });
        }
    }
</script>

<style scoped>

</style>