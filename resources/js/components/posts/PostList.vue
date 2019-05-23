<template>
    <div>
        <div class="clickable" v-for="(post, index) in posts" @click="showPost(post.id)">
            <div class="post_metadata">
                <div>
                    <h3 class="d-inline post_title">{{post.title}}</h3>
                    <like-box :editable="false"
                              :nb-prop="post.nb_likes"
                              :liked="post.liked"
                              ></like-box>

                    <p class="nb-likes d-inline-block">
                        <i class="far fa-comments"></i>
                        {{post.nb_comments}}
                    </p>
                </div>
                <div class="text-right">
                    <p class="post_creation_date">Posted on {{post.created_at}}</p>
                    <p>By {{post.user.name}}</p>
                </div>
            </div>
            <div>
                <p>{{post.description}}</p>
            </div>
            <hr/>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostList",
        props: {
            endPoint: {
                type: String,
                required: true
            },
            showEndpoint: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                posts: []
            }
        },
        methods: {
            retrievePosts(){
                let self = this;
                axios.get(this.endPoint)
                    .then(function(response){
                        self.posts = response.data.data;
                    })
                    .catch(function(error){
                        console.log(error);
                    })
            },
            showPost(post_id){
                window.location = this.showEndpoint.replace(':post_id', post_id);
            },
            makeLikeEndPoint(post){
                return this.showEndpoint.replace(':post_id', post.id) + "/like"
            }
        },
        mounted() {
            this.retrievePosts();
        }
    }
</script>

<style scoped>

</style>