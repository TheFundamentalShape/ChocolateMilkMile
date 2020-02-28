<template>
    <div class="my-4">
        <div>

            <label class="text-lg text-gray-600" for="card-element">
                Credit or debit card
            </label>

            <div class="bg-white rounded p-4 mt-2 shadow">
                <div ref="card">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>

        </div>
        <div>
            <button @click="purchase" class="bg-blue-500 hover:bg-blue-700 w-1/3 rounded px-4 py-2 text-white mt-4 shadow">Register</button>
        </div>
    </div>
</template>

<script>

    let stripe = Stripe("pk_test_npgHJYXNKJ7Z0bm9RkGGUQa600nY0T59kW"),
        elements = stripe.elements(),
        card = undefined;

    export default {
        name: "StripeElement",
        methods: {
            purchase: function () {
                stripe.createToken(card).then(function(result) {
                    console.log(result);
                });
            }
        },
        mounted() {
            card = elements.create('card');
            card.mount(this.$refs.card);
        }
    }
</script>

<style scoped>

</style>