<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="card-header w-100 m-1 text-center">Upload Image</h2>
    </div>
    <div class="row justify-content-center">
    {{-- enctype attribute is important if your form contains file upload --}}
    {{-- Please check https://www.w3schools.com/tags/att_form_enctype.asp for further info --}}
        <form method="post" action="{{ route('apartments.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="title" name="title">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="description" placeholder="Description" name="description">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="rooms" placeholder="Num Rooms" name="rooms">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="beds" placeholder="Num Beds" name="beds">
            </div>                        
            <div class="form-group">
                <input type="text" class="form-control" id="bathrooms" placeholder="Num Bathrooms" name="bathrooms">
            </div>      
            <div class="form-group">
                <input type="text" class="form-control" id="metri_quadrati" placeholder="Num Mt Qd" name="metri_quadrati">
            </div>       
            <div class="form-group">
                <input type="text" class="form-control" id="price" placeholder="Price" name="price">
            </div>                       
            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Create</button>
        </form>
    </div>
</div>