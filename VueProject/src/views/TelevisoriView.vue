<template>
  <div class="flex-center">
    <div class="card" style="width: 14rem;!important" v-for="brand in resp">
      <img :src="brand.path" class="card-img-top cardimg" :alt="'logo ' + brand.brand">
      <div class="card-body">
        <h5 class="card-title">{{brand.brand}}</h5>
        <p class="card-text">{{ brand.description }}</p>
        <RouterLink :to="{name: 'tvBrand', params:{brand: brand.brand}}" role="button" class="btn btn-primary">Go to Products</RouterLink>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        resp:[]
      }
    },
    methods:
    {
        getBrand()
        {
          fetch('http://localhost:8080/brands.php?tipo=' + this.$route.name, {
            method: 'GET',
            headers: {
              'Accept' : 'application/json'
            }
          })
          .then(res => res.json())
          .then(data => {
            this.resp=data.brands;
          })
        }
    },
    created()
    {
      this.getBrand()
    }
  }
</script>

<style scoped>
.cardimg
{
  width: 100%;
  height: 20%;
}
.flex-center {
display: flex;
justify-content:center;
text-align: center;
background: #fff;
margin: 20px 0;
padding: 20px;
}

.flex-center div {
margin:10px;
padding: 10px;
max-width: 180px;
}
</style>
