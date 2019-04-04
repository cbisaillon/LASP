<template>
    <div @click="addLike()" :class="{clickable : this.editable}" class="d-inline-block like-box">
        <p>
            <i v-if="clicked" class="fas fa-thumbs-up thumbs-up"></i>
            <i v-else class="far fa-thumbs-up thumbs-up"></i>

            <span>{{nb}}</span>
        </p>
    </div>
</template>

<script>
    export default {
        name: "LikeBox",
        props:{
            nbProp: {
                type: Number,
                required: true,
            },
            liked: {
                type: Boolean,
                default: false,
            },
            editable: {
                type: Boolean,
                default: true,
            },
            likeEndpoint:{
                type: String,
                required: false,
            },
            postId: {
                type: Number,
                required: false,
            }
        },
        data() {
            return {
                clicked: false,
                nb: 0,

            }
        },
        methods:{
            addLike(){
                if(this.editable && !this.clicked){
                    this.clicked = true
                    this.nb++;

                    //Like the post
                    axios.post(this.likeEndpoint)
                        .then(function(response){
                            console.log(response);
                        })
                        .catch(function(error){
                            console.log(error);
                        })
                }
            }
        },
        mounted() {
            this.nb = this.nbProp;
            if(this.liked){
                this.clicked = true;
            }
        }
    }
</script>

<style scoped>

</style>