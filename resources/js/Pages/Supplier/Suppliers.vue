<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Suppliers</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('suppliers.create')">Add Supplier</inertia-link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="shadow-xl sm:rounded-lg">
                    <div v-for="(supplier,index) in suppliers" v-bind:key="index">
                        <Supplier v-bind:index="index" v-bind:supplier="supplier"/>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Supplier from '@/Pages/Supplier/Supplier'

export default {
    components: {
        AppLayout,
        Supplier
    },
    props: {
        suppliers: {type: Array, required: true}
    }
}
</script>
