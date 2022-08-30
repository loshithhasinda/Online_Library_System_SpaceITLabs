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

                                <br/><br/>

                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Search</button>
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
                                <button type="button" class="btn btn-outline-primary" v-on:click="borrowBook((book.id),(book.title))">Borrow</button>
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
import swal from 'sweetalert';
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
      swal("Please Login!", "", "warning");
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
    filteredBooks(e){
      e.preventDefault();
      console.log(this.search)
        this.books = this.books.filter((book) => book.title.toLowerCase().includes(this.search.toLowerCase()) || book.description.toLowerCase().includes(this.search.toLowerCase()) );
    },
    borrowBook(id, title){

        const data = {
            userId: localStorage.userId,
            bookId: id,
            bookTitle: title
        }

        swal({
            title: "Are you sure?",
            text: "Buy this Book",
            icon: "",
            buttons: true,
            dangerMode: false,
          }).then((willBuy) => {
            if (willBuy) {
              axios.post("http://127.0.0.1:8000/api/borrwedBooks", data).then((res) => {
        if (res.data.status) {
          swal("Successful", "", "success");
        }
      });
            } 
        });

        
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
    min-height: 300px;
    min-width: 100px;
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
