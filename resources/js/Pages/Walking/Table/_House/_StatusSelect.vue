<template>
    <div>
        <select @change="$emit('updateStatusEvent', selectedStatus)" name="location" v-model="selectedStatus" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option :selected="selectedStatus === 0" :value="0">Nog aanbellen</option>
            <option :selected="selectedStatus === 1" :value="1">Deden niet open</option>
            <option :selected="selectedStatus === 2" :value="2">Eieren verkocht</option>
            <option :selected="selectedStatus === 3" :value="3">Niets verkocht</option>
        </select>
    </div>
</template>
<script setup>
import {onMounted, ref} from "vue";

const props = defineProps({
    house: {
        type: Object,
        required: true,
    },
})

onMounted(() => {
    selectedStatus.value = props.house.status
})

let selectedStatus = ref(0)

const emit = defineEmits(['updateStatusEvent'])

</script>
