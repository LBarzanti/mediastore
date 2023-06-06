<template>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <RouterLink class="navbar-brand" :to="'/'"> MediaShop </RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <RouterLink class="nav-link" :to="'/contact'"> Contacts </RouterLink>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <RouterLink class="nav-link" v-for="categoria in resp" :to="'/' + categoria"><li><a class="dropdown-item" href="#">{{categoria}}</a></li></RouterLink>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">IT</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
                <li style="margin-left:300px">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle" :on-click="checkLogged" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/profile.png" style="width:30px">
                    </button>
                    <ul class="dropdown-menu">
                        <li v-if="logged"><a class="dropdown-item" href="#"> profile </a></li>
                        <li v-if="logged"><hr class="dropdown-divider"></li>
                        <li v-if="logged"><a class="dropdown-item" href="#"> Log-out</a></li>
                        <li v-if="!logged">
                            <RouterLink :to="'/login'" style="color:black; text-decoration: none;" class="dropdown-item"> Log-in</RouterLink>
                        </li>
                        <li v-if="!logged"><hr class="dropdown-divider"></li>
                        <li v-if="!logged">
                            <RouterLink class="dropdown-item" :to="'/signup'"> Sign-up </RouterLink>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
  data() {
    return {
      p:"",
      logged:false,
      resp:[]
    }
  },
  methods:
  {
    checkLogged()
    {
        if (this.token != "TOKEN") {
            this.logged = true
        }
        else
        {
            this.logged = false
        }
    },
    getCategories()
    {
        fetch('http://localhost:8080/categories.php/', {
            method: 'GET',
            headers: {
                'Accept' : 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            function check(arr, val){
                return !arr.some((arrVal) => val === arrVal);
            }

            for (let index = 0; index < data.categories.length; index++) {
                if (check(this.resp,data.categories[index].tipo)) {
                    this.resp.push(data.categories[index].tipo)
                }
            }
        })
        .catch(err => console.log(err))
    }
  },
  computed:
  {
    
  },
  created()
  {
    this.getCategories()
  }
}
</script>