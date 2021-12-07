<template>
    <div>
        <h2 class="text-center">News List</h2>
 
        <!-- <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products.data" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link
                         :to="{name: 'edit', params: { id: product.id }}"
                          class="btn btn-success"
                        >Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
            <pagination :data="products" @pagination-change-page="getResults"></pagination>
        </table> -->
        <table-component
            table-class="table"
            :data="products.data"
            sort-by="name"
            sort-order="asc"
            >
            <table-column show="id" label="No" :filterable="false"></table-column>
            <table-column show="title" label="Title" data-type="numeric"></table-column>
            <table-column show="content" label="Content"  ></table-column>
            <table-column show="is_published" label="Is_published"  data-type=""></table-column>
            <table-column show="created_at" label="Create date" data-type="date:DD/MM/YYYY"></table-column>
            <table-column show="updated_at" label="Update date"  data-type="date:DD/MM/YYYY"></table-column>
             <table-column label="Edit" :sortable="false" :filterable="false">
                <template slot-scope="row">
                    <div class="btn-group" role="group">
                        <router-link
                         :to="{name: 'edit', params: { id: row.id }}"
                          class="btn btn-success"
                        >Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(row.id)">Delete</button>
                    </div>
                    <!-- {{ row.name }} wrote {{ row.detail }} songs. -->
                </template>
            </table-column>
        </table-component>
        <pagination :data="products" @pagination-change-page="getResults"></pagination>
    </div>
    
</template>
 
<script>
var aPage;
    export default {
        
        data() {
            return {
                
                products: []
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            deleteProduct(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/products/${id}`)
                    .then(response => {
                        let i = this.products.data.map(data => data.id).indexOf(id);
                        this.products.data.splice(i, 1);
                        this.getResults(this.aPage);
                    });
            },
            getResults(page) {
                if (typeof page === "undefined") {
                    page = 1;
                }
                this.axios
                    .get("http://localhost:8000/api/products?page=" + page)
                    .then(response => {
                        this.products = response.data;
                        
                        console.log(this.products);
                    });
                this.aPage = page;
console.log("this.products-------------------------"+this.aPage);
            }
        }
    }
</script>