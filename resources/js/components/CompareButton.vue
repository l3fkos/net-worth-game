<template>
    <div>
<!--            <div class="image-container">-->
<!--                <img class="rounded-circle" v-bind:src="celeb_1_image" @click="compareCelebs" alt="celeb image">-->
<!--            </div>-->
<!--            <div class="celeb-name">-->
<!--                <strong>{{celeb_1_name}}</strong><br>-->
<!--            </div>-->
<!--            <div class="celeb-occupation">-->
<!--                <h3>{{celeb_1_category}}</h3>-->
<!--            </div>-->
<!--            <div :class="classObject" v-if="showResult">-->
<!--                 <h1 v-html="answer"></h1>-->
<!--            </div>-->

        <div class="row justify-content-center d-inline">

            <div class="celeb-container col-5 text-center hvr-bob  hvr-border-fade">
                <div class="image-container">
                    <img class="rounded-circle" v-bind:src="celeb_1_image" @click="compareCelebs(1)" alt="celeb image">
                </div>
                <div class="celeb-name">
                    <strong>{{celeb_1_name}}</strong><br>
                </div>
                <div class="celeb-occupation">
                    <h3>{{celeb_1_category}}</h3>
                </div>
            </div>

            <div class="celeb-container col-5 text-center hvr-bob  hvr-border-fade ml-5">
                <div class="image-container">
                    <img class="rounded-circle" v-bind:src="celeb_2_image" @click="compareCelebs(2)" alt="celeb image">
                </div>
                <div class="celeb-name">
                    <strong>{{celeb_2_name}}</strong><br>
                </div>
                <div class="celeb-occupation">
                    <h3>{{celeb_2_category}}</h3>
                </div>
            </div>

            <a href="/index">
                <button class="btn btn-dark h-50px ml-5 pl-4 pr-4">
                    Next
                </button>
            </a>
            <div class="row mt-4">
                <div class="col-10 ml-2">
                    <div :class="classObject" v-if="showResult">
                        <p v-html="answer"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

    export default {


        data: function (){
            return {
                showResult: false,
                answer1: '',
                right: false,
                counterRight: 0,
                counterWrong: 0,
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        props: [
                'celeb_1_image',
                'celeb_1_net_worth',
                'celeb_1_name',
                'celeb_1_category',
                'celeb_2_image',
                'celeb_2_net_worth',
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

            compareCelebs(buttonId){
                if(parseInt(this.celeb_1_net_worth, 10) > parseInt(this.celeb_2_net_worth, 10)) {
                    if(buttonId === 1){
                        this.showResult = ! this.showResult;
                        this.answer = "<strong>Correct!</strong> <br>" + this.celeb_1_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>" +
                        "<br>" + this.celeb_2_name + " Net Worth:$"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>";
                        this.right = true;
                    }else if(buttonId === 2) {
                        this.showResult = ! this.showResult;
                        this.answer = "<strong>Wrong!</strong> <br>" + this.celeb_1_name + " Net Worth: $"  + "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>" +
                        "<br>" + this.celeb_2_name + " Net Worth:$"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>";
                        this.right = false;
                    }
                }else if(parseInt(this.celeb_1_net_worth, 10) < parseInt(this.celeb_2_net_worth, 10)){
                    if(buttonId === 2){
                        this.showResult = ! this.showResult;
                        this.answer = "<strong>Correct!</strong> <br>" + this.celeb_2_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) +  "</strong>" +
                        "<br>" + this.celeb_1name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>";
                        this.right = true;
                    }else if(buttonId === 1) {
                        this.showResult = ! this.showResult;
                        this.answer = "<strong>Wrong!</strong> <br>" + this.celeb_2_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>" +
                            "<br>" + this.celeb_1_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>";
                        this.right = false;
                    }
                }else{
                    this.showResult = ! this.showResult;
                    this.answer = "Trick question! Both celebs are equal " + this.numberWithCommas(this.celeb_1_net_worth);
                }
            },

            numberWithCommas: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },

        }
    }

</script>

<style>
    .correct{
        text-align: center;
        font-size: 20pt;
        padding: 10px;
        border: 2px solid green;
        border-radius: 20px;
        color: black;
        background-color: #98dfb6;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .wrong{
        text-align: center;
        font-size: 20pt;
        padding: 10px;
        color: black;
        border: 2px solid red;
        border-radius: 20px;
        background-color: #ff4d4d;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
