<template>
    <div>
        <img class="rounded-circle" v-bind:src="celeb_2_image" @click="compareCelebs" alt="celeb image">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['celeb_2_image',
            'celeb_2_net_worth',
            'celeb_1_net_worth',
        ],

        methods:{
            compareCelebs(){
                if(this.celeb_2_net_worth > this.celeb_1_net_worth) {
                    alert('Correct! Celeb 2 is richer than celeb 1 celeb 1: ' + this.celeb_1_net_worth + ' celeb 2: ' + this.celeb_2_net_worth );
                }else if(this.celeb_1_net_worth > this.celeb_2_net_worth){
                    alert('Wrong! Celeb 1 is richer than celeb 2 celeb 1: ' + this.celeb_1_net_worth + ' celeb 2: ' + this.celeb_2_net_worth);
                }else if(this.celeb_2_net_worth === this.celeb_1_net_worth){
                    alert('Trick question! They have the same net worth.. celeb 1 ' + this.celeb_1_net_worth + ' celeb 2: ' + this.celeb_2_net_worth);
                }
            }
        },

    }
</script>
