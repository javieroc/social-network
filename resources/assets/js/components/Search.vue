<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="input-group">
                <input type="text" class="input-lg form-control" placeholder="Search friends" v-model="query" @keyup.enter="search">
                <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
            </div>
            <ul class="list-group" v-if="results.length">
                <li class="list-group-item" v-for="user in results">
                    <a :href="'/profile/'+user.slug">
                        <img :src="user.avatar" alt="" width="30" height="30" class="image-user-found">
                        <h5 class="name-user-found">{{ user.name }}</h5>
                    </a>
                </li>
            </ul>
            <br>
        </div>
    </div>
</template>

<script>
    import algoliasearch from 'algoliasearch'

    const client = algoliasearch('5S36NRR66M', 'bdd7a746868b27b0d86d49799b68d220');

    const index = client.initIndex('users');

    export default {
        mounted() {
        },
        data() {
            return {
                query: '',
                results: []
            }
        },
        methods: {
            search() {
                if (this.query) {
                    index.search(this.query, (err, content) => {
                        this.results = content.hits
                    })
                }
                else {
                    this.results = []
                }
            }
        }
    }
</script>

<style>
    .image-user-found {
        border-radius: 50%;
    }

    .name-user-found {
        display: inline-block;
    }
</style>
