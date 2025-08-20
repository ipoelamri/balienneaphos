<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref, onMounted } from "vue";

// Beritahu Inertia untuk menggunakan MainLayout.vue sebagai pembungkus
defineOptions({ layout: MainLayout });

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

// Jalankan animasi saat komponen berhasil dimuat
</script>

<template>
    <Head title="Our Portofolio" />
    <div>
        <div
            class="pt-32 h-screen w-full"
            style="
                background-image: url('images/v03.jpg');
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

        <section
            id="services"
            class="bg-background-light py-24 sm:py-32"
        ></section>
    </div>
</template>
