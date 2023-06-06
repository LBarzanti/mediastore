<template>
    <div class="flex-center">
        <div class="card" v-for="resp in responce">
            <img :src="resp.path" class="card-img-top cardimg" alt="Image temporarily unavailable">
            <div class="card-body">
                <h5 class="card-title">{{resp.model}}</h5>
                <p class="card-text">{{ resp.description }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data()
        {
            return{
                responce:[],
                marca:"",
                categoria:""
            }
        },
        methods:
        {
            getData()
            {
                this.marca = this.$route.params.brand
                this.categoria = this.$route.fullPath.split("/");
                fetch("http://localhost:8080/product.php/", {
                    method: 'POST',
                    headers:{
                        'Accept' : 'application/json'
                    },
                    body : JSON.stringify({
                        "categoria" : this.categoria[1],
                        "marca" : this.marca
                    })
                })
                .then(res => res.json())
                .then(data => {
                    this.responce = data.products
                })
            }
        },
        created()
        {
            this.getData()
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