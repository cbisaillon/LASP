<template>
    <div>
        <p>{{short}} <span v-if="!showFull">...</span></p>
        <div>
            <button @click="showFull = !showFull" class="btn btn-default d-inline-block">
                <span v-if="!showFull">Read more</span>
                <span v-else>Close</span>
                    </button>
            <a target="_blank" :href="fullUrl" v-if="fullUrl != ''">
                <button class="btn btn-primary d-inline-block">View full paper</button>
            </a>

        </div>

    </div>
</template>

<script>
    export default {
        name: "ShowMore",
        props: {
            text: {
                type: String,
                required: true,
            },
            wordsToShow: {
                type: Number,
                default: 25,
            },
            fullUrl: {
                type: String,
                default: ''
            }
        },
        data: function() {
            return {
                showFull: false,
            }
        },
        computed: {
            short: function(){
                if(this.showFull){
                    return this.text
                } else{
                    return this.text.split(/\s+/).slice(0,this.wordsToShow).join(" ");
                }

            }
        }
    }
</script>

<style scoped>

</style>