<template>
    <tr :class="[cssClass, 'border-gray-200 border-t']">
        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ house.number }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
<!--            <StatusSelect @update-status-event="updateStatusEventHandler" :house="house" />-->
            <Select @update-status-event="updateStatusEventHandler" :house="house" />
        </td>
        <!--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">-->
        <!--                                    <MapsButton />-->
        <!--                                </td>-->
        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
            <MapsButton :house="house" />
            <!--                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Herstellen<span class="sr-only">, {{ person.name }}</span></a>-->
        </td>
    </tr>
</template>
<script setup>
import MapsButton from "@/Pages/WalkingRoute/Table/House/MapsButton.vue";
import {computed} from "vue";
import Select from "@/Pages/WalkingRoute/Table/House/Select.vue";

const emit = defineEmits(['updateStatusEvent'])

const cssClass = computed(() => {
    if (props.house.status === 0) {
        return 'bg-grey-50'
    }
    if (props.house.status === 1) {
        return 'bg-gray-100'
    }
    if (props.house.status === 2) {
        return 'bg-green-100'
    }
    if (props.house.status === 3) {
        return 'bg-yellow-100'
    }
    return 'bg-yellow-100';
})

const updateStatusEventHandler = (status) => {
    emit('updateStatusEvent', status, props.streetKey, props.house.key)
}

const props = defineProps({
    house: {
        type: Object,
        required: true,
    },
    streetKey: {
        type: String,
        required: true,
    },
})
</script>
