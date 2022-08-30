<template>
    <div>
        <NavBar />
        <div v-if="isUserLogged">
            <div class="container">
                <div id="homePage">
                    <center>
                        <h2>My Books</h2>
                        <hr/>
                    </center>
                    <div id="bookTable">
                        <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">BookId</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Borrow Date</th>
                                    <th scope="col">Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr v-for="book in borrowedBook" :key="book.id">
                                    <td>{{ book.bookId}}</td>
                                    <td>{{ book.bookTitle}}</td>
                                    <td>{{ book.created_at}}</td>
                                    <td><button type="button" class="btn btn-outline-danger" v-on:click="returnBook((book.id))">Return</button></td>
                                </tr>
                                
                            </tbody>
                            </table>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import NavBar from "../../components/NavBar.vue";

    export default {
        name: 'MyBooks',
        components: {
            NavBar,
        },
        data(){
            return{
                borrowedBook: []
            }
        },
        created(){
            if (localStorage.token) {
                this.isUserLogged = true;
            } else {
                alert("Please Login!");
                this.$router.push("/");
            }

            this.retriveBorrowedBooks();
        },
        methods: {
            async retriveBorrowedBooks(){
                await axios.get("http://127.0.0.1:8000/api/borrwedBooks").then((res) => {
                    if (res.data.status) {
                        this.borrowedBook = res.data.books;
                        console.log(res.data.books);
                    }
                });
            },
            returnBook(id){
            axios.delete(`http://127.0.0.1:8000/api/borrwedBooks/${id}`).then((res) => {
                    if (res.data.status) {
                        console.log("Book Returned");
                    }
                });
        }
        },
        
    }
</script>

<style scoped>
#homePage {
  background-color: aliceblue;
  padding: 20px;
  border-radius: 20px;
  min-height: 600px;
}
#bookTable{
    margin: 40px;
}
</style>