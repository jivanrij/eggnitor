<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Adressenlijst</h1>
                <p class="mt-2 text-sm text-gray-700">Hier kan je bijhouden waar je al wel en/of niet bent geweest.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
<!--                <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>-->
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full">
                        <thead class="bg-white">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Adres</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
<!--                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Maps</th>-->
                            <th scope="col" class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900"></th>
<!--                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">-->
<!--                                <span class="sr-only">Edit</span>-->
<!--                            </th>-->
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <template v-for="street in streets" :key="street.key">
                            <tr class="border-t border-gray-200">
                                <th colspan="5" scope="colgroup" class="bg-gray-50 py-2 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">{{ street.name }}</th>
                            </tr>
                            <House v-for="house in street.houses" @update-status-event="updateStatusEventHandler" :house="house" :street-key="street.key" />
<!--                            <tr v-for="(house, houseIdx) in location.houses" :key="houseIdx" :class="[houseIdx === 0 ? 'border-gray-300' : 'border-gray-200', 'border-t']">-->
<!--                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ house.number }}</td>-->
<!--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">-->
<!--                                    <StatusSelect :house="house" />-->
<!--                                </td>-->
<!--&lt;!&ndash;                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <MapsButton />&ndash;&gt;-->
<!--&lt;!&ndash;                                </td>&ndash;&gt;-->
<!--                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">-->
<!--                                    <MapsButton />-->
<!--&lt;!&ndash;                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Herstellen<span class="sr-only">, {{ person.name }}</span></a>&ndash;&gt;-->
<!--                                </td>-->
<!--                            </tr>-->
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import House from "@/Pages/WalkingRoute/Table/House.vue";

const emit = defineEmits(['updateStatusEvent'])
const updateStatusEventHandler = (status, streetKey, number) => {
    emit('updateStatusEvent', status, streetKey, number)
}

defineProps({
    streets: {
        type: Array,
        required: true,
    },
})
</script>
