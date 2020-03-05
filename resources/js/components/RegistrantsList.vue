<template>
    <div>
        <h2 class="verygood-font text-2xl">{{ event.title }} Registrants</h2>

        <table class="w-full table-auto mt-8">
            <thead>
            <tr>
                <th class="border px-4 py-2">Registrant</th>
                <th class="border px-4 py-2">Checked in?</th>
                <th class="border px-4 py-2">T-shirt?</th>
                <th class="border px-4 py-2">Register date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="registration in registrations">
                <td class="border px-4 py-2">{{ registration.registrant.name }}</td>
                <td class="border text-center px-4 py-2"><span v-show="registration.checked_in_at === null" class="bg-yellow-500 text-lg py-1 w-full text-white rounded px-4">No</span><span v-show="registration.checked_in_at !== null" class="bg-green-500 text-lg py-1 w-full text-white rounded px-4">Yes</span></td>
                <td class="border text-center px-4 py-2"><span v-show="registration.hasOwnProperty('shirt_order')" class="bg-yellow-500 text-lg py-1 w-full text-white rounded px-4">No</span><span v-show="registration.hasOwnProperty('shirt_order') == false" class="bg-green-500 text-lg py-1 w-full text-white rounded px-4">Yes</span></td>
                <td class="border px-4 py-2">{{ registration.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "RegistrantsList",
        methods: {
            getEventRegistrants(){
                axios
                    .get('/manager/api/event/' + this.event.id + '/registrants')
                    .then(response => {
                        this.registrations = response.data;
                    });
            }
        },
        data() {
            return {
                event: null,
                registrations: [],
            }
        },
        created() {
            this.$root.$on('event-selected', event => {
                this.event = event;
                this.getEventRegistrants();
            });
        }
    }
</script>

<style scoped>

</style>