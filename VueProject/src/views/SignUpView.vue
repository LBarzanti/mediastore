<template>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Account</h3>
                            <form @submit.prevent="onSubmit" >

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" v-model="nome" />
                                            <label class="form-label">Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" v-model="cognome" />
                                            <label class="form-label">Surname</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="text" class="form-control form-control-lg" v-model="cf" />
                                            <label class="form-label">Tax Id</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control form-control-lg" v-model="telefono" />
                                            <label class="form-label">Phone Number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <input type="email" class="form-control form-control-lg" v-model="mail" />
                                            <label class="form-label">E-Mail</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" class="form-control form-control-lg" v-model="password" />
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <RouterLink :to="'/login'" class="btn btn-link">already registered</RouterLink>
                                    <input class="btn btn-info " type="submit" value="Registrati" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                nome:"",
                cognome:"",
                cf:"",
                telefono:"",
                mail:"",
                password:"",
                resp:{}
            }
        },
        methods:
        {
            onSubmit()
            {
                fetch('http://localhost:8080/register.php/',{
                    method: 'POST',
                    headers:{
                        'Content-Type' : 'application/json'
                    },
                    body : JSON.stringify({ nome : this.nome, cognome : this.cognome, cf : this.cf, telefono : this.telefono, mail : this.mail, password : this.password})
                })
                .then(res => res.json())
                .then(data => {
                    this.resp = data,
                    this.setToken(this.resp.token)
                })
                .catch(err => console.log(err))
            }
        }
    }
</script>