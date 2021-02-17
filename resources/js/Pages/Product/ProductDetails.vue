<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{product.name}}</h2>
                    <h4>{{product.description}}</h4>
                </div>
                <div>
                    <h3 class="float-right">Stock : {{receives.reduce((a, b) => +a + +b.quantity, 0) }}</h3>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="receives.length>0" class="bg-white px-3 py-4 overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="(receive,index) in receives" v-bind:key="index">
                        <ReceiveItem v-bind:date="receive.created_at" v-bind:quantity="receive.quantity" v-bind:title="receive.supplier.name"  />
                    </div>
                </div>
                <h1 class="bg-white px-3 py-4 shadow-xl text-red-700" v-else>{{product.name}} has not any receive yet</h1>
            </div>
        </div>

    </app-layout>
</template>


<script>
import AppLayout from '@/Layouts/AppLayout'
import ReceiveItem from "@/Pages/ReceiveItem";

export default {
    name: "ProductDetails",
    components: {
        ReceiveItem,
        AppLayout
    },
    props: {
        product: {
            type: Object,
            required: true
        },
        receives: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
