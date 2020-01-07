<template>
    <div class="bg-white rounded shadow my-4 md:my-0 md:ml-4 p-4 w-full" v-show="registration !== null">
        <h1 class="text-4xl verygood-font">{{ registration.registrant.name }}</h1>
        <p><span class="bg-blue-500 rounded-full shadow text-white px-2 py-1">{{ registration.confirmation_number }}</span></p>
        <h3 class="mt-4 text-2xl">Event Details</h3>
        <div class="mt-2 p-4 border rounded">
            <ul class="list-disc ml-8">
                <li>{{ event.title }}</li>
            </ul>
        </div>
        <div class="mt-4">
            <p class="text-sm text-gray-500">Ensure the registrant has been given the proper items including a bib and a shirt if they paid for it. See the event details above for more information.</p>
            <button v-if="registration.checked_in_at == null" class="bg-blue-500 hover:bg-blue-700 rounded shadow text-white text-2xl px-6 py-3 w-full mt-8" @click="checkIn(registration.confirmation_number)">Check in!</button>
            <div v-if="registration.checked_in_at !== null" class="mt-4 bg-green-500 rounded shadow text-white text-lg p-4">
                This registrant has been checked in!
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegistrationInformation",
        inheritAttrs: false,
        props: {
            'event': Object,
            'registration': Object
        },
        methods: {
            checkIn(confirmation_number) {
                this.$emit('checked-in', confirmation_number)
            }
        }
    }
</script>

<style scoped>

</style>