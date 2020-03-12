<template>
    <div>
        <div class="bg-white flex py-6 px-8 justify-between shadow">
            <div>
                <span class="verygood-font">A Very Good Registration System, Inc.</span>
            </div>

            <a @click="toggleNav" class="bg-gray-800 hover:bg-gray-900 px-3 py-1 rounded inline-block"><i class="text-white fill-current fas fa-bars"></i></a>

        </div>
        <div v-show="navOpen" class="bg-gray-800 md:flex md:px-8 text-white shadow-lg">

            <navigation-link url="/home">Home</navigation-link>
            <navigation-link url="/registrations">Registrations</navigation-link>
            <navigation-link url="/">Back to main site <i class="pl-1 fas fa-external-link-alt"></i></navigation-link>

        </div>
    </div>
</template>

<script>
    import NavigationLink from "./NavigationLink";
    export default {
        components: {NavigationLink},
        props: ['name'],
        name: "RegistrantNav",
        methods: {
            toggleNav() {
                this.navOpen = !this.navOpen;
            }
        },
        data() {
            return {
                navOpen: false
            }
        }
    }
</script>

<style scoped>

</style>