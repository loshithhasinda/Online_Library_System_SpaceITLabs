<template>
    <div>
    <NavBar />

    <div class="container">
      <div>
        <div className="container" id="registerPage">
          <div className="container">

              <div id="registerForm">

                <div class="centerText">
                  <h3> User Register</h3>
                </div>
                
                <hr/>

                <div class="container">
                  <form @submit="submitForm">
                    <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      placeholder="Username"
                      v-model="formValues.name"
                    />
                  </div>
                  
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="name@example.com"
                      v-model="formValues.email"
                    />
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      placeholder="Password"
                      v-model="formValues.password"
                    />
                  </div>
                  <div class="mb-3 centerText">
                    <button type="submit" class="btn btn-primary" id="loginBtn">Register</button>
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
    import axios from "axios";
    import swal from 'sweetalert';
    import NavBar from "../components/NavBar.vue";

    export default {
        name: "UserRegister",
        components: {
            NavBar,
        },
        data() {
            return {
                formValues: {
                    name: "",
                    email: "",
                    password: "",
                },
            };
        },
        methods: {
            submitForm(event) {
                event.preventDefault();

                const data = {
                    name: this.formValues.name,
                    email: this.formValues.email,
                    password: this.formValues.password,
                };

                console.log(data);

                axios.post("http://127.0.0.1:8000/api/auth/register", data).then((res) => {
                    if (res.data.status) {
                        swal("Registration Successful", "", "success");
                        this.$router.push("/");
                    } else if (!res.data.status) {
                        swal("Registration Failed!", "Try Again", "warning");
                    }
                });
            },
        }
    }
</script>

<style scoped>
#registerPage {
  background-color: aliceblue;
  padding: 20px;
  max-width: 500px;
  border-radius: 20px;
}
.centerText{
  text-align: center;
}
</style>