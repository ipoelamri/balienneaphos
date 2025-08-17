<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import {
    ShieldCheckIcon,
    SparklesIcon,
    LightBulbIcon,
    UserGroupIcon,
    GlobeAmericasIcon,
    WrenchScrewdriverIcon,
} from "@heroicons/vue/24/outline";

import MainLayout from "@/Layouts/MainLayout.vue";
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

// Memberitahu Inertia untuk menggunakan MainLayout.vue sebagai pembungkus halaman ini
defineOptions({ layout: MainLayout });

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    portofolios: Array,
});

const galleryImages = [
    {
        src: "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2574&auto=format&fit=crop",

        alt: "Gambar 1",
    },
    {
        src: "https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop",
        alt: "Gambar 2",
    },
    {
        src: "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",

        alt: "Gambar 3",
    },
    {
        src: "https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=2670&auto=format&fit=crop",
        alt: "Gambar 4",
    },
    {
        src: "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
        alt: "Gambar 5",
    },
    {
        src: "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2670&auto=format&fit=crop",
        alt: "Gambar 6",
    },
];

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

const coreValues = [
    {
        title: "Integrity Reflected in Quality",
        description:
            "Quality is our promise. We combine expertise, the finest materials, and a commitment to the values of integrity to ensure that every project becomes a lasting symbol of excellence.",
        icon: ShieldCheckIcon,
    },
    {
        title: "Building with Core Values",
        description:
            "PT. Bali Ennea Phos is committed to unwavering accountability, dedication, and integrity. Through this approach, we ensure that every structure not only stands tall but also reflects the trust and values our clients place in us.",
        icon: SparklesIcon,
    },
    {
        title: "Dedication to Excellence",
        description:
            "Excellence is not just our goal but also our standard. Every detail is meticulously attended to, creating results that not only meet but exceed client expectations.",
        icon: LightBulbIcon,
    },
    {
        title: "Client Satisfaction is Our Top Priority",
        description:
            "We believe that true success lies in the smiles and satisfaction of our clients.Through open communication, understanding client needs, and delivering exceptional results, we make your satisfaction our ultimate goal.",
        icon: UserGroupIcon,
    },
    {
        title: "Uncompromising Accountability",
        description:
            "We understand that every project carries significant responsibility. With transparency and trust as our core pillars,PT. Bali Ennea Phos ensures that every step of the construction process is accountable, from planning to completion.",
        icon: GlobeAmericasIcon,
    },
    {
        title: "Excellence in Every Detail",
        description:
            "With accountability as our foundation, we deliver construction solutions infused with a dedication to perfection. We don’t just build structures; we create meaningful experiences and long-lasting relationships.",
        icon: WrenchScrewdriverIcon,
    },
];

const marqueeImages = [
    "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2574&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=500&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=500&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=500&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=500&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=500&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1598228723793-52759bba239c?q=80&w=500&auto=format&fit=crop",
];

// Untuk membuat tinggi gambar terlihat acak namun konsisten
const randomHeights = [
    "h-56",
    "h-48",
    "h-56",
    "h-48",
    "h-44",
    "h-56",
    "h-56",
    "h-48",
    "h-56",
    "h-56",
    "h-48",
];

const getImageUrl = (imagePath) => {
    return imagePath
        ? `/storage/${imagePath}`
        : "https://via.placeholder.com/400x300";
};
</script>

<template>
    <Head title="Home" />
    <div>
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
                        PT. Bali Ennea Phos is a trusted construction and
                        project management company with a reputation as one of
                        the best in Bali.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a
                            href="#projects"
                            class="rounded-md bg-button-primary px-3.5 py-2.5 text-sm font-semibold text-text-light shadow-sm hover:bg-button-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent"
                        >
                            Explore our portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Services Section -->
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
                            Explore Services
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section id="visionmisson" class="bg-button-dark py-24 mb-12 sm:py-32">
            <div class="mx-auto max-w-xl px-6 lg:px-8 text-center">
                <h2
                    class="font-serif text-xl font-bold tracking-tight text-center text-button-light sm:text-8xl"
                >
                    Vision and Mission
                </h2>
            </div>
            <div class="mx-auto max-w-7xl px-6 py-6 lg:px-8">
                <!-- Vision -->
                <div
                    class="grid grid-cols-1 items-center gap-x-16 gap-y-16 lg:grid-cols-2 mt-8"
                >
                    <div class="text-center md:text-right">
                        <div
                            class="inline-block border-b-2 border-button-primary pb-2 mb-4"
                        >
                            <h2
                                class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-8xl"
                            >
                                VISION
                            </h2>
                        </div>
                        <p class="mt-6 text-lg leading-8 text-text-subtle">
                            To be a leader in creating construction masterpieces
                            that embody perfection, innovation, and client
                            satisfaction in every project.
                        </p>
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                        alt="Modern villa view with pool"
                        class="w-full rounded-xl object-cover shadow-xl border-4 border-button-primary"
                    />
                </div>

                <div
                    class="mt-24 grid grid-cols-1 items-center gap-x-16 gap-y-16 lg:mt-2 lg:grid-cols-2"
                >
                    <div class="lg:order-last">
                        <div
                            class="inline-block border-b-2 border-button-primary pb-2 mb-4"
                        >
                            <h2
                                class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-8xl"
                            >
                                MISSION
                            </h2>
                        </div>
                        <p class="mt-6 text-lg leading-8 text-text-subtle">
                            Delivering the Highest Quality Prioritizing Client
                            Satisfaction Building with Integrity Inspiring
                            Innovation
                        </p>
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                        alt="Luxurious villa interior"
                        class="w-full rounded-xl object-cover shadow-xl border-4 border-button-primary"
                    />
                </div>
            </div>
        </section>

        <!-- Scrolling Gallery Section -->
        <div class="py-4 sm:py-4 bg-background-light">
            <div class="relative flex overflow-x-hidden group">
                <div
                    class="flex min-w-full flex-shrink-0 animate-marquee items-center justify-around whitespace-nowrap group-hover:[animation-play-state:paused]"
                >
                    <div
                        v-for="(image, index) in marqueeImages"
                        :key="`a-${index}`"
                        class="mx-2"
                    >
                        <img
                            :src="image"
                            :class="randomHeights[index]"
                            class="max-w-none rounded-xl object-cover"
                            alt="Villa Gallery Image"
                        />
                    </div>
                    <div
                        v-for="(image, index) in marqueeImages"
                        :key="`b-${index}`"
                        class="mx-2"
                    >
                        <img
                            :src="image"
                            :class="randomHeights[index]"
                            class="max-w-none rounded-xl object-cover"
                            alt="Villa Gallery Image"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <section id="core-values" class="bg-background-light py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl text-center">
                    <h2
                        class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-8xl"
                    >
                        Our Core Values
                    </h2>
                    <p class="mt-6 text-2xl leading-8 text-text-subtle">
                        The principles that guide our every decision and action.
                    </p>
                </div>
                <div
                    class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                >
                    <div
                        v-for="value in coreValues"
                        :key="value.title"
                        class="flex transform flex-col items-center rounded-lg border border-transparent bg-button-dark p-8 text-center shadow-lg transition-all duration-300 ease-in-out hover:-translate-y-2 hover:border-button-primary hover:border-4 hover:shadow-2xl"
                    >
                        <div
                            class="mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-button-primary text-white"
                        >
                            <component :is="value.icon" class="h-8 w-8" />
                        </div>
                        <h3
                            class="text-xl font-semibold leading-6 text-text-light"
                        >
                            {{ value.title }}
                        </h3>
                        <p
                            class="mt-4 flex-auto text-base leading-7 text-text-subtle"
                        >
                            {{ value.description }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="why-us bg-button-dark py-24 sm:py-24">
            <div class="mx-auto max-w-xl px-6 lg:px-8 text-center">
                <h2
                    class="font-serif text-xl font-bold tracking-tight text-center text-button-light sm:text-8xl"
                >
                    Why Us?
                </h2>
            </div>
            <div class="overflow-hidden bg-button-dark py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2"
                    >
                        <div class="lg:pt-4 lg:pr-8">
                            <div class="lg:max-w-lg">
                                <p
                                    class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-button-primary sm:text-8xl"
                                >
                                    Why Us?
                                </p>
                                <p class="mt-6 text-xl font-bold text-gray-300">
                                    Because we don’t just build structures – we
                                    build trust, excellence, and pride.
                                </p>
                                <p
                                    class="mt-6 text-lg/8 text-button-primary text-center"
                                >
                                    Unwavering Accountability Dedication to
                                    Perfection Integrity in Quality Your
                                    Satisfaction, Our Mission A Portfolio That
                                    Speaks for Itself
                                </p>
                                <p class="mt-6 text-lg/8 text-gray-300">
                                    Choosing PT. Bali Ennea Phos means choosing
                                    a partner who cares, is professional, and is
                                    dedicated to turning your vision into a
                                    masterpiece. With us, your project will
                                    become a symbol of perfection and
                                    timelessness.
                                </p>
                                <img
                                    src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                                    alt="Luxurious villa interior"
                                    class="w-full rounded-xl object-cover shadow-xl border-4 border-button-primary mt-6"
                                />
                                <p
                                    class="mt-6 text-4xl font-extrabold text-gray-300"
                                >
                                    With PT. Bali Ennea Phos, you don’t just get
                                    a project – you gain an unforgettable
                                    experience. Trust us, and feel the
                                    difference.
                                </p>

                                <div class="mx-auto mt-16 px-4 md:px-6 lg:px-8">
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                                    >
                                        <div
                                            class="h-96 md:h-auto md:row-span-2"
                                        >
                                            <img
                                                :src="galleryImages[0].src"
                                                :alt="galleryImages[0].alt"
                                                class="w-full h-72 object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>

                                        <div class="h-96">
                                            <img
                                                :src="galleryImages[1].src"
                                                :alt="galleryImages[1].alt"
                                                class="w-full h-full object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>

                                        <div
                                            class="h-96 md:h-auto lg:row-span-2"
                                        >
                                            <img
                                                :src="galleryImages[2].src"
                                                :alt="galleryImages[2].alt"
                                                class="w-full h-full object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>

                                        <div class="h-72">
                                            <img
                                                :src="galleryImages[3].src"
                                                :alt="galleryImages[3].alt"
                                                class="w-full h-full object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>

                                        <div
                                            class="h-96 md:h-auto md:row-span-2 lg:row-span-3"
                                        >
                                            <img
                                                :src="galleryImages[4].src"
                                                :alt="galleryImages[4].alt"
                                                class="w-full h-full object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>

                                        <div class="h-96">
                                            <img
                                                :src="galleryImages[5].src"
                                                :alt="galleryImages[5].alt"
                                                class="w-full h-full object-cover rounded-xl shadow-lg border-4 border-button-primary"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img
                            src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2574&auto=format&fit=crop"
                            alt="Product screenshot"
                            class="w-xl max-w-none rounded-xl shadow-xl ring-1 ring-white/10 sm:w-228 md:-ml-4 lg:-ml-0 border-4 border-button-primary"
                            width="2432"
                            height="1442"
                        />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
