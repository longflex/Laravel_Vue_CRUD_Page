<template>
    <div>
        <h3 class="text-center">Edit News</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateNews">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="news.title">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="news.content">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/news/${this.$route.params.id}`)
                .then((res) => {
                    this.news = res.data;
                });
        },
        methods: {
            updateNews() {
                this.axios
                    .patch(`http://localhost:8000/api/news/${this.$route.params.id}`, this.news)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>