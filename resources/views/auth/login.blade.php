<x-main>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                
                <form class="p-5 border rounded" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    </div>
                    
                    @error('email')
                    {{ $message }}
                    @enderror
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"  name="password" value="{{old('password')}}">
                    </div>
                    
                    @error('password')
                    {{ $message }}
                    @enderror
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark">Non sei
                        registrato?</a>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </x-main>