<template>
    <app-layout>
        <template #header>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Receive List</h2>
                </div>
                <div>
                    <inertia-link class="float-right" :href="route('receives.create')">New Receive</inertia-link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white px-3 py-4 overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="(receive,index) in receives" v-bind:key="index">
                        <Receive v-bind:index="index" v-bind:receive="receive"/>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Receive from "@/Pages/Receive/Receive";

export default {
    name: "NewReceive",
    components: {
        AppLayout,
        Receive
    },
    props: {
        receives:Array,
    }
}
</script>

<style scoped>

</style>
