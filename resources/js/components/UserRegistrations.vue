<template>
    <div>
        <div v-if="registrations.length == 0">
            <div class="mt-10 text-white bg-blue-500 rounded p-8 shadow">
                <h1 class="verygood-font text-4xl">You're not registered for anything!</h1>
                <p>We currently don't have any confirmed registrations for you! Please visit our registration page to select an event to register for!</p>
            </div>
        </div>

        <div v-for="registration in registrations" class="mt-10 bg-white rounded shadow hover:shadow-2xl p-8">
            <div class="md:flex md:justify-between">
                <div>
                    <h1 class="verygood-font text-4xl">{{ registration.event.title }}</h1>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ registration.event.dates.human }}</p>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ registration.event.location }}</p>
                    <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ registration.price / 100 }}.00</p>

                    <hr>

                    <p class="text-gray-600 text-lg my-2">This registration is for <b>{{ registration.registrant.name }}</b> ({{ registration.confirmation_number }}).</p>
                </div>
                <div class="flex justify-center">
                    <div class="text-center">

                        <qrcode :value="registration.confirmation_number" :options="{ width: 250 }"></qrcode>

                        <p v-show="registration.checked_in_at !== null" class="paid-banner ml-15 text-5xl absolute -mt-30">Checked In!</p>

                        <p class="text-sm text-gray-500">Scan this code to check in the day of the event.</p>
                        <p class="text-sm text-gray-500">Confirmation number <b>{{ registration.confirmation_number }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserRegistrations",

        props: ['api_token'],

        data() {
            return {
                registrations: []
            }
        },

        methods: {
            getRegistrations() {
                axios
                    .get('/user/api/registrations')
                    .then(response => {
                        this.registrations = response.data;
                    });
            },

            listen() {
                window.Echo.channel('registrations')
                    .listen('RegistrantCheckedIn', (e) => {
                        this.getRegistrations();
                    });
            }
        },

        mounted() {
            this.getRegistrations();
            this.listen();
        },

    }
</script>

<style scoped>

</style>