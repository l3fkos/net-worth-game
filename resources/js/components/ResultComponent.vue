<template>
    <div class="image-container">
        <h5>Result</h5>
    </div>
</template>

<script>
    import CompareButton from "./CompareButton";
    import CompareButton2 from "./CompareButton2";

    export default {
        name: "ResultComponent",

        mounted() {
            console.log('Component mounted.')
        },

        components: {
            CompareButton,
            CompareButton2,
        },

        props: [
            'celeb_1_net_worth',
            'celeb_2_net_worth',
        ],

        data: function (){
            return {
                shows: false,
            }
        },

        methods: {
                showResult: function(buttonId){
                    alert('signal emitted from button ' + buttonId);
            }
        },

    }
</script>
