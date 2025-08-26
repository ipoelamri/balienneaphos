<script setup>
import { router, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DangerButton from "@/Components/DangerButton.vue";
import BlueButton from "@/Components/BlueButton.vue";

defineProps({ portofolios: Array });

function destroy(id) {
    if (confirm("Hapus portfolio ini?")) {
        router.delete(route("dashboard.portofolios.destroy", id));
    }
}

function edit(id) {
    router.get(route("dashboard.portofolios.edit", id));
}
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Manage Portfolios
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- <Link
                            :href="route('admin.portofolios.create')"
                            class="mb-4 inline-block rounded bg-blue-500 px-4 py-2 text-white"
                            >+ Add Portfolio</Link
                        > -->
                        <div class="mt-6 overflow-x-auto">
                            <table
                                class="w-full border border-gray-300 border-collapse rounded-lg overflow-hidden"
                            >
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th
                                            class="border border-gray-300 p-2 px-20"
                                        >
                                            Image
                                        </th>
                                        <th class="border border-gray-300 p-2">
                                            Title
                                        </th>
                                        <th class="border border-gray-300 p-2">
                                            Description
                                        </th>
                                        <th class="border border-gray-300 p-2">
                                            Link
                                        </th>
                                        <th
                                            class="border border-gray-300 p-2 px-20"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="p in portofolios"
                                        :key="p.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td
                                            class="border border-gray-300 p-2 text-center"
                                        >
                                            <img
                                                :src="`/storage/${p.image}`"
                                                class="mx-auto h-20 w-20 object-cover rounded"
                                            />
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            {{ p.title }}
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            {{ p.description }}
                                        </td>
                                        <td class="border border-gray-300 p-2">
                                            <a
                                                :href="p.link"
                                                target="_blank"
                                                class="text-blue-600 hover:underline"
                                            >
                                                {{ p.link }}
                                            </a>
                                        </td>
                                        <td
                                            class="border border-gray-300 p-2 text-center"
                                        >
                                            <div class="grid grid-cols-2 gap-4">
                                                <BlueButton @click="edit(p.id)">
                                                    Edit
                                                </BlueButton>

                                                <DangerButton
                                                    @click="destroy(p.id)"
                                                >
                                                    Delete
                                                </DangerButton>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
