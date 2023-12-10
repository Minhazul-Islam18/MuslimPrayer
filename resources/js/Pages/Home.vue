<script setup>
import { ref, watchEffect } from 'vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';
// import uq from '@umalqura/core';

const props = defineProps({
    infos: Array | Object,
})

let infos = Object.entries(props.infos.items[0])
const today = props.infos.items[0].date_for
infos = infos.filter(item => !item.includes("date_for"));
const bg_image = 'https://www.islamicfinder.org/static/live180/themes/theme20/images/fajr.png'




// Prayer time widget
const upcomingPrayerIndex = ref(null);
const countdown = ref(null);
let anyActivePrayer = ref(true);

const calculateCountdown = () => {
    const now = new Date();
    const upcomingPrayerEntry = infos.find(
        ([, timeStr]) => now < new Date(`${today} ${timeStr}`)
    );

    if (upcomingPrayerEntry) {
        const prayerTime = new Date(`${today} ${upcomingPrayerEntry[1]}`);
        const timeUntilPrayer = prayerTime - now;

        const hours = Math.floor(timeUntilPrayer / 3600000);
        const minutes = Math.floor((timeUntilPrayer % 3600000) / 60000);
        const seconds = Math.floor((timeUntilPrayer % 60000) / 1000);

        upcomingPrayerIndex.value = infos.findIndex(([prayer]) => prayer === upcomingPrayerEntry[0]);
        countdown.value = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
    } else {
        upcomingPrayerIndex.value = null;
        countdown.value = null;
    }

    if (upcomingPrayerEntry) {
        anyActivePrayer = false
    } else {
        anyActivePrayer = true
    }
};

const pad = (number) => {
    return number.toString().padStart(2, '0');
};

const isUpcomingPrayer = (index) => {
    return index === upcomingPrayerIndex.value;
};

watchEffect(() => {
    const intervalId = setInterval(calculateCountdown, 1000);

    // Cleanup on component unmount
    return () => clearInterval(intervalId);
});


const today_arabic = umalqura().format('fullDate');
console.log(today_arabic);

</script>
<style scoped>
.countdown {
    font-size: 32px;
    display: block;
    margin-top: 8px;
    text-align: center;
    font-weight: 900;
}
</style>
<template>
    <ClientLayout>
        <div class="py-12">
            <div class=" bg-white rounded-lg px-7 py-4" id="prayertimes-card">
                <div class="pt-card-header flex flex-col sm:flex-row flex-wrap justify-between">
                    <div class="d-flex flex-column">
                        <h1 class="flex gap-2 mb-1 font-extrabold text-3xl pb-1 border-b">
                            Prayer Times
                            <span
                                class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-pink-500 relative inline-block">
                                <span class="relative text-white">{{ props.infos.city }}</span>
                            </span>
                        </h1>
                    </div>
                    <div class="pt-date font-dark font-sm">
                        <p class=" font-bold text-end">{{ new Date().toLocaleString() }}</p>
                        <p class=" font-bold text-end">{{ today_arabic + ' Hijri' }}</p>
                        <div class="mt-6">
                            <div class="flex flex-col sm:flex-row sm:justify-between">
                                <span class="text-xl font-bold flex flex-col gap-1 items-center">
                                    <svg fill="#000000" width="50px" height="50px" viewBox="0 0 64 64" version="1.1"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                            stroke="#2d56c4" stroke-width="1.408">
                                            <g id="cloudy_sunny"></g>
                                            <g id="bright"></g>
                                            <g id="cloudy"></g>
                                            <g id="high_rainfall"></g>
                                            <g id="windy"></g>
                                            <g id="rain_with_thunder"></g>
                                            <g id="clear_night"></g>
                                            <g id="cloudy_night"></g>
                                            <g id="moon"></g>
                                            <g id="sun"></g>
                                            <g id="rainy_night"></g>
                                            <g id="windy_night">
                                                <g>
                                                    <path
                                                        d="M61,23c0-1.6-0.2-3.2-0.6-4.8c-0.1-0.4-0.5-0.7-0.9-0.8c-0.4,0-0.8,0.3-1,0.7C57.1,22.2,53.3,25,49,25 c-5.5,0-10-4.5-10-10c0-4.3,2.8-8.1,6.9-9.5c0.4-0.1,0.7-0.5,0.7-1c0-0.4-0.3-0.8-0.8-0.9C44.2,3.2,42.6,3,41,3 c-10.1,0-18.6,7.5-19.8,17.5c-2.7,1.4-4.9,3.9-6,6.9c-0.5-0.1-0.9-0.1-1.4-0.1C7.9,27.2,3,32.1,3,38.1S7.9,49,13.9,49h27.9 c4.9,0,8.9-3.8,9.2-8.7C57.2,36.8,61,30.2,61,23z M41.8,47H13.9C9,47,5,43,5,38.1s4-8.9,8.9-8.9c0.6,0,1.2,0.1,1.9,0.2 c0.5,0.1,1-0.2,1.2-0.7C18.1,24.2,22.3,21,27,21c5.8,0,10.5,4.7,10.5,10.5c0,0.6,0.4,1,1,1h3.3c4,0,7.2,3.2,7.2,7.2 S45.8,47,41.8,47z M50.8,38.1c-0.8-4.3-4.6-7.5-9.1-7.5h-2.3C39,24.1,33.6,19,27,19c-1.3,0-2.5,0.2-3.7,0.6C24.9,11.2,32.3,5,41,5 c0.4,0,0.9,0,1.3,0C39,7.2,37,10.9,37,15c0,6.6,5.4,12,12,12c4.1,0,7.8-2,10-5.3c0,0.4,0,0.9,0,1.3C59,29.1,55.9,34.8,50.8,38.1z">
                                                    </path>
                                                    <path
                                                        d="M44,51H16c-0.6,0-1,0.4-1,1s0.4,1,1,1h28c1.7,0,3,1.3,3,3s-1.3,3-3,3h-1c-1.1,0-2-0.9-2-2c0-0.6,0.4-1,1-1 c0.6,0,1-0.4,1-1s-0.4-1-1-1c-1.7,0-3,1.3-3,3c0,2.2,1.8,4,4,4h1c2.8,0,5-2.2,5-5S46.8,51,44,51z">
                                                    </path>
                                                    <path
                                                        d="M39,35h-1c-2.2,0-4,1.8-4,4c0,1.7,1.3,3,3,3c0.6,0,1-0.4,1-1s-0.4-1-1-1c-0.6,0-1-0.4-1-1c0-1.1,0.9-2,2-2h1 c1.7,0,3,1.3,3,3s-1.3,3-3,3H24c-0.6,0-1,0.4-1,1s0.4,1,1,1h15c2.8,0,5-2.2,5-5S41.8,35,39,35z">
                                                    </path>
                                                    <path
                                                        d="M28,36c0-2.8-2.2-5-5-5h-1c-2.2,0-4,1.8-4,4c0,1.7,1.3,3,3,3c0.6,0,1-0.4,1-1s-0.4-1-1-1c-0.6,0-1-0.4-1-1 c0-1.1,0.9-2,2-2h1c1.7,0,3,1.3,3,3s-1.3,3-3,3H12c-0.6,0-1,0.4-1,1s0.4,1,1,1h11C25.8,41,28,38.8,28,36z">
                                                    </path>
                                                </g>
                                            </g>
                                            <g id="night_rain_thunder"></g>
                                            <g id="windy_rain"></g>
                                            <g id="temperature"></g>
                                            <g id="humidity"></g>
                                            <g id="air_pressure"></g>
                                            <g id="low_rainfall"></g>
                                            <g id="moderate_rainfall"></g>
                                            <g id="Sunset"></g>
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="cloudy_sunny"></g>
                                            <g id="bright"></g>
                                            <g id="cloudy"></g>
                                            <g id="high_rainfall"></g>
                                            <g id="windy"></g>
                                            <g id="rain_with_thunder"></g>
                                            <g id="clear_night"></g>
                                            <g id="cloudy_night"></g>
                                            <g id="moon"></g>
                                            <g id="sun"></g>
                                            <g id="rainy_night"></g>
                                            <g id="windy_night">
                                                <g>
                                                    <path
                                                        d="M61,23c0-1.6-0.2-3.2-0.6-4.8c-0.1-0.4-0.5-0.7-0.9-0.8c-0.4,0-0.8,0.3-1,0.7C57.1,22.2,53.3,25,49,25 c-5.5,0-10-4.5-10-10c0-4.3,2.8-8.1,6.9-9.5c0.4-0.1,0.7-0.5,0.7-1c0-0.4-0.3-0.8-0.8-0.9C44.2,3.2,42.6,3,41,3 c-10.1,0-18.6,7.5-19.8,17.5c-2.7,1.4-4.9,3.9-6,6.9c-0.5-0.1-0.9-0.1-1.4-0.1C7.9,27.2,3,32.1,3,38.1S7.9,49,13.9,49h27.9 c4.9,0,8.9-3.8,9.2-8.7C57.2,36.8,61,30.2,61,23z M41.8,47H13.9C9,47,5,43,5,38.1s4-8.9,8.9-8.9c0.6,0,1.2,0.1,1.9,0.2 c0.5,0.1,1-0.2,1.2-0.7C18.1,24.2,22.3,21,27,21c5.8,0,10.5,4.7,10.5,10.5c0,0.6,0.4,1,1,1h3.3c4,0,7.2,3.2,7.2,7.2 S45.8,47,41.8,47z M50.8,38.1c-0.8-4.3-4.6-7.5-9.1-7.5h-2.3C39,24.1,33.6,19,27,19c-1.3,0-2.5,0.2-3.7,0.6C24.9,11.2,32.3,5,41,5 c0.4,0,0.9,0,1.3,0C39,7.2,37,10.9,37,15c0,6.6,5.4,12,12,12c4.1,0,7.8-2,10-5.3c0,0.4,0,0.9,0,1.3C59,29.1,55.9,34.8,50.8,38.1z">
                                                    </path>
                                                    <path
                                                        d="M44,51H16c-0.6,0-1,0.4-1,1s0.4,1,1,1h28c1.7,0,3,1.3,3,3s-1.3,3-3,3h-1c-1.1,0-2-0.9-2-2c0-0.6,0.4-1,1-1 c0.6,0,1-0.4,1-1s-0.4-1-1-1c-1.7,0-3,1.3-3,3c0,2.2,1.8,4,4,4h1c2.8,0,5-2.2,5-5S46.8,51,44,51z">
                                                    </path>
                                                    <path
                                                        d="M39,35h-1c-2.2,0-4,1.8-4,4c0,1.7,1.3,3,3,3c0.6,0,1-0.4,1-1s-0.4-1-1-1c-0.6,0-1-0.4-1-1c0-1.1,0.9-2,2-2h1 c1.7,0,3,1.3,3,3s-1.3,3-3,3H24c-0.6,0-1,0.4-1,1s0.4,1,1,1h15c2.8,0,5-2.2,5-5S41.8,35,39,35z">
                                                    </path>
                                                    <path
                                                        d="M28,36c0-2.8-2.2-5-5-5h-1c-2.2,0-4,1.8-4,4c0,1.7,1.3,3,3,3c0.6,0,1-0.4,1-1s-0.4-1-1-1c-0.6,0-1-0.4-1-1 c0-1.1,0.9-2,2-2h1c1.7,0,3,1.3,3,3s-1.3,3-3,3H12c-0.6,0-1,0.4-1,1s0.4,1,1,1h11C25.8,41,28,38.8,28,36z">
                                                    </path>
                                                </g>
                                            </g>
                                            <g id="night_rain_thunder"></g>
                                            <g id="windy_rain"></g>
                                            <g id="temperature"></g>
                                            <g id="humidity"></g>
                                            <g id="air_pressure"></g>
                                            <g id="low_rainfall"></g>
                                            <g id="moderate_rainfall"></g>
                                            <g id="Sunset"></g>
                                        </g>
                                    </svg>
                                    {{ props.infos.today_weather.pressure }}</span>
                                <span class="text-xl font-bold flex flex-col gap-1 items-center">
                                    <svg fill="#000000" width="50px" height="50px" viewBox="0 0 32.00 32.00" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.00032">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                            stroke="#466dd5" stroke-width="0.64">
                                            <title>temperature-three-quarters</title>
                                            <path
                                                d="M20.75 6.008c0-6.246-9.501-6.248-9.5 0v13.238c-1.235 1.224-2 2.921-2 4.796 0 3.728 3.022 6.75 6.75 6.75s6.75-3.022 6.75-6.75c0-1.875-0.765-3.572-2-4.796l-0.001-0zM16 29.25c-2.9-0-5.25-2.351-5.25-5.251 0-1.553 0.674-2.948 1.745-3.909l0.005-0.004 0.006-0.012c0.13-0.122 0.215-0.29 0.231-0.477l0-0.003c0.001-0.014 0.007-0.024 0.008-0.038l0.006-0.029v-13.52c-0.003-0.053-0.005-0.115-0.005-0.178 0-1.704 1.381-3.085 3.085-3.085 0.060 0 0.12 0.002 0.179 0.005l-0.008-0c0.051-0.003 0.11-0.005 0.17-0.005 1.704 0 3.085 1.381 3.085 3.085 0 0.063-0.002 0.125-0.006 0.186l0-0.008v13.52l0.006 0.029 0.007 0.036c0.015 0.191 0.101 0.36 0.231 0.482l0 0 0.006 0.012c1.076 0.966 1.75 2.361 1.75 3.913 0 2.9-2.35 5.25-5.25 5.251h-0zM16.75 21.367v-11.522c0-0.414-0.336-0.75-0.75-0.75s-0.75 0.336-0.75 0.75v0 11.522c-1.164 0.338-2 1.394-2 2.646 0 1.519 1.231 2.75 2.75 2.75s2.75-1.231 2.75-2.75c0-1.252-0.836-2.308-1.981-2.641l-0.019-0.005zM26.5 2.25c-1.795 0-3.25 1.455-3.25 3.25s1.455 3.25 3.25 3.25c1.795 0 3.25-1.455 3.25-3.25v0c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM26.5 7.25c-0.966 0-1.75-0.784-1.75-1.75s0.784-1.75 1.75-1.75c0.966 0 1.75 0.784 1.75 1.75v0c-0.001 0.966-0.784 1.749-1.75 1.75h-0z">
                                            </path>
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title>temperature-three-quarters</title>
                                            <path
                                                d="M20.75 6.008c0-6.246-9.501-6.248-9.5 0v13.238c-1.235 1.224-2 2.921-2 4.796 0 3.728 3.022 6.75 6.75 6.75s6.75-3.022 6.75-6.75c0-1.875-0.765-3.572-2-4.796l-0.001-0zM16 29.25c-2.9-0-5.25-2.351-5.25-5.251 0-1.553 0.674-2.948 1.745-3.909l0.005-0.004 0.006-0.012c0.13-0.122 0.215-0.29 0.231-0.477l0-0.003c0.001-0.014 0.007-0.024 0.008-0.038l0.006-0.029v-13.52c-0.003-0.053-0.005-0.115-0.005-0.178 0-1.704 1.381-3.085 3.085-3.085 0.060 0 0.12 0.002 0.179 0.005l-0.008-0c0.051-0.003 0.11-0.005 0.17-0.005 1.704 0 3.085 1.381 3.085 3.085 0 0.063-0.002 0.125-0.006 0.186l0-0.008v13.52l0.006 0.029 0.007 0.036c0.015 0.191 0.101 0.36 0.231 0.482l0 0 0.006 0.012c1.076 0.966 1.75 2.361 1.75 3.913 0 2.9-2.35 5.25-5.25 5.251h-0zM16.75 21.367v-11.522c0-0.414-0.336-0.75-0.75-0.75s-0.75 0.336-0.75 0.75v0 11.522c-1.164 0.338-2 1.394-2 2.646 0 1.519 1.231 2.75 2.75 2.75s2.75-1.231 2.75-2.75c0-1.252-0.836-2.308-1.981-2.641l-0.019-0.005zM26.5 2.25c-1.795 0-3.25 1.455-3.25 3.25s1.455 3.25 3.25 3.25c1.795 0 3.25-1.455 3.25-3.25v0c-0.002-1.794-1.456-3.248-3.25-3.25h-0zM26.5 7.25c-0.966 0-1.75-0.784-1.75-1.75s0.784-1.75 1.75-1.75c0.966 0 1.75 0.784 1.75 1.75v0c-0.001 0.966-0.784 1.749-1.75 1.75h-0z">
                                            </path>
                                        </g>
                                    </svg>
                                    {{ props.infos.today_weather.temperature }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <p v-if="anyActivePrayer">All prayers for the day have passed.</p> -->
                <div id="TimesToday" class="py-6 flex flex-col sm:flex-row flex-wrap gap-[1%] items-end justify-between">
                    <div class=" rounded-md px-4 py-8 bg-sky-200/20 shadow-md w-[15%]" v-for="(prayer, index) in  infos "
                        :key="index"
                        :class="{ 'rounded-md px-4 py-8 w-[15%]': true, 'rounded-md px-12 py-8 bg-[url(`${bg_image}`)] bg-cover bg-no-repeat bg-center w-[20%] text-white': isUpcomingPrayer(index) }"
                        :style="{ 'background-image': isUpcomingPrayer(index) ? `url(https://www.islamicfinder.org/static/live180/themes/theme20/images/${prayer[0]}.png)` : 'none' }">
                        <span v-if="isUpcomingPrayer(index)" class="block text-xl text-center">{{ 'Upcoming prayer'
                        }}</span>
                        <p>
                            <span class="text-md text-center block capitalize">{{ prayer[0] }} </span>
                            <span class="text-center text-xl block uppercase">{{ prayer[1] }}</span>
                            <span v-if="isUpcomingPrayer(index)" class="countdown">{{ countdown }}</span>
                        </p>
                    </div>
                </div>
                <div class="pt-info">
                    <p class="font-xs font-dark">
                        <span class=" font-bold text-xl">Using</span>
                        {{ ': ' + props.infos.prayer_method_name }}
                    </p>
                </div>
            </div>
        </div>
    </ClientLayout>
</template>
