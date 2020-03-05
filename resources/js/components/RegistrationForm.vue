<template>
    <div>

        <div class="mt-10 bg-white rounded shadow p-8">
            <h1 class="verygood-font text-2xl md:text-4xl">{{ event.title }}</h1>
            <p class="text-gray-600 text-lg my-2"><i class="fas fa-calendar-day"></i> {{ event.dates.human }}</p>
            <p class="text-gray-600 text-lg my-2"><i class="fas fa-map-marked-alt"></i> {{ event.location }}</p>
            <p class="text-gray-600 text-lg my-2"><i class="fas fa-money-bill-wave"></i> ${{ event.formatted_price }}</p>
        </div>

        <div class="mt-8">
            <form>

                <div class="mt-8">
                    <h1 class="verygood-font text-3xl">Personal Information</h1>
                    <p class="my-2 text-lg text-gray-600">You're almost registered! We just need some information from you first. Let's start off with the basics, who are you?</p>
                </div>

                <div class="my-4">
                    <label class="text-lg text-gray-600">
                        Registrant name
                    </label>
                    <input v-model="order.name" placeholder="John Doe" name="name" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
                </div>

                <div class="my-4">
                    <label class="text-lg text-gray-600">
                        Registrant email
                    </label>
                    <input v-model="order.email" placeholder="johndoe@gmail.com" name="email" type="email" class="bg-white rounded py-3 px-4 w-full mt-2 shadow">
                </div>

                <div class="mt-8">
                    <h1 class="verygood-font text-3xl">Addons</h1>
                    <p class="my-2 text-lg text-gray-600">This registration has several addons you can choose from. See if there's anything you might be interested in!</p>
                </div>

                <div class="my-4 text-gray-600">
                    <p class="my-2 text-lg">Would you like to add on a t-shirt to your registration?</p>
                    <div class="flex">
                        <button type="button" v-on:click="addShirtToOrder" class="bg-blue-500 hover:bg-blue-700 rounded my-auto px-4 py-2 text-white shadow">Yes, please!</button>
                    </div>
                </div>

                <div v-if="order.hasShirt" class="my-4 bg-white rounded shadow p-4">
                    <p class="text-gray-600">What size are you?</p>
                    <div class="inline-block relative w-64">
                        <select name="shirtSize" v-model="order.shirtSize" class="my-4 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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
                    <div class="flex">
                        <a class="text-gray-500 my-auto hover:underline" v-on:click="removeShirtFromOrder">Actually, nevermind. I don't want a sweet t-shirt.</a>
                    </div>
                </div>


                <div class="mt-8">
                    <h1 class="verygood-font text-3xl">Payment Information</h1>
                    <p class="my-2 text-lg text-gray-600">All that's left is for you to pay for your registration! Make sure your registration looks good, and then checkout! You'll be good to go once you do!</p>
                </div>

                <div class="my-4">
                    <div>
                        <label class="text-lg text-gray-600">
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
                        <button type="button" v-on:click="submitOrder" class="bg-blue-500 hover:bg-blue-700 w-1/3 rounded px-4 py-2 text-white mt-4 shadow">Register!</button>
                    </div>
                </div>

                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="payment_token" :value="order.payment_token" />
                <input type="hidden" name="hasShirt" :value="order.hasShirt" />

            </form>

        </div>
    </div>
</template>

<script>

    let stripe = Stripe("pk_test_npgHJYXNKJ7Z0bm9RkGGUQa600nY0T59kW"),
        elements = stripe.elements(),
        card = undefined;

    export default {
        name: "RegistrationForm",
        data() {
            return {
                registerUrl: '/events/' + this.event.id + "/register",
                order: {
                    name: "",
                    email: "",
                    payment_token: "",
                    hasShirt: false,
                    shirtSize: null,
                },
            }
        },
        methods: {
            addShirtToOrder() {
                if(this.order.hasShirt == false) {
                    this.order.hasShirt = true;
                }
            },

            removeShirtFromOrder() {
                if(this.order.hasShirt == true){
                    this.order.hasShirt = false;
                    this.order.shirtSize = null;
                }
            },

            submitOrder() {

                stripe.createToken(card).then(result => {

                    this.order.payment_token = result.token.id;
                    // this.$refs['payment-form'].submit();

                    axios({
                        method: 'post',
                        url: this.registerUrl,
                        data: this.order
                    })
                        .then(response => {
                            console.log(response);
                        })
                        .catch(reason => {
                            console.log(reason);
                        });
                });

            }
        },

        mounted() {
            card = elements.create('card');
            card.mount(this.$refs.card);
        },

        props: ['event', 'csrf']
    }
</script>