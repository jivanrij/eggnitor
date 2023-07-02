<template>
    <Menu as="div" class="relative flex-none mr-8 sm:mr-0">
        <MenuButton class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
            <span class="sr-only">Open options</span>
            <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
        </MenuButton>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="absolute right-0 z-10 mt-2 w-60 origin-center rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="$emit('updateStatusEvent', 0)" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">Nog doen</a>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="$emit('updateStatusEvent', 1)" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">Niet thuis</a>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="$emit('updateStatusEvent', 2)" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">6 verkocht</a>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="$emit('updateStatusEvent', 3)" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">10 verkocht</a>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="$emit('updateStatusEvent', 4)" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">Niets verkocht</a>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <a @click.prevent="openInMaps" href="#" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">Google Maps</a>
                </MenuItem>
            </MenuItems>
        </transition>
    </Menu>
</template>
<script setup>
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon} from "@heroicons/vue/20/solid/index.js";

const emit = defineEmits(['updateStatusEvent'])

const openInMaps = () => {
    window.open(`https://www.google.com/maps/place/${props.house.maps}`)
}

const props = defineProps({
    house: Object
})
</script>
