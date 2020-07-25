<template>
    <div class="">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">Produk</div>

                        <div class="card-body">
                            <router-link :to="{ name: 'create' }" class="btn btn-md btn-success">TAMBAH PRODUK</router-link>

                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi Produk</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(product, index) in products" :key="product.id">
                                        <td>{{ product.name }}</td>
                                        <td>{{ product.description }}</td>
                                        <td class="text-center">
                                            <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-sm btn-primary">EDIT</router-link>
                                            <button @click.prevent="PostDelete(product.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">TAMBAH POST</div>
                            <div class="card-body">

                                <form @submit.prevent="ProductStore">
                                


                                    <div class="form-group">
                                        <label>TITLE</label>
                                        <input type="text" class="form-control" v-model="post.name"
                                            placeholder="Masukkan Title">
                                    </div>


                                    <div class="form-group">
                                        <label>KONTEN</label>
                                        <textarea class="form-control" v-model="post.description" rows="5"
                                                placeholder="Masukkan Konten"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-danger">RESET</button>
                                    </div>


                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>


<script>
    export default {
        data() {
            return {
                post: {},
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                products: [],
            }
        },
        methods: {
            ProductStore() {
                let uri = `http://travelasido.test/api/products/store`;
                this.axios.post(uri, this.post)
                    .then((response) => {
                        
                        this.ProductsView()
                    })
            },
            ProductsView () {
                let uri = `http://travelasido.test/api/products/index`;
                this.axios.get(uri).then(response => {
                    this.products = response.data.data;
                });    
            },
            fetchData: function () {
                setInterval(() => {
                    this.ProductsView()
                }, 10000)
            }
        },
        created() {
            this.ProductsView();
            this.fetchData();
        },
        mounted () {
            this.fetchData();
        },
    }
</script>