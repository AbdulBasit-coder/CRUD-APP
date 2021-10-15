<template>
<div class="container">
<div v-if="loading">looding....</div>
    <div class="container-fluid" v-if="!loading">
    <div class="add_list pt-5">
      <a  href="product/create">Add Product</a>
    </div>
    <div class="row tables_data">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Soft Delete Status</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products">
              <th scope="row">{{product.id}}</th>
              <td>{{product.title}}</td>
              <td>{{product.description}}</td>
              <td>{{product.price}}</td>
              <td><a :href="'product/edit/'+product.id">Edit</a></td>
              <td><a :href="'product/delete/'+product.id">Click to delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import axios from 'axios';
    export default {
      name: 'apps',
      data () {
      return {
        loading: true,
        products:[],
      }
      }, 
      // props : [],
      created(){
        const promise1 = axios({
        method: 'get',
        url: 'http://127.0.0.1:8000/product/product-response',
        });
        promise1.then( values => { 
        
          this.loading = false;
          this.products = values.data;
          console.log(values.data)
        
        });
      },
      methods:{
      },
      mounted() {
          console.log('Component mounted.')
      },
      computed : {
      }
    }
</script>