<template>
    <div>
        <div v-for="event in events">
            <div v-on:click="eventSelected(event)" class="border mt-2 rounded p-4 hover:bg-gray-200">
                <p>{{ event.title }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EventList",
        data(){
            return {
                events: null,
                selectedEventId: null,
            }
        },

        mounted: function () {
            this.getEvents();
        },

        methods: {
            getEvents() {
                return axios
                    .get('/api/events')
                    .then(response => {
                        this.events = response.data;
                    });
            },

            eventSelected(event) {
                this.$root.$emit('event-selected', event);
            }
        }
    }
</script>

<style scoped>

</style>