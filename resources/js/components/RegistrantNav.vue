<template>
    <div>
        <div class="bg-white flex py-6 px-8 justify-between shadow">
            <div class="my-auto">
                <h1 class="fat-font text-2xl md:text-3xl relative"><span class="tilty absolute skippy-font text-3xl -mt-6 -ml-3 md:-mt-6 md:-ml-4 md:top-0 md:left-0">the</span> Chocolate Milk Mile</h1></span>
            </div>

            <a @click="toggleNav" class="bg-gray-800 hover:bg-gray-900 px-3 py-2 rounded inline-block"><i class="text-white my-auto fill-current fas fa-bars"></i></a>

        </div>
        <div v-show="navOpen" class="bg-gray-800 md:flex md:px-8 text-white shadow-lg">

            <navigation-link url="/home">New Registration</navigation-link>
            <navigation-link url="/registrations">Your Registrations</navigation-link>
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