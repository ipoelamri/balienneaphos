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
    { name: "Services", href: "services" },
    { name: "About", href: route("about") },
    { name: "Portofolio", href: route("portofolios.public") },
    { name: "Contact", href: route("contact") },
];

const mobileMenuOpen = ref(false);
const menus = ref([
    {
        title: "Resources",
        items: [
            { text: "Our Services", link: "/services" },
            { text: "Our Core Values", link: "#core-values" },
            // { text: "User Flow", link: "javascript:void(0)" },
            // { text: "User Strategy", link: "javascript:void(0)" },
        ],
    },
    {
        title: "Company",
        items: [
            { text: "About Us", link: "/about" },

            { text: "Contact & Support", link: "/contact" },
            // { text: "Our Achievements", link: "#achievements" },
        ],
    },
    {
        title: "Quick Links",
        items: [
            { text: "Send Mail", link: "mailto:Hello@balienneaphos.com" },
            {
                text: "Our Office",
                link: "https://maps.app.goo.gl/6H1eM8pED8WFNjgD9?g_st=ipc",
            },
        ],
    },
]);
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
        <footer
            class="relative z-10 bg-button-dark pt-20 pb-10 lg:pt-[120px] lg:pb-20"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="container md:mx-auto mx-4">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                            <div class="w-full mb-10">
                                <a
                                    href="javascript:void(0)"
                                    class="mb-6 inline-block max-w-[160px]"
                                >
                                    <img
                                        src="/images/logo.png"
                                        alt="logo"
                                        class="max-w-full h-24 w-auto"
                                    />
                                    <!-- <img
                                        src="/images/logo.png"
                                        alt="logo"
                                        class="max-w-full h-24 w-auto"
                                    /> -->
                                </a>
                                <p
                                    class="text-base text-body-color dark:text-dark-6 mb-7"
                                >
                                    PT. Bali Ennea Phos is a trusted
                                    construction and project management company
                                    with a reputation as one of the best in
                                    Bali.
                                </p>
                                <p
                                    class="flex items-center text-sm font-medium text-dark dark:text-white"
                                >
                                    <!-- <span class="mr-3 text-primary">
                                        <svg
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g
                                                clip-path="url(#clip0_941_15626)"
                                            >
                                                <path
                                                    d="M15.1875 19.4688C14.3438 19.4688 13.375 19.25 12.3125 18.8438C10.1875 18 7.84377 16.375 5.75002 14.2813C3.65627 12.1875 2.03127 9.84377 1.18752 7.68752C0.250019 5.37502 0.343769 3.46877 1.43752 2.40627C1.46877 2.37502 1.53127 2.34377 1.56252 2.31252L4.18752 0.750025C4.84377 0.375025 5.68752 0.562525 6.12502 1.18752L7.96877 3.93753C8.40627 4.59378 8.21877 5.46877 7.59377 5.90627L6.46877 6.68752C7.28127 8.00002 9.59377 11.2188 13.2813 13.5313L13.9688 12.5313C14.5 11.7813 15.3438 11.5625 16.0313 12.0313L18.7813 13.875C19.4063 14.3125 19.5938 15.1563 19.2188 15.8125L17.6563 18.4375C17.625 18.5 17.5938 18.5313 17.5625 18.5625C17 19.1563 16.1875 19.4688 15.1875 19.4688ZM2.37502 3.46878C1.78127 4.12503 1.81252 5.46877 2.50002 7.18752C3.28127 9.15627 4.78127 11.3125 6.75002 13.2813C8.68752 15.2188 10.875 16.7188 12.8125 17.5C14.5 18.1875 15.8438 18.2188 16.5313 17.625L18.0313 15.0625C18.0313 15.0313 18.0313 15.0313 18.0313 15L15.2813 13.1563C15.2813 13.1563 15.2188 13.1875 15.1563 13.2813L14.4688 14.2813C14.0313 14.9063 13.1875 15.0938 12.5625 14.6875C8.62502 12.25 6.18752 8.84377 5.31252 7.46877C4.90627 6.81252 5.06252 5.96878 5.68752 5.53128L6.81252 4.75002V4.71878L4.96877 1.96877C4.96877 1.93752 4.93752 1.93752 4.90627 1.96877L2.37502 3.46878Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M18.3125 8.90633C17.9375 8.90633 17.6563 8.62508 17.625 8.25008C17.375 5.09383 14.7813 2.56258 11.5938 2.34383C11.2188 2.31258 10.9063 2.00008 10.9375 1.59383C10.9688 1.21883 11.2813 0.906333 11.6875 0.937583C15.5625 1.18758 18.7188 4.25008 19.0313 8.12508C19.0625 8.50008 18.7813 8.84383 18.375 8.87508C18.375 8.90633 18.3438 8.90633 18.3125 8.90633Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M15.2187 9.18755C14.875 9.18755 14.5625 8.93755 14.5312 8.56255C14.3437 6.87505 13.0312 5.56255 11.3437 5.3438C10.9687 5.31255 10.6875 4.93755 10.7187 4.56255C10.75 4.18755 11.125 3.9063 11.5 3.93755C13.8437 4.2188 15.6562 6.0313 15.9375 8.37505C15.9687 8.75005 15.7187 9.0938 15.3125 9.1563C15.25 9.18755 15.2187 9.18755 15.2187 9.18755Z"
                                                    fill="currentColor"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_941_15626">
                                                    <rect
                                                        width="20"
                                                        height="20"
                                                        fill="white"
                                                    />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <span>+62 819-7799-7548</span> -->
                                </p>
                            </div>
                        </div>

                        <div
                            v-for="menu in menus"
                            :key="menu.title"
                            class="w-full px-4 sm:w-1/2 lg:w-2/12"
                        >
                            <div class="w-full mb-10">
                                <h4
                                    class="text-lg font-semibold text-dark dark:text-white mb-9"
                                >
                                    {{ menu.title }}
                                </h4>
                                <ul class="space-y-3">
                                    <li
                                        v-for="item in menu.items"
                                        :key="item.text"
                                    >
                                        <a
                                            :href="item.link"
                                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6"
                                        >
                                            {{ item.text }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                            <div class="w-full mb-10">
                                <h4
                                    class="text-lg font-semibold text-dark dark:text-white mb-9"
                                >
                                    Follow Us On
                                </h4>
                                <div class="flex items-center mb-6">
                                    <a
                                        href="https://www.facebook.com/share/19aNmxGY6p/?mibextid=wwXIfr"
                                        class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
                                        <svg
                                            width="8"
                                            height="16"
                                            viewBox="0 0 8 16"
                                            class="fill-current"
                                        >
                                            <path
                                                d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="https://www.instagram.com/bali_enneaphos?igsh=dWh3eXFlcDRhNzlh"
                                        class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="#f5f5f5"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <rect
                                                width="20"
                                                height="20"
                                                x="2"
                                                y="2"
                                                rx="5"
                                                ry="5"
                                            ></rect>
                                            <path
                                                d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                                            ></path>
                                            <line
                                                x1="17.5"
                                                x2="17.51"
                                                y1="6.5"
                                                y2="6.5"
                                            ></line>
                                        </svg>
                                    </a>
                                    <a
                                        href="https://youtube.com/@balienneaphos?feature=shared"
                                        class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
                                        <svg
                                            width="16"
                                            height="12"
                                            viewBox="0 0 16 12"
                                            class="fill-current"
                                        >
                                            <path
                                                d="M15.6645 1.88018C15.4839 1.13364 14.9419 0.552995 14.2452 0.359447C13.0065 6.59222e-08 8 0 8 0C8 0 2.99355 6.59222e-08 1.75484 0.359447C1.05806 0.552995 0.516129 1.13364 0.335484 1.88018C0 3.23502 0 6 0 6C0 6 0 8.79263 0.335484 10.1198C0.516129 10.8664 1.05806 11.447 1.75484 11.6406C2.99355 12 8 12 8 12C8 12 13.0065 12 14.2452 11.6406C14.9419 11.447 15.4839 10.8664 15.6645 10.1198C16 8.79263 16 6 16 6C16 6 16 3.23502 15.6645 1.88018ZM6.4 8.57143V3.42857L10.5548 6L6.4 8.57143Z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        href="https://www.tiktok.com/@balienneaphos?_t=ZS-8z2qGNxIpOu&_r=1"
                                        class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4"
                                    >
                                        <div class="w-4 h-4">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 448 512"
                                            >
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                                <path
                                                    d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"
                                                />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                <p
                                    class="text-base text-body-color dark:text-dark-6"
                                >
                                    &copy; 2025 Bali Ennea Phos. All rights
                                    reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="absolute left-0 bottom-0 z-[-1]">
                        <svg
                            width="217"
                            height="229"
                            viewBox="0 0 217 229"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                                fill="url(#paint0_linear_1179_5)"
                            />
                            <defs>
                                <linearGradient
                                    id="paint0_linear_1179_5"
                                    x1="76.5"
                                    y1="281"
                                    x2="76.5"
                                    y2="1.22829e-05"
                                    gradientUnits="userSpaceOnUse"
                                >
                                    <stop
                                        stop-color="#3056D3"
                                        stop-opacity="0.08"
                                    />
                                    <stop
                                        offset="1"
                                        stop-color="#C4C4C4"
                                        stop-opacity="0"
                                    />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <span class="absolute top-10 right-10 z-[-1]">
                        <svg
                            width="75"
                            height="75"
                            viewBox="0 0 75 75"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                                fill="url(#paint0_linear_1179_4)"
                            />
                            <defs>
                                <linearGradient
                                    id="paint0_linear_1179_4"
                                    x1="-1.63917e-06"
                                    y1="37.5"
                                    x2="75"
                                    y2="37.5"
                                    gradientUnits="userSpaceOnUse"
                                >
                                    <stop
                                        stop-color="#13C296"
                                        stop-opacity="0.31"
                                    />
                                    <stop
                                        offset="1"
                                        stop-color="#C4C4C4"
                                        stop-opacity="0"
                                    />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                </div>
            </div>
        </footer>
    </div>
</template>
