<template>
  <div>
    <NavBar />
    <div v-if="isUserLogged">
      <div class="container">
        <div id="homePage">
            <center>
                <h2>Welcome to Online Library</h2>
                <hr/>
            </center>
            <center>
                <form @submit="filteredBooks">
                    <div class="row">
                        <div class="col">
                            <div id="searchInput">
                                <input
                                type="text"
                                placeholder="Search by title description genre"
                                v-model="search" />

                                <div class="col">
                                    <button type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
                
            </center>
            <center>
            
                <div class="container">
                    <div class="row">
                        <div class="col" id="bookSection" v-for="book in books" :key="book.id">
                                <h4>{{ book.title }}</h4>
                                <hr/>
                                <p>{{ book.description }}</p>
                                <p>{{ book.genre }}</p>
                                <p>{{ book.price }} LKR</p>
                            </div>
                        
                    </div>
                </div>
                
            </center>
            
        </div>
      </div>
      
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavBar from "../../components/NavBar.vue";

export default {
  name: "BookHome",
  components: {
    NavBar,
  },
  data() {
    return {
      isUserLogged: false,
      books: [],
      search: ''
    };
  },
  created() {
    if (localStorage.token) {
      this.isUserLogged = true;
    } else {
      alert("Please Login!");
      this.$router.push("/");
    }

    this.retrieveBooks();

    console.log(localStorage.token);
  },
  methods: {
    async retrieveBooks() {
      await axios.get("http://127.0.0.1:8000/api/books").then((res) => {
        if (res.data.status) {
          this.books = res.data.books;
          console.log(res.data.books);
        }
      });
    },
    filteredBooks(){
        this.books = this.books.filter((book) => book.title.toLowerCase().includes(this.search.toLowerCase()) );
    }
  },
};
</script>

<style scoped>
#homePage {
  background-color: aliceblue;
  padding: 20px;
  border-radius: 20px;
  min-height: 600px;
}
#bookSection{
    background-color: white;
    height: 300px;
    border: 1px solid rgb(190, 190, 190);
    border-radius: 8%;
    padding: 10px;
    margin: 8px;
}
#searchInput{
    margin-bottom: 10px;
}
#searchInput input{
    min-width: 500px;
    padding: 5px;
    border: none;
}
</style>
