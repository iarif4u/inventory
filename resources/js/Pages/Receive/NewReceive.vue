<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('receives.index')">Receive List</inertia-link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white px-3 py-4 overflow-hidden shadow-xl sm:rounded-lg">
                    <flash-messages />
                    <jet-validation-errors class="mb-4" />
                    <form @submit.prevent="submit">
                        <div class="py-2">
                            <jet-label for="product" value="Product" />
                            <v-select v-model="form.product_id" :reduce="product => product.id" label="name" :options="products"></v-select>

                        </div>
                        <div class="py-2">
                            <jet-label for="supplier" value="Supplier" />
                            <v-select v-model="form.supplier_id" :reduce="supplier => supplier.id" label="name" :options="suppliers"></v-select>
                        </div>
                        <div class="py-2">
                            <jet-label for="quantity" value="Quantity" />
                                <jet-input id="quantity" type="text" class="mt-1 block w-full" v-model="form.quantity" required />
                            </div>

                        <div class="flex items-center mt-4">
                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Submit
                            </jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetValidationErrors from '@/Jetstream/ValidationErrors'
import FlashMessages from '@/Pages/FlashMessages'
import vSelect from 'vue-select'

export default {
    name: "NewReceive",
    components: {
        AppLayout,
        JetLabel,
        JetInput,
        JetButton,
        JetValidationErrors,
        FlashMessages,
        vSelect
    },
    props: {
        errors: Object,
        products:Array,
        suppliers:Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                product_id: null,
                supplier_id: null,
                quantity: null,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('receives.store'), {
                preserveScroll: true,
                onSuccess: (response) => {
                    this.form.reset();
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
