<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import { FwbCard } from "flowbite-vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, onMounted } from "vue";

defineOptions({ layout: MainLayout });

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    portofolios: Array,
});
</script>

<template>
    <Head title="Our Portofolio" />
    <div>
        <div
            class="pt-32 h-screen w-full"
            style="
                background-image: url('images/v21.png');
                background-size: cover;
                background-position: center;
            "
        >
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 md:pt-72">
                <h1
                    class="font-serif text-6xl font-bold text-button-light sm:text-8xl"
                >
                    Our Portofolio
                </h1>
                <p class="mt-6 text-lg leading-8 text-button-light">
                    solidifying our commitment to professionalism and quality.
                </p>
            </div>
        </div>

        <section id="portofolios" class="bg-gray-50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <!-- Judul Section -->
                <div class="text-center mb-12">
                    <h2
                        class="text-4xl font-extrabold text-gray-900 sm:text-5xl"
                    >
                        Our Portfolios
                    </h2>
                    <p class="mt-4 text-lg text-gray-600">
                        Showcasing our latest projects with passion and
                        precision.
                    </p>
                </div>

                <!-- Grid Cards -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <fwb-card
                        v-for="(item, index) in props.portofolios"
                        :key="index"
                        :img-alt="item.title"
                        :img-src="`/storage/${item.image}`"
                        variant="image"
                        class="w-full max-w-md mx-auto rounded-xl border-gray-200 border-4 hover:border-button-primary transition-colors duration-300 bg-white"
                    >
                        <div class="p-6">
                            <h5
                                class="mb-3 text-xl font-semibold tracking-tight text-button-primary text-center"
                            >
                                {{ item.title }}
                            </h5>
                            <p
                                class="text-button-white leading-relaxed text-center"
                            >
                                {{ item.description }}
                            </p>
                            <!-- <div class="mt-5">
                                <PrimaryButton
                                    class="border border-blue-500 text-blue-500 bg-transparent hover:bg-blue-500 hover:text-white transition-colors duration-300"
                                >
                                    View Details
                                </PrimaryButton>
                            </div> -->
                        </div>
                    </fwb-card>
                </div>
            </div>
        </section>
    </div>
</template>
