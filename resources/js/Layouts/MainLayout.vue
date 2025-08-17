<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import { Dialog, DialogPanel } from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const navigation = [
    { name: "Home", href: route("home") },
    { name: "Services", href: "/#services" },
    { name: "About", href: route("about") },
    { name: "Portofolio", href: "/#projects" },
    { name: "Contact", href: "#" },
];

const mobileMenuOpen = ref(false);
</script>

<template>
    <div class="bg-button-dark text-text-light">
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
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="item.href"
                        class="text-sm font-semibold leading-6 text-button-primary hover:text-text-light"
                        :class="{
                            'text-text-light underline': route().current(
                                item.name.toLowerCase()
                            ),
                        }"
                        >{{ item.name }}</Link
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
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-text-subtle/25">
                            <div
                                class="space-y-2 py-6"
                                v-if="navigation.length > 0"
                            >
                                <Link
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    @click="mobileMenuOpen = false"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-text-light hover:bg-brand-medium"
                                    >{{ item.name }}</Link
                                >
                            </div>
                            <!-- Mobile Login/Dashboard Links -->
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

        <!-- Slot untuk konten halaman -->
        <main>
            <slot />
        </main>

        <!-- Footer (Anda bisa menambahkan footer di sini) -->
        <footer class="bg-brand-dark border-t border-white/10 py-8">
            <div class="mx-auto max-w-7xl px-6 text-center text-text-subtle">
                <p>
                    &copy; {{ new Date().getFullYear() }} PT. Bali Ennea Phos.
                    All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</template>
