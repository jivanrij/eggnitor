<template>


    <div class="flex-1 text-sm font-semibold leading-6 text-gray-900 ml-8 sm:ml-0">
        {{ house.street }} {{ house.number }}
    </div>

<!--    <div v-if="house.show_street_label" class="flex-grow text-lg font-semibold text-gray-900">{{ house.street }}</div>-->

    <span v-if="house.status === 0"
          class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-pink-700/10">Nog doen</span>

    <span v-if="house.status === 1"
          class="inline-flex items-center rounded-md bg-yellow-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-pink-700/10">Niet thuis</span>

    <span v-if="house.status === 2"
          class="inline-flex items-center rounded-md bg-green-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-pink-700/10">Eieren verkocht</span>

    <span v-if="house.status === 3"
          class="inline-flex items-center rounded-md bg-red-400 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-pink-700/10">Niets verkocht</span>

    <div class="flex flex-none items-center gap-x-4">
        <Options :house="house" @updateStatusEvent="updateStatusEventHandler"/>
    </div>
</template>
<script setup>
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'
import Row from "@/Pages/Index/Row.vue";
import Options from "@/Pages/Index/Row/Options.vue";

const updateStatusEventHandler = (status) => {
    emit('updateStatusEvent', status, props.house.key)
}

const statuses = {
    Complete: 'text-green-700 bg-green-50 ring-green-600/20',
    'In progress': 'text-gray-600 bg-gray-50 ring-gray-500/10',
    Archived: 'text-yellow-800 bg-yellow-50 ring-yellow-600/20',
}

const emit = defineEmits(['updateStatusEvent'])

const props = defineProps({
    house: {
        type: Object,
        required: true,
    },
})
</script>
