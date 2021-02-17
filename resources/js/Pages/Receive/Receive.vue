<template>
    <div class="bg-white px-2 py-2 my-2 sm:rounded-lg">
        <div class="grid grid-cols-3 gap-6">
            <div>
                <h2>{{ index + 1 }} | {{ receive.product.name }}</h2>
                <p class="mx-5 text-gray-600">{{ receive.product.description }}</p>
            </div>
            <div class="mx-4">
                <p class="text-gray-600">Supplier: {{ receive.supplier.name }}</p>
            </div>
            <div>
                Quantity : {{ receive.quantity }}
                <hr>
                <p class="float-right">{{ format_date(receive.created_at) }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    name: "Supplier",
    methods: {
        format_date(value){
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY hh:mm a')
            }
        },
    },
    props: {
        index: {
            required: true
        },
        receive: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
