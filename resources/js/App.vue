<template>
    <div class="container mx-auto">
        <div class="flex flex-row flex-wrap py-4">
            <aside class="w-full sm:w-1/3 md:w-1/4 px-2">
                <div class="sticky top-0 w-full rounded-lg">
                    <!-- navigation -->
                    <ul
                        class="flex flex-col overflow-hidden bg-teal-500 rounded-lg cursor-pointer"
                    >
                        <RouterLink
                            class="py-2 px-2 ease-in-ease-out transition-all hover:bg-gray-300 mb-1 hover:font-semibold"
                            v-for="(country, index) in countries"
                            :key="index"
                            :to="country && country === 'Philippines' ? '/' : '/country/' + country"
                        >
                            {{ country }}
                        </RouterLink>
                    </ul>
                </div>
            </aside>
            <main role="main" class="w-full sm:w-2/3 md:w-3/4">
                <Suspense>
                    <router-view></router-view>
                </Suspense>
            </main>
        </div>
    </div>
    <footer class="mt-auto">...</footer>
</template>

<script setup>
import { ref } from "vue";
const countries = ref(["Philippines", "Japan", "USA", "Thailand", "Indonesia", "Vietname", "Singapore", "Malaysia", "South Korea", "China", "Italy", "Russia"]);
</script>