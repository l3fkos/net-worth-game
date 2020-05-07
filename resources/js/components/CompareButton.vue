<template>
    <div>
        <img class="rounded-circle" v-bind:src="celeb_1_image" @click="compareCelebs" alt="celeb image">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['celeb_1_image',
                'celeb_1_net_worth',
                'celeb_2_net_worth',
        ],

        methods:{
            compareCelebs(){
                if(parseInt(this.celeb_1_net_worth, 10) > parseInt(this.celeb_2_net_worth, 10)) {
                    alert('Correct! Celeb 1 is richer than celeb 2 celeb 1: '+ parseInt(this.celeb_1_net_worth, 10) + ' celeb 2: ' + parseInt(this.celeb_2_net_worth, 10));
                }else if(parseInt(this.celeb_1_net_worth, 10) < parseInt(this.celeb_2_net_worth, 10)){
                    alert('Wrong! Celeb 2 is richer than celeb 1 celeb 1: ' + parseInt(this.celeb_1_net_worth, 10) + ' celeb 2: ' + parseInt(this.celeb_2_net_worth, 10));
                }else{
                    alert('Trick question! They have the same net worth.. celeb 1 ' + parseInt(this.celeb_1_net_worth, 10) + ' celeb 2: ' + parseInt(this.celeb_2_net_worth, 10));
                }
                location.reload();
            }
        },
    }
</script>
