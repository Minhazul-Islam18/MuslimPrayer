<script setup>
import ClientLayout from '@/Layouts/ClientLayout.vue';

const infos = defineProps({
    infos: Array | Object,
})
console.log(infos.infos);
</script>

<template>
    <ClientLayout>
        <div class="py-12">
            <div class=" bg-white rounded-lg px-7 py-4" id="prayertimes-card">
                <div class="pt-card-header flex flex-col sm:flex-row flex-wrap justify-between">
                    <div class="d-flex flex-column">
                        <h1 class="boxCard-title mb-1 font-extrabold text-3xl pb-1 border-b">
                            Prayer Times in&nbsp;Dhaka</h1>
                        <a href="/world/" class="font-primary font-sm change-loc gtm-pt-chloc text-emerald-500">Wrong
                            Location?</a>
                    </div>
                    <div class="pt-date font-dark font-sm">
                        <p>8&nbsp;December,&nbsp;2023</p>
                        <p class="font-weight-bold pt-date-right">23&nbsp;Jumada Al-Awwal,&nbsp;1445</p>
                    </div>
                </div>
                <div id="TimesToday" class=" flex flex-col sm:flex-row flex-wrap gap-[1%] items-end justify-between">
                    <div
                        class="rounded-md px-12 py-8 bg-[url('https://www.islamicfinder.org/static/live180/themes/theme20/images/fajr.png')] bg-cover bg-no-repeat bg-center w-[20%] text-white">
                        <p>
                            <span class="prayername text-center text-md block">Upcoming Prayer<br>Fajr</span>
                            <span class=" font-extrabold text-4xl block" id="clockdiv">08:21:36</span>
                            <span class="text-center block">05:09 AM</span>
                        </p>
                    </div>
                    <div class=" rounded-md px-4 py-8 bg-gray-200 w-[15%]">
                        <p>
                            <span class="text-md text-center block">Sunrise </span>
                            <span class="text-center text-xl block">06:28 AM</span>
                        </p>
                    </div>
                    <div class=" rounded-md px-4 py-8 bg-gray-200 w-[15%]">
                        <p>
                            <span class="text-md text-center block">Sunrise </span>
                            <span class="text-center text-xl block">06:28 AM</span>
                        </p>
                    </div>
                    <div class=" rounded-md px-4 py-8 bg-gray-200 w-[15%]">
                        <p>
                            <span class="text-md text-center block">Sunrise </span>
                            <span class="text-center text-xl block">06:28 AM</span>
                        </p>
                    </div>
                    <div class=" rounded-md px-4 py-8 bg-gray-200 w-[15%]">
                        <p>
                            <span class="text-md text-center block">Sunrise </span>
                            <span class="text-center text-xl block">06:28 AM</span>
                        </p>
                    </div>
                    <div class=" rounded-md px-4 py-8 bg-gray-200 w-[15%]">
                        <p>
                            <span class="text-md text-center block">Sunrise </span>
                            <span class="text-center text-xl block">06:28 AM</span>
                        </p>
                    </div>
                </div>

                <div class="ptcard-footer">
                    <div class="d-flex pt-more">
                        <div class="pt-info">
                            <p class="font-sm font-dark">University Of Islamic Sciences, Karachi &nbsp;<a
                                    class="font-primary font-sm font-weight-bold underline-hover settingsOpener gtm-pt-settings"
                                    title="Click here to change settings">Change</a> </p>
                            <p class="font-xs font-muted">
                                Fajr&nbsp;18.0&nbsp;degrees,&nbsp;Isha&nbsp;18.0&nbsp;degrees,&nbsp;Hanbali, Maliki, Shafi
                                &nbsp;<span class="glyphter icon-info cal-method-info" data-toggle="modal"
                                    data-target="#cal-method-info"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ClientLayout>
</template>
