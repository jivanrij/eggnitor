<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from "@/Pages/Walking/Table.vue";
import {onMounted, ref} from "vue";
import AjaxService from "@/AjaxService.js";


const props = defineProps({
    streets: {
        type: Array,
        required: true,
    },
})

let _streets = ref([])

onMounted(() => {
    _streets.value = props.streets
})

const updateStatusEventHandler = (status, streetKey, number) => {
    _streets.value.forEach((item, streetIndex) => {
        if (item.key === streetKey) {
            _streets.value[streetIndex].houses.forEach((house, houseIndex) => {
                if (house.number === number) {
                    _streets.value[streetIndex].houses[houseIndex].status = status
                    AjaxService.updateStatus({
                        streetPart: streetKey,
                        week: 1,
                        houseNumber: number,
                        status: status,
                    }).then(response => {
                        console.log(response)
                    })
                }
            })
        }
    })
}

</script>

<template>
    <AppLayout title="Walking">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Walking
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-8">
                    <Table @update-status-event="updateStatusEventHandler" :streets="_streets" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
