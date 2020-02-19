<template>
    <div class="my-4">
        <div>

            <label class="text-lg text-gray-600" for="card-element">
                Credit or debit card
            </label>

            <div class="bg-white rounded p-4 mt-2 shadow">
                <div ref="card" id="card-element" style="">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>

        </div>
        <div>
            <button @click="broadcastToken" class="bg-blue-500 hover:bg-blue-700 w-1/3 rounded px-4 py-2 text-white mt-4 shadow">Register</button>
        </div>
    </div>
</template>

<script>
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: "#32325d",
        }
    };

    let stripe = Stripe(process.env.STRIPE_KEY),
        elements = stripe.elements(),
        card = undefined;

    export default {
        name: "StripeElement",
        methods: {
            broadcastToken(){
                stripe.createToken(card).then(function (result){
                    this.$root.$emit("token", result);
                });
            }
        },
        mounted() {
            card = elements.create('card', {style: style});
            card.mount(this.$refs.card);
        }
    }
</script>

<style scoped>

</style>