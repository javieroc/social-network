<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" v-for="post in posts">
                <div class="panel-heading">
                    <img :src="post.user.avatar" width="40px" height="40px" alt="" class="avatar-feed">
                    &nbsp;
                    {{ post.user.name }}
                    <span class="pull-right">
                        {{ post.created_at }}
                    </span>
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        {{ post.content }}
                    </p>

                    <Like :id="post.id"></Like>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Like from './Like.vue'

    export default {
        mounted() {
            this.get_feed()
        },
        components: {
            Like
        },
        props: [],
        data() {
            return {

            }
        },
        methods: {
            get_feed() {
                axios.get('/feed')
                    .then(resp => {
                        resp.data.forEach(post => {
                            this.$store.commit('add_post', post)
                        })
                        console.log(resp)
                    })
            }
        },
        computed: {
            posts() {
                return this.$store.getters.all_posts
            }
        }
    }
</script>

<style>
    .avatar-feed{
        border-radius: 50%;
    }
</style>
