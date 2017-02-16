<template>
    <li>
        <a href="/notifications">
            Unread Notifications
            <span class="badge">{{ all_notifications_count }}</span>
        </a>
    </li>
</template>

<script>
    export default {
        mounted() {
            this.get_unread()
        },
        methods: {
            get_unread(){
                axios.get('/get_unread')
                    .then(notifications => {
                        notifications.data.forEach(notification => {
                            this.$store.commit('add_notification', notification)
                        })
                    })
            }
        },
        computed: {
            all_notifications_count(){
                return this.$store.getters.all_notifications_count
            }
        }
    }
</script>