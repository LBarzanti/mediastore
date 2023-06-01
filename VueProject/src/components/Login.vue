<template>
    <form id="form" @submit.prevent="onSubmit" v-if="!formSubmitted">
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
            <label for="registrati"> if you don't have an account⠀</label>
            <RouterLink :to="'/signup'" id="registrati">Sign-up </RouterLink> 
        </div>
    </form>

    <p> {{ resp }}</p>

</template>

<script>
    export default {
  data() {
    return {
      mail: "",
      password: "",
      formSubmittend: false,
      resp: "0"
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
        }).then(res => res.json).then(data => this.resp = data)
    }
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
</style>