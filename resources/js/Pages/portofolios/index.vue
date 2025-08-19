<script setup>
import { router } from "@inertiajs/vue3";
defineProps({ portfolios: Array });

function destroy(id) {
    if (confirm("Hapus portfolio ini?")) {
        router.delete(`/admin/portfolios/${id}`);
    }
}
</script>

<template>
    <div>
        <h1 class="text-2xl mb-4">Manage Portfolios</h1>
        <a
            href="/admin/portfolios/create"
            class="bg-blue-500 text-white px-3 py-2 rounded"
            >+ Add</a
        >
        <table class="w-full mt-4 border">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Caption</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="p in portfolios" :key="p.id">
                    <td>
                        <img
                            :src="`/storage/${p.image}`"
                            class="w-20 h-20 object-cover"
                        />
                    </td>
                    <td>{{ p.title }}</td>
                    <td>{{ p.caption }}</td>
                    <td>
                        <a :href="p.link" target="_blank">{{ p.link }}</a>
                    </td>
                    <td>
                        <a
                            :href="`/admin/portfolios/${p.id}/edit`"
                            class="text-blue-600"
                            >Edit</a
                        >
                        <button
                            @click="destroy(p.id)"
                            class="ml-2 text-red-600"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
