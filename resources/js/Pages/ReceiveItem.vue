<template>
    <div class="bg-white px-5 my-4 overflow-hidden">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <h1>{{title}}</h1>
            </div>
            <div class="float-right text-right">
                Quantity : {{ quantity }}

                <p>{{ format_date(date) }}</p>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        name: "ReceiveItem",
        methods: {
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY hh:mm a')
                }
            },
        },
        props: {
            title: {
                required: true
            },
            quantity: {
                required: true
            },
            date:{
                required: true
            }
        }
    }
</script>
