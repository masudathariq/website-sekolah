@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-2xl sm:text-4xl font-bold mb-4 text-center text-gray-900 dark:text-gray-100">Kalender Akademik</h1>
    <h3 class="text-lg sm:text-2xl font-semibold mb-6 text-center text-gray-700 dark:text-gray-300">MTs Muhammadiyah 1 Natar</h3>

    <div 
        x-data="calendar()" 
        x-init="init()" 
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-4 sm:p-6 transform transition-all duration-300"
    >
        <!-- Header: Bulan dan Navigasi -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
            <button 
                @click="prevMonth" 
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 transform hover:scale-105 w-full sm:w-auto text-sm sm:text-base"
            >
                < Sebelumnya
            </button>
            <h2 class="text-lg sm:text-2xl font-semibold text-center text-gray-900 dark:text-gray-100" x-text="monthYear"></h2>
            <button 
                @click="nextMonth" 
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 transform hover:scale-105 w-full sm:w-auto text-sm sm:text-base"
            >
                Selanjutnya >
            </button>
        </div>

        <!-- Nama Hari -->
        <div class="grid grid-cols-7 text-center font-semibold text-gray-600 dark:text-gray-300 text-xs sm:text-sm mb-3">
            <div>Minggu</div>
            <div>Senin</div>
            <div>Selasa</div>
            <div>Rabu</div>
            <div>Kamis</div>
            <div>Jumat</div>
            <div>Sabtu</div>
        </div>

        <!-- Kalender -->
        <div class="grid grid-cols-7 gap-1 sm:gap-2 text-center text-xs sm:text-sm">
            <template x-for="day in days" :key="day.date">
                <div 
                    class="p-2 sm:p-3 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer min-h-[50px] sm:min-h-[90px] flex flex-col justify-start items-center bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200"
                    :class="{
                        'bg-green-100 dark:bg-green-900': day.isToday,
                        'text-gray-400 dark:text-gray-500': !day.inCurrentMonth,
                        'border-green-500 dark:border-green-400': day.hasEvent
                    }"
                    @click="selectDay(day)"
                    role="button"
                    :aria-label="day.date.toLocaleDateString('id-ID') + (day.hasEvent ? ' - ' + day.eventTitle : '')"
                >
                    <!-- Angka Tanggal -->
                    <div x-text="day.date.getDate()" class="font-semibold text-gray-900 dark:text-gray-100 text-xs sm:text-base"></div>

                    <!-- Judul Event -->
                    <template x-if="day.hasEvent">
                        <div class="mt-1 text-[10px] sm:text-xs text-green-700 dark:text-green-300 font-medium text-center break-words line-clamp-2" x-text="day.eventTitle"></div>
                    </template>
                </div>
            </template>
        </div>

        <!-- Detail Event -->
        <div 
            x-show="selectedEvent" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="mt-6 p-4 sm:p-6 border border-gray-200 dark:border-gray-700 rounded-xl bg-green-50 dark:bg-green-900/50 text-gray-900 dark:text-gray-100 text-sm sm:text-base"
        >
            <h3 class="text-base sm:text-lg font-bold mb-3" x-text="selectedEvent.judul"></h3>
            <p class="mb-2"><strong>Tanggal:</strong> <span x-text="selectedEvent.tanggal"></span></p>
            <p class="mt-2 whitespace-pre-line" x-text="selectedEvent.isi"></p>
        </div>
    </div>
</div>

<!-- Alpine.js Script -->
<script>
function calendar() {
    return {
        today: new Date(),
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),
        days: [],
        selectedEvent: null,
        events: @json($eventsJson),
        monthYear: '',

        init() {
            this.generateCalendar();
        },

        generateCalendar() {
            this.days = [];
            let firstDay = new Date(this.currentYear, this.currentMonth, 1);
            let lastDay = new Date(this.currentYear, this.currentMonth + 1, 0);

            this.monthYear = firstDay.toLocaleString('id-ID', { month: 'long', year: 'numeric' });

            let startDay = firstDay.getDay(); 
            let totalDays = lastDay.getDate();

            let totalBoxes = Math.ceil((startDay + totalDays) / 7) * 7; // Ensure full rows
            let prevMonthLastDate = new Date(this.currentYear, this.currentMonth, 0).getDate();

            for(let i = 0; i < totalBoxes; i++) {
                let dayObj = {
                    date: null,
                    inCurrentMonth: false,
                    isToday: false,
                    hasEvent: false,
                    eventTitle: '',
                };

                if(i < startDay) {
                    let dateNum = prevMonthLastDate - startDay + i + 1;
                    dayObj.date = new Date(this.currentYear, this.currentMonth - 1, dateNum);
                } else if(i >= startDay && i < startDay + totalDays) {
                    let dateNum = i - startDay + 1;
                    dayObj.date = new Date(this.currentYear, this.currentMonth, dateNum);
                    dayObj.inCurrentMonth = true;

                    let dateStr = dayObj.date.toISOString().slice(0,10);
                    let event = this.events.find(e => e.tanggal === dateStr);
                    if(event) {
                        dayObj.hasEvent = true;
                        dayObj.eventTitle = event.judul;
                    }

                    let todayStr = this.today.toISOString().slice(0,10);
                    if(dateStr === todayStr) {
                        dayObj.isToday = true;
                    }
                } else {
                    let dateNum = i - (startDay + totalDays) + 1;
                    dayObj.date = new Date(this.currentYear, this.currentMonth + 1, dateNum);
                }

                this.days.push(dayObj);
            }
        },

        prevMonth() {
            if(this.currentMonth === 0) {
                this.currentMonth = 11;
                this.currentYear--;
            } else {
                this.currentMonth--;
            }
            this.selectedEvent = null;
            this.generateCalendar();
        },

        nextMonth() {
            if(this.currentMonth === 11) {
                this.currentMonth = 0;
                this.currentYear++;
            } else {
                this.currentMonth++;
            }
            this.selectedEvent = null;
            this.generateCalendar();
        },

        selectDay(day) {
            if(day.hasEvent) {
                let event = this.events.find(e => e.tanggal === day.date.toISOString().slice(0,10));
                if(event) {
                    this.selectedEvent = event;
                }
            } else {
                this.selectedEvent = null;
            }
        }
    }
}
</script>
@endsection