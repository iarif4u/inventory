<template>
    <div class="bg-white px-2 py-2 my-2 sm:rounded-lg">
       <inertia-link :href="route('suppliers.show',supplier.id)"> <h2>{{index+1}} | {{supplier.name}}</h2> </inertia-link>
        <div class="mx-4">
            <p class="mx-5 text-gray-600">Phone : {{supplier.phone}} || Address: {{supplier.address}}</p></div>
    </div>
</template>

<script>
export default {
    name: "Supplier",
    props: {
        index:{
            required: true
        },
        supplier: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
