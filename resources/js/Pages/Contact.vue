<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import {
    EnvelopeIcon,
    PhoneIcon,
    MapPinIcon,
    BuildingOffice2Icon,
} from "@heroicons/vue/24/outline";

// Beritahu Inertia untuk menggunakan MainLayout.vue sebagai pembungkus
defineOptions({ layout: MainLayout });

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

// Data kontak dengan ikon dan tautan yang sesuai
const contactDetails = [
    {
        name: "Email Us",
        value: "hello@balienneaphos.com",
        href: "mailto:info@balienneaphos.com",
        icon: EnvelopeIcon,
    },
    {
        name: "Call Us",
        value: "+62 819-7799-7548",
        href: "https://wa.me/+6281977997548",
        icon: PhoneIcon,
    },
    {
        name: "Our Office",
        value: "Jl. Raya Latu, Gg. Giri Sari, No. 33 , Abiansemal, Badung, Bali",
        href: "https://maps.app.goo.gl/6H1eM8pED8WFNjgD9?g_st=ipc",
        icon: MapPinIcon,
    },
    // {
    //     name: "Second Email",
    //     value: "balienneaphos@gmail.com",
    //     href: "mailto:balienneaphos@gmail.com",
    //     icon: EnvelopeIcon, // Menggunakan ikon generik, bisa diganti jika ada ikon spesifik
    // },
];
</script>

<template>
    <Head title="Contact" />
    <div>
        <div
            class="pt-32 h-screen w-full"
            style="
                background-image: url('images/v14.png');
                background-size: cover;
                background-position: center;
            "
        >
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 md:pt-72">
                <h1
                    class="font-serif text-6xl font-bold text-button-light sm:text-8xl"
                >
                    Contact Us
                </h1>
                <p class="mt-6 text-lg leading-8 text-button-light">
                    solidifying our commitment to professionalism and quality.
                </p>
            </div>
        </div>

        <section id="services" class="bg-background-light py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <div class="text-center">
                        <h2
                            class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-8xl"
                        >
                            Our Contact
                        </h2>
                        <p class="mt-4 text-lg leading-8 text-text-subtle">
                            Numbers that reflect our dedication and success.
                        </p>
                    </div>
                    <div
                        class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-3 lg:grid-cols-3"
                    >
                        <!-- Setiap item kontak sekarang adalah tautan yang bisa diklik -->
                        <a
                            v-for="contact in contactDetails"
                            :key="contact.name"
                            :href="contact.href"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex flex-col items-center justify-start bg-button-primary p-8 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl"
                        >
                            <!-- Ikon Kontak -->
                            <component
                                :is="contact.icon"
                                class="size-12 text-button-dark mb-4"
                            />
                            <!-- Nama Kontak (Email, Phone, etc) -->
                            <div
                                class="text-xl font-semibold tracking-tight text-button-dark"
                            >
                                {{ contact.name }}
                            </div>
                            <!-- Nilai Kontak (alamat email, nomor telepon, etc) -->
                            <div
                                class="mt-2 text-sm font-semibold leading-6 text-button-light"
                            >
                                {{ contact.value }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
