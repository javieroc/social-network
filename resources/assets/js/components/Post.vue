<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea rows="5" class="form-control" placeholder="What do you think?" v-model="content"></textarea>
                    <br>
                    <button class="btn btn-success pull-right" :disabled="not_working" @click="create_post">Create a post</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){

        },
        data(){
            return {
                content: '',
                not_working: true
            }
        },
        methods: {
            create_post(){
                axios.post('/posts/create', { content: this.content })
                    .then(resp => {
                        this.content = ''
                        noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: 'Your post has been published!'
                        })
                        console.log(resp)
                    })
            }
        },
        watch: {
            content(){
                this.not_working = this.content.length > 0 ? false : true
            }
        }
    }
</script>
