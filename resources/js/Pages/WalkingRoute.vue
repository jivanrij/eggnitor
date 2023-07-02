<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Table from "@/Pages/Walking/Table.vue";
import {onMounted, ref} from "vue";
import AjaxService from "@/AjaxService.js";
import { computed } from 'vue';
import Label from "@/Pages/Walking/Label.vue";

const todoCount = computed(() => {
    let counter = 0
    _streets.value.forEach(function(street){
        street.houses.forEach(function(house) {
            if (house.status === 0) {
                counter++
            }
        })
    })
    return counter
});

const notHomeCount = computed(() => {
    let counter = 0
    _streets.value.forEach(function(street){
        street.houses.forEach(function(house) {
            if (house.status === 1) {
                counter++
            }
        })
    })
    return counter
});

const soldCount = computed(() => {
    let counter = 0
    _streets.value.forEach(function(street){
        street.houses.forEach(function(house) {
            if (house.status === 2) {
                counter++
            }
        })
    })
    return counter
});

const nothingSoldCount = computed(() => {
    let counter = 0
    _streets.value.forEach(function(street){
        street.houses.forEach(function(house) {
            if (house.status === 3) {
                counter++
            }
        })
    })
    return counter
});

// TODO Streets will bacome a list of houses

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

const updateStatusEventHandler = (status, streetKey, houseKey) => {
    _streets.value.forEach((item, streetIndex) => {
        if (item.key === streetKey) {
            _streets.value[streetIndex].houses.forEach((house, houseIndex) => {
                if (house.key === houseKey) {
                    _streets.value[streetIndex].houses[houseIndex].status = status
                    AjaxService.updateStatus({
                        streetPart: streetKey,
                        week: 1,
                        house: houseKey,
                        status: status,
                    }).then(response => {
                        // console.log(response)
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
                Route
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-8">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-3xl flex justify-center pt-10 pb-10">
                            <Label label="Nog doen" :count="todoCount" :color-class="'bg-gray-50'" />
                            <Label label="Niet thuis" :count="notHomeCount" :color-class="'bg-gray-100'" />
                            <Label label="Verkocht" :count="soldCount" :color-class="'bg-green-100'" />
                            <Label label="Niets verkocht" :count="nothingSoldCount" :color-class="'bg-yellow-100'" />
                        </div>
                    </div>

                    <Table @update-status-event="updateStatusEventHandler" :streets="_streets" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
