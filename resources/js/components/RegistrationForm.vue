<template>
    <div>
        <div class="text-lg text-gray-600 mt-8">
            <p class="my-2">Would you like to add on a t-shirt to your registration?</p>
            <div class="flex">
                <button v-on:click="wantsShirt = true" class="hover:bg-blue-700 rounded px-4 py-2 shadow bg-blue-500 text-white">Yes, please!</button>
            </div>
        </div>

        <div v-if="wantsShirt" class="mt-4 bg-white rounded shadow p-4">
            <p class="text-gray-600">What size are you?</p>
            <div class="inline-block relative w-64">
                <select v-model="shirtSize" class="my-4 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>Please select a size!</option>
                    <option value="xs">Extra Small</option>
                    <option value="s">Small</option>
                    <option value="xm">Extra Medium</option>
                    <option value="m">Medium</option>
                    <option value="lg">Large</option>
                    <option value="xl">Extra Large</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <button type="button" class="block hover:bg-blue-700 rounded px-4 py-2 shadow bg-blue-500 text-white" v-on:click="addShirtToOrder()">Add to registration</button>
        </div>

        <div class="text-lg text-gray-600 mt-8">
            <p class="my-2">To complete your registration, please provide the registrant information below, your payment details, and then hit register!</p>
        </div>

        <div class="mt-8">
            <form id="payment-form">

                <div class="bg-red-500 rounded p-4 shadow my-2 text-white">
                    <h3 class="text-xl verygood-font">Something went wrong...</h3>
                    <ul>
                        <li></li>
                    </ul>
                </div>

                <div class="my-4">
                    <label class="text-lg text-gray-600">
                        Registrant name
                    </label>
                    <input placeholder="John Doe" name="name" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
                </div>

                <div class="my-4">
                    <label class="text-lg text-gray-600" for="card-element">
                        Registrant email
                    </label>
                    <input placeholder="johndoe@gmail.com" name="email" type="email" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
                </div>

                <stripe-element></stripe-element>

            </form>

        </div>
    </div>
</template>

<script>
    import StripeElement from "./StripeElement";

    export default {
        name: "RegistrationForm",
        data() {
            return {
                wantsShirt: false,
                totalPrice: this.event.fee,
                shirtSize: null,
                orderHasShirt: false,
            }
        },
        methods: {
            addShirtToOrder(){
                this.totalPrice = this.totalPrice + 1500;
                this.orderHasShirt = true;
            }
        },
        components: {
            "StripeElement": StripeElement
        },
        props: ['event', 'csrf']
    }
</script>

<style scoped>

</style>