<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import { Dialog, DialogPanel } from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";

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
    { name: "Tentang Kami", href: "#about" },
    { name: "Proyek", href: "#projects" },
    { name: "Kontak", href: "#" },
];

const mobileMenuOpen = ref(false);
const swiperModules = [Autoplay, Pagination, Navigation, EffectFade];

const villaImages = [
    "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=2574&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop",
    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2670&auto=format&fit=crop",
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
                            class="h-8 w-auto"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
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
                        class="text-sm font-semibold leading-6 text-text-light"
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
                                src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
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
                class="absolute inset-0 z-10 mx-auto flex max-w-2xl items-center justify-center px-6 text-center lg:px-8"
            >
                <div>
                    <h1
                        class="text-5xl font-bold tracking-tight text-text-light sm:text-7xl"
                    >
                        Bali Ennea Phos
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-text-muted">
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
    </div>
</template>
