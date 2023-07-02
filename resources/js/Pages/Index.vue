<template>
    <AppLayout title="Status per house">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:p-8">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <ul role="list" class="divide-y divide-gray-100 mb-44">
                                        <li v-for="house in _houses" :key="house.id" class="flex items-center justify-between gap-x-6 py-5">
                                            <Row :house="house" @updateStatusEvent="updateStatusEventHandler"/>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {onMounted, ref} from "vue";
import AjaxService from "@/AjaxService.js";
import { computed } from 'vue';
import Row from "@/Pages/Index/Row.vue";

const todoCount = computed(() => {
    let counter = 0
    // _houses.value.forEach(function(street){
    //     street.houses.forEach(function(house) {
    //         if (house.status === 0) {
    //             counter++
    //         }
    //     })
    // })
    return counter
});

const notHomeCount = computed(() => {
    let counter = 0
    // _houses.value.forEach(function(street){
    //     street.houses.forEach(function(house) {
    //         if (house.status === 1) {
    //             counter++
    //         }
    //     })
    // })
    return counter
});

const soldCount = computed(() => {
    let counter = 0
    // _houses.value.forEach(function(street){
    //     street.houses.forEach(function(house) {
    //         if (house.status === 2) {
    //             counter++
    //         }
    //     })
    // })
    return counter
});

const nothingSoldCount = computed(() => {
    let counter = 0
    // _houses.value.forEach(function(street){
    //     street.houses.forEach(function(house) {
    //         if (house.status === 3) {
    //             counter++
    //         }
    //     })
    // })
    return counter
});

const props = defineProps({
    houses: {
        type: Array,
        required: true,
    },
})

let _houses = ref(props.houses)

const updateStatusEventHandler = (status, houseKey) => {
    _houses.value.forEach((house, streetIndex) => {
        if (house.key === houseKey) {
            _houses.value[streetIndex].status = status
            AjaxService.updateStatus({
                houseKey: houseKey,
                week: house.week,
                year: house.year,
                status: status
            }).then(response => {
                console.log(response)
            })
        }
    })
}
</script>
