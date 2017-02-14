<template>
    <div>
        
    </div>
</template>

<script>
    export default {
        mounted() {
            this.listen()
        },
        props: ['id'],
        methods: {
            listen(){
                Echo.private(`App.User.${this.id}`)
                    .notification((notification) => {
                        console.log(notification)
                    })
            }
        }
    }
</script>