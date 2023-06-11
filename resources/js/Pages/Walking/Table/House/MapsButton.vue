<template>
<!--    <button type="button" class="rounded bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Button text</button>-->
<!--    <button type="button" class="rounded bg-indigo-50 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Button text</button>-->
    <button @click.prevent="openInMaps" type="button" class="rounded-md bg-gray-50 px-2.5 py-1.5 text-sm font-semibold text-gray-600 shadow-sm hover:bg-indigo-100">Maps</button>
<!--    <button type="button" class="rounded-md bg-indigo-50 px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Button text</button>-->
<!--    <button type="button" class="rounded-md bg-indigo-50 px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Button text</button>-->
</template>
<script setup>
const props = defineProps({
    house: {
        type: Object,
        required: true,
    },
})

const openInMaps = () => {
    window.open(`https://www.google.com/maps/place/${props.house.maps}`)
}

</script>
