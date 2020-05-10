<template>
    <div>
            <div class="image-container">
                <img class="rounded-circle" v-bind:src="celeb_2_image" @click="compareCelebs" alt="celeb image" >
            </div>
            <div class="celeb-name">
                <strong>{{celeb_2_name}}</strong><br>
            </div>
            <div class="celeb-occupation">
                <h3>{{celeb_2_category}}</h3>
            </div>
        <div :class="classObject" v-if="showResult">
            <h1  v-html="answer"></h1>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data: function (){
            return {
                showResult: false,
                answer: '',
                right: false,
            }
        },

        props: [
            'celeb_2_image',
            'celeb_2_net_worth',
            'celeb_1_net_worth',
            'celeb_2_name',
            'celeb_2_category',
        ],

        computed:{
            classObject: function() {
                return {
                    'correct': this.right,
                    'wrong': this.right === false,
                }
            }
        },

        methods:{
            compareCelebs(){
                if(parseInt(this.celeb_2_net_worth, 10) > parseInt(this.celeb_1_net_worth, 10)) {
                    this.showResult = ! this.showResult;
                    this.answer = "Correct! <br> Net Worth:<br>$"  +  this.numberWithCommas(this.celeb_2_net_worth);
                    this.right = true;
                }else if(parseInt(this.celeb_2_net_worth, 10) < parseInt(this.celeb_1_net_worth, 10)){
                    this.showResult = ! this.showResult;
                    this.answer = "Wrong! <br> Net Worth:<br>$" + this.numberWithCommas(this.celeb_2_net_worth);
                    this.right = false;
                }else{
                    alert('Trick question! They have the same net worth.. celeb 1 ' + this.celeb_1_net_worth + ' celeb 2: ' + this.celeb_2_net_worth);
                }
            },

            numberWithCommas: function(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },

        },

    }
</script>

<style>
    /*.correct{*/
    /*    border: 2px solid green;*/
    /*    border-radius: 20px;*/
    /*    color: green;*/
    /*    background-color: #98dfb6;*/
    /*    margin-top: 10px;*/
    /*    margin-bottom: 10px;*/
    /*}*/

    /*.wrong{*/
    /*    color: white;*/
    /*    border: 2px solid red;*/
    /*    border-radius: 20px;*/
    /*    background-color: #ff4d4d;*/
    /*    margin-top: 10px;*/
    /*    margin-bottom: 10px;*/
    /*}*/
</style>
