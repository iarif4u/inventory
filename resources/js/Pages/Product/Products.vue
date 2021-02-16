<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('product.create')">Add Product</inertia-link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="shadow-xl sm:rounded-lg">
                    <div v-for="(product,index) in products" v-bind:key="index">
                        <Product v-bind:index="index" v-bind:product="product"/>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Product from '@/Pages/Product/Product'

export default {
    components: {
        AppLayout,
        Product
    },
    props: {
        products: {type: Array, required: true}
    }
}
</script>
