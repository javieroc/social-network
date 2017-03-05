<template>
    <div>
        <button class="btn btn-xs btn-info" v-if="!auth_user_likes_post" @click="like">
            <i class="glyphicon glyphicon-thumbs-up"></i> Like
        </button>
        <button class="btn btn-xs btn-info" v-else @click="unlike">
            <i class="glyphicon glyphicon-thumbs-down"></i> Unlike
        </button>
        <hr>
        <div class="vtooltip">
            <span :id="tooltip_id"><li class="glyphicon glyphicon-thumbs-up"></li> {{ post.likes.length }}</span>
            <span class="tooltiptext" v-for="like in post.likes">
                <h5>{{ like.user.name }}</h5>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        props: ['id'],
        methods: {
            like() {
                axios.get(`/like/${this.id}`)
                    .then(resp => {
                        this.$store.commit('like_post', {
                            post_id: this.id,
                            like: resp.data
                        })
                        noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: 'You successfully liked the post!.'
                        })
                    })
            },
            unlike() {
                axios.get(`/unlike/${this.id}`)
                    .then(resp => {
                        this.$store.commit('unlike_post', {
                            post_id: this.id,
                            like_id: resp.data
                        })
                        noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: 'You successfully unliked the post!.'
                        })
                    })
            }
        },
        computed: {
            post() {
                return this.$store.state.posts.find( post => {
                    return post.id === this.id
                })
            },
            likers() {
                let likers = []

                this.post.likes.forEach( like => {
                    likers.push(like.user)
                })

                return likers;
            },
            likers_ids() {
                return this.likers.map( like => {
                    return like.id
                })
            },
            auth_user_likes_post() {
                let check_index = this.likers_ids.indexOf(this.$store.state.auth_user.id)

                if (check_index === -1) {
                    return false
                }
                else {
                    return true
                }
            },
            tooltip_id() {
                return 'tooltip-' + this.id
            }
        }
    }
</script>

<style>
 /* Tooltip container */
.vtooltip {
    position: relative;
    display: inline-block;
}

/* Tooltip text */
.vtooltip .tooltiptext {
    visibility: hidden;
    width: 200px;
    background-color: #555;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 2px;

    /* Position the tooltip text */
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;

    /* Fade in tooltip */
    opacity: 0;
    transition: opacity 1s;
}

/* Tooltip arrow */
.vtooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 25%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Show the tooltip text when you mouse over the tooltip container */
.vtooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>
