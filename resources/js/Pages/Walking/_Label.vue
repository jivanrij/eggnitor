<template>
    <span :class="[colorClass]" class="mr-2 inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ label }} {{ count }}</span>
</template>
<script setup>
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    colorClass: {
        type: String,
        required: true,
    },
    count: {
        type: Number,
        required: true,
    },
})
</script>
