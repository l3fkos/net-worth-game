<template>
    <div>

        <div class="row justify-content-between" style="margin-bottom: 250px;">
            <div class="counter col-md-2">{{counter}} / 10</div>
            <div class="rightAnswers col-md-2 offset-md-5"> Right Answers <br>{{rightAnswers}} </div>
            <div class="wrongAnswers col-md-2"> Wrong Answers <br>{{wrongAnswers}} </div>

        </div>
        <div class="row" style="margin-bottom: 150px; margin-top: -200px;">
            <div class="col-md-10 ml-2">
                <div :class="classObject" v-if="showResult">
                    <p v-html="answer"></p>
                    <p @click="clickNext" class="btn btn-success">
                        Next
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center d-inline">
            <div id="celeb-1" class="celeb-container col-md-5 text-center hvr-bob hvr-border-fade" @click="compareCelebs(1)">
                <div class="image-container">
                    <img class="rounded-circle" v-bind:src="celeb_1_image"  alt="celeb image">
                </div>
                <div class="celeb-name">
                    <strong>{{celeb_1_name}}</strong><br>
                </div>
                <div class="celeb-occupation">
                    <h3>{{celeb_1_category}}</h3>
                </div>
            </div>
            <div id="celeb-2" class="celeb-container col-md-5 text-center hvr-bob  hvr-border-fade" @click="compareCelebs(2)">
                <div class="image-container">
                    <img class="rounded-circle" v-bind:src="celeb_2_image"  alt="celeb image">
                </div>
                <div class="celeb-name">
                    <strong>{{celeb_2_name}}</strong><br>
                </div>
                <div class="celeb-occupation">
                    <h3>{{celeb_2_category}}</h3>
                </div>
            </div>
        </div>

        <transition name="modal" v-if="showModal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <div class="modal-body">
                            <slot name="body" >
                                <div v-text="modalText"></div>
                            </slot>
                        </div>
                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button" @click="closeModal">
                                    OK
                                </button>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>

</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.');
            if(localStorage.counter > 10){
                localStorage.counter = 1;
                localStorage.rightAnswers = 0;
                localStorage.wrongAnswers = 0;
            }
            if(localStorage.counter){
                this.counter = localStorage.counter;
            }
            if(localStorage.rightAnswers){
                this.rightAnswers = localStorage.rightAnswers;
            }
            if(localStorage.wrongAnswers){
                this.wrongAnswers = localStorage.wrongAnswers;
            }
        },

        watch:{
            counter(newCounter){
                localStorage.counter = newCounter;
            },
            rightAnswers(newRightAnswers){
                localStorage.rightAnswers = newRightAnswers;
            },
            wrongAnswers(newWrongAnswers){
                localStorage.wrongAnswers = newWrongAnswers;
            }
        },

        data: function (){
            return {
                showResult: false,
                answer1: '',
                right: false,
                counterRight: 0,
                counterWrong: 0,
                counter: 1,
                rightAnswers: 0,
                wrongAnswers: 0,
                clicked: false,
                showModal: false,
                modalText: '',
                trick: false,
            }
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
                    'neutral': this.right === null,
                }
            }
        },

        methods:{

            compareCelebs(buttonId){
                if(parseInt(this.celeb_1_net_worth, 10) > parseInt(this.celeb_2_net_worth, 10)) {
                    if(buttonId === 1){
                        this.showResult = true;
                        this.answer = "<strong>Correct!</strong> <br>" + this.celeb_1_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>" +
                        "<br>" + this.celeb_2_name + " Net Worth:$"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>";
                        this.right = true;
                        console.log(this.counter + " " +   this.rightAnswers + " " + this.wrongAnswers );
                        if(this.clicked === false){
                            this.clicked = true;
                        }
                        if(this.counter == 10 && this.rightAnswers >= 6){
                            this.modalText = "Congratulations! You know how much money people who have more money than you have YAY!";
                            this.showModal = true;
                        }else if(this.counter == 10 && this.rightAnswers >= 6){
                            this.modalText = "Sorry bruh! You dont know which rich people are richer than other rich people.";
                            this.showModal = true;
                        }
                    }else if(buttonId === 2) {
                        this.showResult = true;
                        this.answer = "<strong>Wrong!</strong> <br>" + this.celeb_1_name + " Net Worth: $"  + "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>" +
                        "<br>" + this.celeb_2_name + " Net Worth:$"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>";
                        this.right = false;
                        console.log(this.counter + " " +   this.rightAnswers + " " + this.wrongAnswers );
                        if(this.clicked === false){
                            this.clicked = true;
                        }
                        if(this.counter == 10 && this.rightAnswers <= 6){
                            this.modalText = "Sorry bruh! You dont know which rich people are richer than other rich people.";
                            this.showModal = true;
                        }else if(this.counter == 10 && this.rightAnswers >= 6){
                            this.modalText = "Congratulations! You know how much money people who have more money than you have YAY!";
                            this.showModal = true;
                        }
                    }
                }else if(parseInt(this.celeb_1_net_worth, 10) < parseInt(this.celeb_2_net_worth, 10)){
                    if(buttonId === 2){
                        this.showResult = true;
                        this.answer = "<strong>Correct!</strong> <br>" + this.celeb_2_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) +  "</strong>" +
                        "<br>" + this.celeb_1_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>";
                        this.right = true;
                        console.log(this.counter + " " +   this.rightAnswers + " " + this.wrongAnswers );
                        if(this.clicked === false){
                            this.clicked = true;
                        }
                        if(this.counter == 10 && this.rightAnswers >= 6){
                            this.modalText = "Congratulations! You know how much money people who have more money than you have YAY!";
                            this.showModal = true;
                        }else if(this.counter == 10 && this.rightAnswers <= 6){
                            this.modalText = "Sorry bruh! You dont know which rich people are richer than other rich people.";
                            this.showModal = true;
                        }
                    }else if(buttonId === 1) {
                        this.showResult = true;
                        this.answer = "<strong>Wrong!</strong> <br>" + this.celeb_2_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_2_net_worth) + "</strong>" +
                            "<br>" + this.celeb_1_name + " Net Worth: $"  +  "<strong>" + this.numberWithCommas(this.celeb_1_net_worth) + "</strong>";
                        this.right = false;
                        console.log(this.counter + " " +   this.rightAnswers + " " + this.wrongAnswers );
                        if(this.clicked === false){
                            this.clicked = true;
                        }

                        if(this.counter == 10 && this.rightAnswers <= 6){
                            this.modalText = "Sorry bruh! You dont know which rich people are richer than other rich people.";
                            this.showModal = true;
                        }else if(this.counter == 10 && this.rightAnswers >= 6){
                            this.modalText = "Congratulations! You know how much money people who have more money than you have YAY!";
                            this.showModal = true;
                        }
                    }
                }else{
                    this.showResult = ! this.showResult;
                    this.answer = "Trick question! Both celebs are equal " + this.numberWithCommas(this.celeb_1_net_worth);
                    this.trick = true;
                    this.clicked = true;
                    this.right = null;
                }
            },
            //add commas to net worth number
            numberWithCommas: function(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },

            clickNext: function(){
                if(this.clicked){
                    if(!this.trick) {
                        this.counter++;
                    }
                    if(this.right === true){
                        this.rightAnswers++
                    }else if(this.right === false){
                        this.wrongAnswers++;
                    }
                    location.reload();
                }else{
                    alert("Make a selection");
                }
            },

            closeModal: function(){
                this.showModal = false;
            }

        }
    }

</script>

<style>
    .counter{
        font-size: 1.6rem;
    }

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

    .neutral{
        text-align: center;
        font-size: 20pt;
        padding: 10px;
        color: black;
        border: 2px solid red;
        border-radius: 20px;
        background-color: lightgray;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .rightAnswers{
        font-size: 16pt;
        text-align: center;
        color: black;
        background-color: #98dfb6;
        padding: 6px;
        border: 2px solid black;
        border-radius: 20px;
    }

    .wrongAnswers{
        font-size: 16pt;
        text-align: center;
        padding: 6px;
        color: black;
        border: 2px solid black;
        border-radius: 20px;
        background-color: #ff4d4d;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

</style>
