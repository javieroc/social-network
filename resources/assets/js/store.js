import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        nots: [],
        posts: [],
        auth_user: {}
    },
    getters: {
        all_notifications(state) {
            return state.nots
        },
        all_notifications_count(state) {
            return state.nots.length
        },
        all_posts(state) {
            return state.posts
        }
    },
    mutations: {
        add_notification(state, notification) {
            state.nots.push(notification)
        },
        add_post(state, post) {
            state.posts.push(post)
        },
        auth_user_data(state, user) {
            state.auth_user = user
        }
    }
})
