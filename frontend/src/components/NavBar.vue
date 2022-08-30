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
              <a class="nav-link active" aria-current="page" href="/book/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">My Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">My Profile</a>
            </li>
          </ul>

          <div class="d-flex">
            <button class="btn btn-outline-success" type="submit">
              <router-link to="/" class="nav-link">Login</router-link>
            </button>

            <button class="btn btn-outline-success" type="submit">
              <router-link to="/user/register" class="nav-link">SignUp</router-link>
            </button>
          </div>
          
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>

<style scoped></style>
