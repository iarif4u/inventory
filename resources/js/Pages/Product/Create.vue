<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('products')">Product List</inertia-link>
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
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />

                        </div>
                        <div class="py-2">
                            <jet-label for="description" value="Description" />
                            <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description" required />
                            <div v-if="errors.description">{{ errors.description }}</div>
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

export default {
    name: "Create",
    components: {
        AppLayout,
        JetLabel,
        JetInput,
        JetButton,
        JetValidationErrors,
        FlashMessages
    },
    props: {
        errors: Object,
        message:String,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                description: null,
            }, {
                resetOnSuccess: true,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('product.store'), {
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
