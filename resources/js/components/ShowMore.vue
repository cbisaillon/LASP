<template>
    <div>
        <p>{{short}} <span v-if="!showFull">...</span></p>
        <div class="mx-auto w-fit">
            <button @click="showFull = !showFull" class="btn btn-default">
                <span v-if="!showFull">Read more</span>
                <span v-else>Close</span>
                    </button>
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