<template>
    <div>
        <div class="clickable" v-for="(post, index) in posts" @click="showPost(post.id)">
            <div class="post_metadata">
                <div>
                    <h3 class="d-inline">{{post.title}}</h3>
                    <star-system :number-of-stars="3"></star-system>
                </div>
                <div class="text-right">
                    <p>Posted on {{post.created_at}}</p>
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
                        console.log(response);
                        self.posts = response.data;
                    })
                    .catch(function(error){
                        console.log(error);
                    })
            },
            showPost(post_id){
                window.location = this.showEndpoint.replace(':post_id', post_id);
            }
        },
        mounted() {
            this.retrievePosts();
        }
    }
</script>

<style scoped>

</style>