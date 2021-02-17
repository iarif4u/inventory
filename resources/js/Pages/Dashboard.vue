<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <p class="float-right pb-3">Stock : {{stock}}</p>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white px-3 py-4 overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>Total Product : {{total_product}}</h1>
                    <hr>
                    <h1>Total Supplier : {{total_supplier}}</h1>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props: {
            stock: {
                type: Number,
                required: true
            },
            total_product: {
                type: Number,
                required: true
            },
            total_supplier: {
                type: Number,
                required: true
            }
        }
    }
</script>
