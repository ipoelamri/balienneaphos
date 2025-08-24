<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    portofolio: Object,
});

const form = useForm({
    _method: "PUT",
    title: props.portofolio.title,
    description: props.portofolio.description,
    link: props.portofolio.link,
    image: null,
});

const submit = () => {
    form.post(route("admin.portofolios.update", props.portofolio.id));
};
</script>

<template>
    <Head title="Edit Portofolio" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Portofolio
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="title" value="Title" />
                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="description"
                                    value="Description"
                                />
                                <textarea
                                    id="description"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    v-model="form.description"
                                    required
                                ></textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.description"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="link" value="Link" />
                                <TextInput
                                    id="link"
                                    type="url"
                                    class="mt-1 block w-full"
                                    v-model="form.link"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.link"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="image" value="Image" />
                                <div v-if="portofolio.image" class="mt-2">
                                    <p>Current Image:</p>
                                    <img
                                        :src="`/storage/${portofolio.image}`"
                                        :alt="portofolio.title"
                                        class="h-auto w-48 rounded-md object-cover"
                                    />
                                </div>
                                <input
                                    type="file"
                                    @input="form.image = $event.target.files[0]"
                                    class="mt-2"
                                />
                                <p class="mt-1 text-sm text-gray-500">
                                    Leave blank to keep the current image.
                                </p>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.image"
                                />
                            </div>

                            <div class="mt-4 flex items-center justify-end">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update Portofolio
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
