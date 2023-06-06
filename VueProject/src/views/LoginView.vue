<template>
    <div v-if="submitted">
        <form id="form" @submit.prevent="onSubmit">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" v-model="mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" v-model="password">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary"/>
            <div style="float:right">
                <label for="registrati"> if you don't have an account</label>
                <RouterLink :to="'/signup'" id="registrati"> Sign-up </RouterLink> 
            </div>
        </form>
    </div>
    <div v-if="!submitted">
        <img src="../assets/success.png" alt="Success.png" id="success">
       <h3 class="text"> Successful registration! </h3>
       <p class="text"> Hi {{ this.username[0] }}, you have successfully created your profile on MediaShop!</p>
       <RouterLink :to="'/'" class="btn btn-primary" id="button"> Continue shopping </RouterLink>
       <p>{{ token }}</p>
    </div>
    
</template>

<script>
    export default {
  data() {
    return {
      mail: "",
      password: "",
      resp:{},
      submitted:true,
      username:""
    }
  },
  methods:
  {
    onSubmit()
    {
        fetch('http://localhost:8080/credenziali.php/', {
            method: 'POST',
            headers: {
                'Accept' : 'application/json'
            },
            body : JSON.stringify({ mail : this.mail, password : this.password })
        })
        .then(res => res.json())
        .then(data => {
            this.resp = data,
            this.setToken(this.resp.token)
            this.submitted = false
            this.username = this.resp.mail.split("@")
        })
        .catch(err => console.log(err))
    },
  }
}
</script>

<style scoped>
    #form
    {
        margin-left: auto;
        margin-right: auto;
        margin-top: 10%;
        width: 40%;
    }

    #success
    {
        margin-left: 43%;
        margin-top: 7%;
        width: 200px;
    }

    .text
    {
        text-align: center;
    }

    #button
    {
        margin-left: 44%;
    }
</style>