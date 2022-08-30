<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-light mb-4">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">Online Library</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <router-link to="/book/home" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/book/myBook" class="nav-link">My Books</router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link">My Profile</a>
            </li>
          </ul>

          <div class="d-flex">
            <div v-if="!isUserLogged">
              <button class="btn btn-outline-success" type="submit">
                <router-link to="/" class="nav-link">Login</router-link>
              </button>

              <button class="btn btn-outline-success" type="submit">
                <router-link to="/user/register" class="nav-link">SignUp</router-link>
              </button>
            </div>
            <div v-if="isUserLogged">
              <button class="btn btn-outline-success" type="submit" v-on:click="signout">
                Signout
              </button>
            </div>
          </div>
          
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
  import swal from 'sweetalert';
export default {
  data() {
    return {
      isUserLogged: false,
    };
  },
  created() {
    if (localStorage.token) {
      this.isUserLogged = true;
    } else {
      this.isUserLogged = false;
    }
  },
  methods:{
    signout(){
      localStorage.removeItem("token");
      localStorage.removeItem("userId");

      swal("Logout Successfull", "", "success");
      this.$router.push("/");
    }
  }
};
</script>

<style scoped></style>
