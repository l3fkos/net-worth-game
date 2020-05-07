<template>
    <p v-if="winner">ohhh herrrrroooO!!!!!!</p>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: [
            'celeb_1_net_worth',
            'celeb_2_net_worth',
        ],

        data: function(){
            return {
                winner: false,
            }
        },

        methods:{
        },
    }
</script>
