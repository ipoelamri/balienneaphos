<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import { Dialog, DialogPanel } from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";
import PrimaryButton from "@/Components/PrimaryButton.vue";

// 1. Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// 2. Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import "swiper/css/effect-fade";

// 3. import required modules
import { Autoplay, Pagination, Navigation, EffectFade } from "swiper/modules";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    portofolios: Array,
});

const navigation = [
    { name: "Home", href: "/" },
    { name: "Services", href: "#services" },
    { name: "About", href: "#about" },
    { name: "Portofolio", href: "#projects" },
    { name: "Contact", href: "#" },
];

const mobileMenuOpen = ref(false);
const swiperModules = [Autoplay, Pagination, Navigation, EffectFade];

const villaImages = [
    "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2574&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2670&auto=format&fit=crop",
];
const serviceImages = [
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2670&auto=format&fit=crop",
];
const serviceImages2 = [
    "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop",
];

const services = [
    {
        title: "VILLA MANAGEMENT",
        description:
            "Property management services remain well maintained, ensuring maximum ROI.",
    },
    {
        title: "STRUCTURAL CONSTRUCTION, ARCHITECTURE, AND MEP",
        description:
            " Integrating expertise to ensure projects that are sturdy, aesthetically pleasing, and functionally optimized.",
    },
];
const services2 = [
    {
        title: "LANDSCAPE",
        description:
            "Creating beautiful and functional landscape designs that blend natural elements with modern aesthetics to enrich the surroundings of your property.",
    },
    {
        title: "REAL ESTATE",
        description:
            "MProviding comprehensive property solutions, from buying and selling to land development, with a focus on strategic locations and optimal investment potential.",
    },
];

const getImageUrl = (imagePath) => {
    return imagePath
        ? `/storage/${imagePath}`
        : "https://via.placeholder.com/400x300";
};
</script>

<template>
    <Head title="Home" />
    <div class="bg-brand-dark text-text-light">
        <!-- Header: diubah menjadi fixed, dengan background transparan dan efek blur -->
        <header
            class="fixed inset-x-0 top-0 z-50 bg-brand-dark/80 backdrop-blur-sm"
        >
            <nav
                class="flex items-center justify-between p-6 lg:px-8"
                aria-label="Global"
            >
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Bali Ennea Phos</span>
                        <img
                            class="h-16 w-auto"
                            src="/images/logo.png"
                            alt="Company Logo"
                        />
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button
                        type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-text-subtle"
                        @click="mobileMenuOpen = true"
                    >
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon class="size-6" aria-hidden="true" />
                    </button>
                </div>
                <div
                    class="hidden lg:flex lg:gap-x-12"
                    v-if="navigation.length > 0"
                >
                    <a
                        v-for="item in navigation"
                        :key="item.name"
                        :href="item.href"
                        class="text-sm font-semibold leading-6 text-button-primary hover:text-text-light"
                        >{{ item.name }}</a
                    >
                </div>
                <div
                    class="hidden lg:flex lg:flex-1 lg:justify-end"
                    v-if="canLogin"
                >
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="text-sm font-semibold leading-6 text-text-light"
                        >Dashboard</Link
                    >
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="text-sm font-semibold leading-6 text-text-light"
                            >Log in <span aria-hidden="true">&rarr;</span></Link
                        >
                    </template>
                </div>
            </nav>
            <Dialog
                class="lg:hidden"
                @close="mobileMenuOpen = false"
                :open="mobileMenuOpen"
            >
                <div class="fixed inset-0 z-50" />
                <DialogPanel
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-brand-dark px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10"
                >
                    <div class="flex items-center justify-between">
                        <a href="/" class="-m-1.5 p-1.5">
                            <span class="sr-only">Bali Ennea Phos</span>
                            <img
                                class="h-8 w-auto"
                                src="/images/logo.png"
                                alt="Company Logo"
                            />
                        </a>
                        <button
                            type="button"
                            class="-m-2.5 rounded-md p-2.5 text-text-subtle"
                            @click="mobileMenuOpen = false"
                        >
                            <span class="sr-only">Close menu</span>
                            <XMarkIcon class="size-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root" v-if="navigation.length > 0">
                        <div class="-my-6 divide-y divide-text-subtle/25">
                            <div class="space-y-2 py-6">
                                <a
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-text-light hover:bg-brand-medium"
                                    >{{ item.name }}</a
                                >
                            </div>
                            <div class="py-6" v-if="canLogin">
                                <Link
                                    v-if="$page.props.auth.user"
                                    :href="route('dashboard')"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-text-light hover:bg-brand-medium"
                                    >Dashboard</Link
                                >
                                <Link
                                    v-else
                                    :href="route('login')"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-text-light hover:bg-brand-medium"
                                    >Log in</Link
                                >
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>

        <div class="relative isolate h-screen overflow-hidden">
            <Swiper
                :spaceBetween="0"
                :centeredSlides="true"
                :effect="'fade'"
                :autoplay="{
                    delay: 4000,
                    disableOnInteraction: false,
                }"
                :pagination="{
                    clickable: true,
                }"
                :navigation="true"
                :modules="swiperModules"
                class="mySwiper h-full w-full"
            >
                <SwiperSlide v-for="(image, index) in villaImages" :key="index">
                    <img
                        :src="image"
                        class="h-full w-full object-cover"
                        :alt="'Villa Image ' + (index + 1)"
                    />
                    <div class="absolute inset-0 bg-black/50"></div>
                </SwiperSlide>
            </Swiper>

            <div
                class="absolute inset-0 z-10 mx-auto flex max-w-4xl items-center justify-center px-6 text-center lg:px-8"
            >
                <div>
                    <h1
                        class="font-serif text-7xl mt-16 font-bold tracking-tight text-text-light sm:text-8xl"
                    >
                        Bali Ennea Phos
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-text-muted max-w-2xl">
                        Mewujudkan villa impian Anda di Bali dengan desain yang
                        elegan dan kualitas konstruksi terbaik.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a
                            href="#projects"
                            class="rounded-md bg-button-primary px-3.5 py-2.5 text-sm font-semibold text-text-light shadow-sm hover:bg-button-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent"
                        >
                            Lihat Proyek Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Services Section -->
        <section id="services" class="bg-background-light py-24 sm:py-32">
            <!-- Menggunakan grid untuk layout 2 kolom di layar besar (lg) -->
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 px-6 lg:grid-cols-3 lg:px-8"
            >
                <!-- Kolom Kiri: Judul dan Deskripsi -->
                <div class="lg:col-span-1 mt-20">
                    <h2
                        class="text-7xl text-center tracking-tight font-thin text-text-dark sm:text-9xl sm:text-start"
                    >
                        OUR
                    </h2>
                    <h2
                        class="font-sans text-6xl text-center text-button-primary font-extrabold tracking-tight sm:text-7xl sm:mb-16 sm:text-start"
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
                        class="flex flex-col rounded-lg bg-black p-8 shadow-lg hover:bg-brand-medium transition-shadow duration-300"
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
                        class="flex flex-col rounded-lg bg-black p-8 shadow-lg hover:bg-brand-medium transition-shadow duration-300"
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
                            Explore Services
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section id="visionmisson" class="bg-button-dark py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <!-- Vision -->
                <div
                    class="grid grid-cols-1 items-center gap-x-16 gap-y-16 lg:grid-cols-2"
                >
                    <div>
                        <h2
                            class="font-serif text-xl font-bold tracking-tight text-button-primary sm:text-9xl"
                        >
                            VISION
                        </h2>
                        <p class="mt-6 text-lg leading-8 text-text-subtle">
                            To be a leader in creating construction masterpieces
                            that embody perfection, innovation, and client
                            satisfaction in every project.
                        </p>
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                        alt="Modern villa view with pool"
                        class="w-full rounded-xl object-cover shadow-xl"
                    />
                </div>

                <!-- Mission -->
                <div
                    class="mt-24 grid grid-cols-1 items-center gap-x-16 gap-y-16 lg:mt-32 lg:grid-cols-2"
                >
                    <div class="lg:order-last">
                        <h2
                            class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-9xl"
                        >
                            MISSION
                        </h2>
                        <p class="mt-6 text-lg leading-8 text-text-subtle">
                            Delivering the Highest Quality Prioritizing Client
                            Satisfaction Building with Integrity Inspiring
                            Innovation
                        </p>
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                        alt="Luxurious villa interior"
                        class="w-full rounded-xl object-cover shadow-xl"
                    />
                </div>
            </div>
        </section>
    </div>
</template>
