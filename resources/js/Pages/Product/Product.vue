<template>
    <div class="bg-white px-2 py-2 my-2 sm:rounded-lg">
        <inertia-link :href="route('products.show',product.id)"> <h2>{{ index + 1 }} | {{ product.name }}</h2></inertia-link>
        <div class="mx-4"><p class="mx-5 text-gray-600">{{ product.description }}</p></div>
        <div class="mx-9">Stock: {{product.receives_sum_quantity || 0}}</div>

    </div>
</template>

<script>
export default {
    name: "Product",
    props: {
        index: {
            required: true
        },
        product: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
