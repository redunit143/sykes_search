<!-- Modal -->
<div id="myModal" class="modal fade show" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Product</h4>
      </div>


      <form method="POST" action="products">
          @csrf <!-- {{ csrf_field() }} -->

          <div class="modal-body">

              <div class="container">
              <div class="container">

                    <div class="dropdownx">
                        <select id="dropdown" class="selectpicker"  data-style="btn-primary" name="category_id">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="alert alert-danger">{{ $errors->first('category_id') }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Name</label><input class="form-control" type="input" name="name" value="{{ old('name') ? old('name') : request('name') }}">
                    </div>
                        @error('name')
                            <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                        @enderror

                    <div class="form-group">
                        <label>Description</label><input class="form-control" type="input" name="description" value="{{ old('description') ? old('description') : request('description') }}">
                    </div>
                        @error('description')
                            <span class="alert alert-danger">{{ $errors->first('description') }}</span>
                        @enderror


                    <div class="form-group">
                        <label>quantity</label><input class="form-control" type="input" name="qty" value="{{ old('qty') ? old('qty') : request('qty') }}">
                    </div>
                        @error('qty')
                            <span class="alert alert-danger">{{ $errors->first('qty') }}</span>
                        @enderror


                </div>
                </div>
         </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Add Product</button>
          </div>


       </form>


    </div>

  </div>
</div>