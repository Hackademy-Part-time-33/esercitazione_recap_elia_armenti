<x-main>
    
    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" value name="title" type="text">
                        <label for="name">Nome</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input class="form-control" id="price" value name="title" type="number">
                        <label for="name">Prezzo</label>
                        
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        {{-- <img width="200"
                        src="https://images.freeimages.com/images/large-previews/83c/barn-silo-detail-5-1210478.jpg"
                        class="img-responsive"> --}}
                        <input class="form-control" id="image" name="image" value type="file">
                        
                    </div>
                    
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-main>