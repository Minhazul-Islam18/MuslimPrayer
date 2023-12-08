<script setup>
import ClientLayout from '@/Layouts/ClientLayout.vue';
</script>

<template>
    <ClientLayout>
        <div class="py-12">
            <div class=" bg-white rounded-lg px-7 py-4" id="prayertimes-card">
                <div class="pt-card-header">
                    <div class="d-flex flex-column">
                        <h1 class="boxCard-title mb-1">
                            Prayer Times in&nbsp;Dhaka</h1>
                        <a href="/world/" class="font-primary font-sm change-loc gtm-pt-chloc">Wrong Location?</a>
                    </div>
                    <div class="pt-date font-dark font-sm">
                        <p>8&nbsp;December,&nbsp;2023</p>
                        <p class="font-weight-bold pt-date-right">23&nbsp;Jumada Al-Awwal,&nbsp;1445</p>
                    </div>
                </div>
                <div class="pt-card-tiles d-flex slick-initialized slick-slider" dir="">
                    <div class="slick-list draggable">
                        <div class="slick-track"
                            style="opacity: 1; width: 30000px; transform: translate3d(-10px, 0px, 0px);">
                            <div class="prayerTiles fajar-tile pt-active fajar slick-slide slick-current slick-active"
                                data-slick-index="0" aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername ">Upcoming Prayer<br>Fajr</span><span class="pt-timer"
                                        id="clockdiv">08:21:36</span>
                                    <span class="prayertime">05:09 AM</span><span class="pt-timer" id="clockdiv"></span>
                                </p><a class="btn-refresh" href="./" style="opacity: 0;" tabindex="0"><img alt="refresh"
                                        src="/static/live180/themes/theme20/images/refresh-btn.png"></a>
                            </div>
                            <div class="prayerTiles sunrise-tile slick-slide slick-active" data-slick-index="1"
                                aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername">Sunrise </span>
                                    <span class="prayertime">06:28 AM</span>
                                </p>
                            </div>
                            <div class="prayerTiles dhuhar-tile slick-slide slick-active" data-slick-index="2"
                                aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername">Dhuhr</span>
                                    <span class="prayertime">11:51 AM</span>
                                </p>
                            </div>
                            <div class="prayerTiles asr-tile slick-slide slick-active" data-slick-index="3"
                                aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername">Asr</span>
                                    <span class="prayertime">02:52 PM</span>
                                </p>
                            </div>
                            <div class="prayerTiles maghrib-tile slick-slide slick-active" data-slick-index="4"
                                aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername">Maghrib</span>
                                    <span class="prayertime">05:12 PM</span>
                                </p>
                            </div>
                            <div class="prayerTiles isha-tile slick-slide slick-active" data-slick-index="5"
                                aria-hidden="false" tabindex="0">
                                <p>
                                    <span class="prayername">Isha</span>
                                    <span class="prayertime">06:32 PM</span>
                                </p>
                            </div>
                        </div>
                    </div>





                </div>
                <!-- <script type="text/template" id="timer-template"><span class="pt-timer" id="clockdiv"></span></script>
                <script type="text/template" id="btn-refresh-template">
                    <a class="btn-refresh" href="./"><img alt="refresh" src="/static/live180/themes/theme20/images/refresh-btn.png"></img></a>
                </script> -->

                <div class="ptcard-footer">
                    <div class="d-flex pt-more">
                        <div class="pt-info">
                            <!-- Static CityId for London = 2643743 -->
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
