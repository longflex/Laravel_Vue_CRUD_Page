<template>
    <div>
        <h2 class="text-center">News List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created_at</th>
                <th>Updated_at</th>
  <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="news in newses.data" :key="news.id">
                <td>{{ news.id }}</td>
                <td>{{ news.title }}</td>
                <td>{{ news.content }}</td>
                <td>{{ news.created_at }}</td>
                <td>{{ news.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link
                         :to="{name: 'edit', params: { id: news.id }}"
                          class="btn btn-success"
                        >Edit</router-link>
                        <button class="btn btn-danger" @click="deleteNews(news.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
            <pagination :data="newses" @pagination-change-page="getResults"></pagination>
        </table>
        <!-- <table-component
            table-class="table"
            :data="newses.data"
            sort-by="name"
            sort-order="asc"
            >
            <table-column show="id" label="First name" :filterable="false"></table-column>
            <table-column show="name" label="Songs" data-type="numeric"></table-column>
            <table-column show="detail" label="Birthday"  data-type="date:DD/MM/YYYY"></table-column>
             <table-column label="My custom column" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <div class="btn-group" role="group">
                        <router-link
                         :to="{name: 'edit', params: { id: row.id }}"
                          class="btn btn-success"
                        >Edit</router-link>
                        <button class="btn btn-danger" @click="deleteNews(row.id)">Delete</button>
                    </div>
                    {{ row.name }} wrote {{ row.detail }} songs.
                </template>
            </table-column>
        </table-component>
<pagination :data="newses" @pagination-change-page="getResults"></pagination> -->
    </div>
    
</template>
 
<script>
var aPage;
    export default {
        
        data() {
            return {
                
                newses: []
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            deleteNews(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/news/${id}`)
                    .then(response => {
                        let i = this.newses.data.map(data => data.id).indexOf(id);
                        this.newses.data.splice(i, 1);
                        this.getResults(this.aPage);
                    });
            },
            getResults(page) {
                if (typeof page === "undefined") {
                    page = 1;
                }
                this.axios
                    .get("http://localhost:8000/api/news?page=" + page)
                    .then(response => {
                        this.newses = response.data;
                        
                        console.log(this.newses);
                    });
                this.aPage = page;
console.log("this.newses-------------------------"+this.aPage);
            }
        }
    }
</script>