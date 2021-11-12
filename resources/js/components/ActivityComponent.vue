<template>
    <div :id="id" class="flex flex-row justify-start pl-2 py-0.5">
        <div class="pr-4">
            <slot></slot>
        </div>
        <div>{{ name }}</div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //
        },

        updated() {
            const current = this.currentTime.getTime();
            const now = new Date();
            const dateString = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
            const start = new Date(dateString + 'T' + this.start).getTime();
            const end = new Date(dateString + 'T' + this.end).getTime();
            const week = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

            // if we're looking at the right day
            if(week[this.currentTime.getDay()] == this.day) {
                // check time
                if(start <= current && current <= end) {
                    $("#" + this.id).addClass('text-yellow-300');
                } else if(current > end) {
                    $("#" + this.id).addClass('text-gray-700');
                } else {
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
