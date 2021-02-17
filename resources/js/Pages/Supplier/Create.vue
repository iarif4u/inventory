<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Supplier</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('suppliers.index')">Supplier List</inertia-link>
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
                            <jet-label for="phone" value="Phone" />
                            <jet-input id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" required />
                        </div>
                        <div class="py-2">
                            <jet-label for="address" value="Address" />
                            <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address" required />
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
                phone: null,
                address: null,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('suppliers.store'), {
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
