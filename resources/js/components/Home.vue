<template>
    <div class="rounded-lg bg-slate-300 p-10 text-center">
        <div>
            <p class="text-lg font-bold mt-2 mb-5 py-1">Weather</p>
        </div>

        <div class="flex flex-col">
            <div class="justify-center mx-auto" v-if="!data">
                <Spinner class="mx-auto" />
            </div>
            <div v-else>
                <p>
                    Current country:
                    <span class="font-semibold">
                        {{ data.country_name }}
                    </span>
                </p>
                <p>
                    Region:
                    <span class="font-semibold">{{ data.region }}</span>
                </p>
                <p>
                    City:
                    <span class="font-semibold">{{ data.city }}</span>
                </p>
            </div>
        </div>

        <div class="bg-slate-300 mt-10">
            <p class="font-bold text-center">Current Weather</p>
            <div class="my-2 pt-2 flex flex-col">
                <div class="justify-center mx-auto" v-if="!forecast">
                    <Spinner class="mx-auto" />
                </div>
                <div v-else class="justify-center mx-auto">
                    <img :src="imageUrl" :alt="forecastImg" class="h-12 w-12" />
                </div>
                <p class="font-semibold">
                    {{ forecast?.current?.condition?.text }}
                </p>
                <p class="font-semibold">
                    Temp: {{ forecast?.current?.temp_c }}
                </p>
                <p class="font-semibold">
                    Humidity: {{ forecast?.current?.humidity }}
                </p>
                <p class="font-semibold">
                   {{ (forecast?.current?.is_day == 1) ? 'Day' : 'Night' }}
                </p>
                <p class="font-semibold">
                   {{ forecast?.location?.localtime }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, computed } from "vue";
import { getCurrentLocation, getCurrentForecast } from "../api/weather";
import { getConditionLogo } from "@/helpers/weather-conditions";
import Spinner from "./global/Spinner.vue";

const data = ref(null);
const forecast = ref(null);
const forecastImg = ref("");

const imageUrl = computed(() => {
    return new URL(`../icons/${forecastImg.value}`, import.meta.url).href;
});

onMounted(async () => {
    data.value = await getCurrentLocation();
    forecast.value = await getCurrentForecast();
    forecastImg.value = getConditionLogo(forecast.value.current.condition.text);
    console.log("Forecast Image:", forecastImg.value); // Debugging line
    console.log("Image URL:", imageUrl.value); // Debugging line
});
</script>
