<template>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <RouterLink class="navbar-brand" :to="'/' + '?lang=' + this.$route.query.lang"> MediaShop </RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <RouterLink class="nav-link" :to="'/contact'"> Contacts </RouterLink>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">IT</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">IT</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li style="margin-left:300px">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/profile.png" style="width:30px">
                    </a>
                    <ul class="dropdown-menu">
                        <li v-if="isLogged"><a class="dropdown-item" href="#"> profile </a></li>
                        <li v-if="isLogged"><hr class="dropdown-divider"></li>
                        <li v-if="isLogged"><a class="dropdown-item" href="#"> Log-out</a></li>
                        <li v-if="!isLogged">
                            <RouterLink :to="'/login'" style="color:black; text-decoration: none;" class="dropdown-item"> Log-in</RouterLink>
                        </li>
                        <li v-if="!isLogged"><hr class="dropdown-divider"></li>
                        <li v-if="!isLogged"><a class="dropdown-item" href="#">Sign-up</a></li>
                    </ul>
                </li>
            </ul>
            
            
            </div>
        </div>
    </nav>
</template>

<script>
    export default(await import('vue')).defineComponent({
        data()
        {
            return
            {
                p:""
            }
        },
        computed:{
            isLogged()
            {
                return this.$authtoken != null
            }
        }
    })
</script>