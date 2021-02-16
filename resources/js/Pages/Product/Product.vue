<template>
    <div class="bg-white px-2 py-2 my-2 sm:rounded-lg">
        <h2>{{index+1}} | {{product.name}}</h2>
        <div class="mx-4"><p class="mx-5 text-gray-600">{{product.description}}</p></div>
    </div>
</template>

<script>
export default {
    name: "Product",
    props: {
        index:{
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
