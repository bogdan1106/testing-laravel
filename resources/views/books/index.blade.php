<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books</div>
                <br>
                <div class="card-body">
                    @foreach($books as $book)
                        {{$book->title}}<br/>
                        {{$book->genre}}
                        <hr/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>