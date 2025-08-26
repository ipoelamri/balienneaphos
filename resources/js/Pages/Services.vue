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
const serviceImages = ["images/01.jpg", "images/vw-4_ps.png"];
const serviceImages2 = ["images/05a.jpg", "images/v12.png"];

const services = [
    {
        title: "VILLA MANAGEMENT",
        description:
            "Property management services remain well maintained, ensuring maximum ROI.",
    },
    {
        title: "LAND SERVICE",
        description:
            "Providing comprehensive property solutions, from buying and selling to land development, with a focus on strategic locations and optimal investment potential.",
    },
];
const services2 = [
    {
        title: "DESIGN",
        description:
            "Creating beautiful and functional landscape designs that blend natural elements with modern aesthetics to enrich the surroundings of your property.",
    },
    {
        title: "CONSTRUCTION STRUCTURAL,  ARCHITECTURE, AND MEP",
        description:
            " Integrating expertise to ensure projects that are sturdy, aesthetically pleasing, and functionally optimized.",
    },
];

// Refs untuk menampung nilai yang akan ditampilkan di UI, dimulai dari 0

// Jalankan animasi saat komponen berhasil dimuat
</script>

<template>
    <Head title="Our Services" />
    <div>
        <div
            class="pt-32 h-screen w-full"
            style="
                background-image: url('images/vw-1_ps.png');
                background-size: cover;
                background-position: center;
            "
        >
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 md:pt-72">
                <h1
                    class="font-serif text-6xl font-bold text-button-light sm:text-8xl"
                >
                    Our Services
                </h1>
                <p class="mt-6 text-lg leading-8 text-button-light">
                    solidifying our commitment to professionalism and quality.
                </p>
            </div>
        </div>

        <section id="services" class="bg-background-light py-24 sm:py-32">
            <div class="mx-auto max-w-xl px-6 py-16 lg:px-8 text-center">
                <h2
                    class="font-serif text-xl font-bold tracking-tight text-center text-button-dark sm:text-8xl"
                >
                    Services
                </h2>
            </div>
            <!-- Menggunakan grid untuk layout 2 kolom di layar besar (lg) -->
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 px-6 lg:grid-cols-3 lg:px-8"
            >
                <!-- Kolom Kiri: Judul dan Deskripsi -->
                <div class="lg:col-span-1 mt-20">
                    <h2
                        class="text-7xl text-center tracking-tight font-thin text-button-dark sm:text-9xl sm:text-start"
                    >
                        OUR
                    </h2>
                    <h2
                        class="font-sans text-6xl text-center font-extrabold text-button-dark tracking-tight sm:text-7xl sm:mb-16 sm:text-start"
                    >
                        SERVICES
                    </h2>
                </div>
                <!-- Kolom Kanan: Kartu Layanan dalam grid 2x2 -->
                <div
                    class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2"
                >
                    <div
                        v-for="service in services"
                        :key="service.title"
                        class="flex flex-col rounded-lg bg-black p-8 shadow-lg transition-all duration-300 ease-in-out hover:-translate-y-2 hover:border-button-primary hover:border-4 hover:shadow-2xl"
                    >
                        <img
                            :src="serviceImages[services.indexOf(service)]"
                            alt="Service Image"
                            class="h-48 w-full rounded-lg object-cover mb-4"
                        />
                        <h3
                            class="font-sans text-xl text-center font-bold uppercase tracking-wider leading-6 text-button-primary"
                        >
                            {{ service.title }}
                        </h3>
                        <p
                            class="mt-4 flex-auto text-center text-base leading-7 text-text-subtle"
                        >
                            {{ service.description }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 px-6 lg:grid-cols-3 lg:px-8"
            >
                <!-- Kolom Kanan: Kartu Layanan dalam grid 2x2 -->
                <div
                    class="grid grid-cols-1 gap-8 my-8 sm:grid-cols-2 lg:col-span-2"
                >
                    <div
                        v-for="service in services2"
                        :key="service.title"
                        class="flex flex-col rounded-lg bg-black p-8 shadow-lg transition-all duration-300 ease-in-out hover:-translate-y-2 hover:border-button-primary hover:border-4 hover:shadow-2xl"
                    >
                        <img
                            :src="serviceImages2[services2.indexOf(service)]"
                            alt="Service Image"
                            class="h-48 w-full rounded-lg object-cover mb-4"
                        />
                        <h3
                            class="font-sans text-xl text-center font-bold uppercase tracking-wider leading-6 text-button-primary"
                        >
                            {{ service.title }}
                        </h3>
                        <p
                            class="mt-4 flex-auto text-center text-base leading-7 text-text-subtle"
                        >
                            {{ service.description }}
                        </p>
                    </div>
                </div>
                <!-- Kolom Kiri: Judul dan Deskripsi -->
                <div class="lg:col-span-1">
                    <p
                        class="mt-6 text-7xl leading-18 text-text-subtle text-center sm:text-start"
                    >
                        Building with nine lights to achieve perfection
                    </p>
                    <div
                        class="mt-10 flex items-center justify-center gap-x-6 sm:justify-center"
                    >
                        <PrimaryButton href="#services">
                            Explore our portofolio
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
