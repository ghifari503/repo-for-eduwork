@extends('layouts.admin')

@section('title', 'Book')
@section('page-heading', 'Book')

@section('css')
<style>
    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }
</style>
@endsection

@section('content')
<div id="controller">
    <div class="d-sm-flex align-items-center justify-content-around mb-4">
        <button @click.prevent="handleAdd" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Book</button>
        <div class="form-group has-search" v-if="books.length">
            <span class="fas fa-search form-control-feedback"></span>
            <input v-model="search" type="text" class="form-control" placeholder="Search">
        </div>
    </div>
    <div v-if="loading">
        <p class="text-center">Loading...</p>
    </div>
    <div v-else>
        <div v-if="books.length === 0">
            <div class="alert alert-primary" role="alert">
                There is no book.
            </div>
        </div>
        <div v-else class="row d-flex justify-content-center mt-50 mb-50">
            <div class="col-md-4 mt-2" v-for="(book, index) in filteredBooks" :key="book.id">
                <div class="card">
                    <div v-on:click="handleEdit(book)" class="card-body text-left">
                        <div class="mb-2">
                            <p class="font-weight-semibold mb-2">Title: @{{ book.title }}</p>
                        </div>
                        <p class="mb-0 font-weight-semibold">Stock: @{{ book.qty }}</p>
                        <p class="mb-0 font-weight-semibold">Price: @{{ bookPriceWithFormatRupiah[index] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form @submit.prevent="handleSubmit($event, book.id)" :action="actionUrl" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookModalLabel">Form Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <template v-if="editing">
                            @method('put')
                        </template>
                        <div class="form-group">
                            <label for="isbn" class="col-form-label">Isbn:</label>
                            <input type="number" name="isbn" :value="book.isbn" class="form-control" id="isbn" required>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" name="title" :value="book.title" class="form-control" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="year" class="col-form-label">Year:</label>
                            <input type="number" name="year" :value="book.year" class="form-control" id="year" required>
                        </div>
                        <div class="form-group">
                            <label for="publisher" class="col-form-label">Choose Publisher:</label>
                            <select name="publisher_id" class="browser-default custom-select" id="publisher" required>
                                @foreach ($publishers as $publisher)
                                    <option :selected="book.publisher_id === {{ $publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-form-label">Choose Author:</label>
                            <select name="author_id" class="browser-default custom-select" id="author" required>
                                @foreach ($authors as $author)
                                    <option  :selected="book.author_id === {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catalog" class="col-form-label">Choose Catalog:</label>
                            <select name="catalog_id" class="browser-default custom-select" id="catalog" required>
                                @foreach ($catalogs as $catalog)
                                <option  :selected="book.catalog_id === {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty" class="col-form-label">Qty:</label>
                            <input type="number" name="qty" :value="book.qty" class="form-control" id="qty" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                            <input type="number" name="price" :value="book.price" class="form-control" id="price" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-around">
                        <button @click.prevent="handleDelete(book)" type="submit" class="btn btn-danger" v-if="editing">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var controller = new Vue({
        el: '#controller',
        data: {
            books: [],
            book: {},
            actionUrl: '{{ url('books') }}',
            apiUrl: '{{ url('api/books') }}',
            loading: true,
            search: '',
            editing: false
        },
        mounted() {
            this.getResults()
        },
        computed: {
            bookPriceWithFormatRupiah() {
                return this.books.map(book => {
                    return`Rp. ${this.numberWithSpaces(book.price)} ,-`
                })
            },
            filteredBooks() {
                return this.books.filter(book => {
                    return book.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
        methods: {
            getResults() {
                axios.get(this.apiUrl)
                    .then(response => {
                        this.books = response.data
                        this.loading = false
                    })
                    .catch(error => {
                        this.loading = false
                        console.log(error)
                    })
            },
            numberWithSpaces(x) {
                const parts = x.toString().split(".")
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                return parts.join(".")
            },
            handleAdd() {
                this.book = {}
                this.editing = false
                $('#bookModal').modal('show')
            },
            handleEdit(book) {
                this.editing = true
                this.book = book
                $('#bookModal').modal('show')
            },
            handleDelete(book) {
                this.actionUrl = '{{ url('books') }}' + '/' + book.id
                const bookTitle = book.title
                if (confirm(`Are you sure want to delete this book with title ${bookTitle}`)) {
                    axios.post(this.actionUrl, {_method: 'delete'})
                        .then(response => {
                            this.getResults()
                            $('#bookModal').modal('hide')
                        })
                        .catch(error => alert('Something went wrong, try again later'))
                }
            },
            handleSubmit(event, id) {
                this.actionUrl = !this.editing ? '{{ url('books') }}' : '{{ url('books') }}' + '/' + id
                axios.post(this.actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                        $('#bookModal').modal('hide')
                        this.getResults()
                    })
            }
        },
    })
</script>
@endsection