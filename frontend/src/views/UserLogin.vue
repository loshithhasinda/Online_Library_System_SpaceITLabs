<template>
  <div>
    <NavBar />

    <div class="container">
      <div>
        <div className="container" id="loginPage">
          <div className="container">

              <div id="loginForm">

                <div class="centerText">
                  <h3> User Login</h3>
                </div>
                
                <hr/>

                <div class="container">
                  <form @submit="submitForm">
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
                    <button type="submit" class="btn btn-primary" id="loginBtn">Login</button>
                  </div>

                  
                </form>
                </div>
              </div>

          </div>

          <button>
            <router-link to="/user/register">Register</router-link>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavBar from "../components/NavBar.vue";

export default {
  name: "UserLogin",
  components: {
    NavBar,
  },
  data() {
    return {
      formValues: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    submitForm(event) {
      event.preventDefault();

      const data = {
        email: this.formValues.email,
        password: this.formValues.password,
      };

      console.log(data);

      axios.post("http://127.0.0.1:8000/api/auth/login", data).then((res) => {
        if (res.data.status) {
          console.log("Login Success");
          console.log(res.data.token);
          console.log(res.data.user);

          localStorage.setItem("token", res.data.token);
          this.$router.push("/book/home");
        } else if (!res.data.status) {
          console.log("Error");
        }
      });
    },
  },
};
</script>

<style scoped>
#loginPage {
  background-color: aliceblue;
  padding: 20px;
  max-width: 500px;
  border-radius: 20px;
}
.centerText{
  text-align: center;
}
</style>
