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
        <button class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Book</button>
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
                    <div class="card-body text-left">
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
</div>
@endsection

@section('js')
<script>
    var controller = new Vue({
        el: '#controller',
        data: {
            books: [],
            actionUrl: '{{ url('books') }}',
            apiUrl: '{{ url('api/books') }}',
            loading: true,
            search: ''
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
            }
        },
    })
</script>
@endsection