<template>
  <div className="container" id="loginPage">
    <div className="container">
      <center>
        <div id="loginForm">
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

            <button type="submit">Submit</button>
          </form>
        </div>
      </center>
    </div>

    <button><router-link to="/user/register">Register</router-link></button>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: "UserLogin",
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

            localStorage.setItem('token', res.data.token);
          }
          else if(!res.data.status) {
            console.log("Error");
          }
        });
      },
    },
  };
</script>

<style scoped>
  #loginPage {
    text-align: center;
  }
  #loginForm {
    max-width: 400px;
  }
</style>
