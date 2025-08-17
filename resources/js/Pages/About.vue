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

// Data untuk statistik yang akan dianimasikan
// Menambahkan properti `isFloat` untuk menangani angka desimal
const stats = [
    { name: "Years of Experience", value: 8, suffix: "", isFloat: false },
    { name: "Projects", value: 250, suffix: "+", isFloat: false },
    { name: "Satisfied Clients", value: 400, suffix: "+", isFloat: false },
    { name: "Followers", value: 1.75, suffix: " mil", isFloat: true },
];

// Refs untuk menampung nilai yang akan ditampilkan di UI, dimulai dari 0
const animatedStats = ref(stats.map((stat) => ({ ...stat, displayValue: 0 })));

// Fungsi untuk menganimasikan angka dari 0 ke nilai akhir
// Disesuaikan untuk bisa menangani angka bulat (integer) dan desimal (float)
const animateValue = (statRef, end, duration, isFloat = false) => {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        if (isFloat) {
            // Menghitung nilai untuk angka desimal, dengan 2 angka di belakang koma
            statRef.displayValue = parseFloat((progress * end).toFixed(2));
        } else {
            // Menghitung nilai untuk angka bulat
            statRef.displayValue = Math.floor(progress * end);
        }
        if (progress < 1) {
            window.requestAnimationFrame(step);
        } else {
            statRef.displayValue = end; // Memastikan nilai akhir tepat
        }
    };
    window.requestAnimationFrame(step);
};

// Jalankan animasi saat komponen berhasil dimuat
onMounted(() => {
    animatedStats.value.forEach((stat) => {
        // Mengirimkan properti isFloat ke fungsi animasi
        animateValue(stat, stat.value, 2000, stat.isFloat); // Durasi animasi 2 detik
    });
});
</script>

<template>
    <Head title="About Us" />
    <div>
        <div
            class="pt-32 h-screen w-full"
            style="
                background-image: url('https://images.unsplash.com/photo-1568605114967-8130f3a36994?q=80&w=2670&auto=format&fit=crop');
                background-size: cover;
                background-position: center;
            "
        >
            <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 md:pt-72">
                <h1
                    class="font-serif text-6xl font-bold text-button-light sm:text-8xl"
                >
                    About Us
                </h1>
                <p class="mt-6 text-lg leading-8 text-button-light">
                    solidifying our commitment to professionalism and quality.
                </p>
            </div>
        </div>

        <section
            id="visionmisson"
            class="bg-background-light py-24 mb-12 sm:py-32"
        >
            <div class="mx-auto max-w-7xl px-6 py-6 lg:px-8">
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
                                About Us
                            </h2>
                        </div>
                        <p class="mt-6 text-lg leading-8 text-text-dark">
                            PT. Bali Ennea Phos is a trusted construction and
                            project management company with a reputation as one
                            of the best in Bali. Established in 2020, we started
                            as a construction team collaborating with renowned
                            architects to bring their innovative designs to
                            life. In 2024, we officially became a legal entity
                            under the name PT. Bali Ennea Phos.
                        </p>
                        <div class="items-center justify-center">
                            <PrimaryButton href="/contact">
                                Let's Talk
                            </PrimaryButton>
                        </div>
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2671&auto=format&fit=crop"
                        alt="Luxurious villa interior"
                        class="w-full rounded-xl object-cover shadow-xl border-4 border-button-primary"
                    />
                </div>
            </div>
        </section>

        <section class="bg-button-dark py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <div class="text-center">
                        <h2
                            class="font-serif text-3xl font-bold tracking-tight text-button-primary sm:text-8xl"
                        >
                            Our Achievements
                        </h2>
                        <p class="mt-4 text-lg leading-8 text-text-subtle">
                            Numbers that reflect our dedication and success.
                        </p>
                    </div>
                    <dl
                        class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4"
                    >
                        <div
                            v-for="stat in animatedStats"
                            :key="stat.name"
                            class="flex flex-col bg-white/5 p-8"
                        >
                            <dt
                                class="text-sm font-semibold leading-6 text-text-subtle"
                            >
                                {{ stat.name }}
                            </dt>
                            <dd
                                class="order-first text-5xl font-semibold tracking-tight text-button-primary"
                            >
                                {{ stat.displayValue }}{{ stat.suffix }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>
    </div>
</template>
