<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>New Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="/createproduct">
                @csrf
                <div class="form-field">
                    <label for="title">Title</label>
                    <input name="title" type="text" require class="@error('title') is-invalid @enderror" />

                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="price">Price</label>
                    <input name="price" type="text" require class="@error('price') is-invalid @enderror" />

                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="description">Description</label>
                    <textarea name="description"></textarea>

                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="category" require>Category</label>

                    <select name="category">
                        @foreach($categories as $cateogory)
                        <option value="{{$cateogory}}">{{ucwords($cateogory)}}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-field">
                    <button type="submit" class="button-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>