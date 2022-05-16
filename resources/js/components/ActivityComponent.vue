<template>
    <div :id="id" class="flex flex-row justify-start pl-2 py-0.5">
        <div class="pr-4">
            <slot></slot>
        </div>
        <div>{{ name }}</div>
    </div>
</template>

<script>
    /**
     * Get two-digit month num
     * Date.getDate() returns 0-11 (month index)
     * For the date-time functions to work, we need Jan => 01, Feb => 02, etc.
     * This will turn the month index into a proper date string
     * 
     * @param Date date
     * 
     * @returns string
     */
    function getTwoDigitMonth(date)
    {
        const month = date.getMonth() + 1;

        if(month < 10) {
            return "0" + month;
        }

        return month;
    }

    export default {
        mounted() {
            //
        },

        updated() {
            let current = this.currentTime.getTime();
            const now = new Date();
            const dateString = now.getFullYear() + '-' + (getTwoDigitMonth(now)) + '-' + now.getDate();
            const start = new Date(dateString + 'T' + this.start).getTime();
            const end = new Date(dateString + 'T' + this.end).getTime();
            const week = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

            // if we're looking at the right day
            if(week[this.currentTime.getDay()] == this.day) {
                // check time
                if(start <= current && current < end) {
                    $("#" + this.id).addClass('text-yellow-300');
                    $("#" + this.id).removeClass('text-gray-700');
                    $("#" + this.id).removeClass('text-white');
                } else if(current >= end) {
                    $("#" + this.id).removeClass('text-yellow-300');
                    $("#" + this.id).addClass('text-gray-700');
                    $("#" + this.id).removeClass('text-white');
                } else {
                    $("#" + this.id).removeClass('text-yellow-300');
                    $("#" + this.id).removeClass('text-gray-700');
                    $("#" + this.id).addClass('text-white');
                }
            }
        },

        props: {
            id: String,
            name: String,
            icon: String,
            currentTime: Date|String,
            day: String,
            start: String,
            end: String
        }
    }
</script>
