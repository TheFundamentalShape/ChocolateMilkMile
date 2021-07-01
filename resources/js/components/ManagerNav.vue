<template>
    <div>
        <div class="bg-white flex py-6 px-8 justify-between shadow">
            <div class="my-auto">
                <h1 class="fat-font my-auto text-2xl md:text-3xl relative">EventAdmin</h1>
            </div>

            <a @click="toggleNav" class="bg-gray-800 hover:bg-gray-900 px-3 py-2 rounded inline-block"><i class="text-white my-auto fill-current fas fa-bars"></i></a>
        </div>
        <div v-show="navOpen" class="bg-gray-800 md:flex md:px-8 text-white shadow-lg">

            <navigation-link url="/manager">Home</navigation-link>
            <navigation-link url="/manager/events/create">New Event</navigation-link>
            <navigation-link url="/manager/registrants">Registrants</navigation-link>
            <navigation-link url="/manager/check-in">Check-In</navigation-link>
            <navigation-link url="/manager/support">Support</navigation-link>
            <navigation-link url="/home">Registrant View  <i class="pl-1 fas fa-external-link-alt"></i></navigation-link>

        </div>
    </div>
</template>

<script>
    import NavigationLink from "./NavigationLink";
    export default {
        components: {NavigationLink},
        name: "ManagerNav",
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