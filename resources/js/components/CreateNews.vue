<template>
    <div>
        <h3 class="text-center">Create News</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addNews">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="news.title">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="news.content">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                news: {}
            }
        },
        methods: {
            addNews() {
                this.axios
                    .post('http://localhost:8000/api/news', this.news)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>