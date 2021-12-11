<!-- Modal -->
<div id="myModal" class="modal fade show" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Property Search</h4>
      </div>


            <form method="POST" action="search">


      <div class="modal-body">

          <div class="container">
          <div class="container">
                <div class="form-group">
                    <label>Location</label></label><input class="form-control" type="input" name="location" value="{{ old('location') ? old('location') : request('location') }}">
                    @error('location')
                        <span class="alert alert-danger">{{ $errors->first('location') }}</span>
                    @enderror
                </div>
                <div class="checkbox">
                    <label>
                         <input name="near_beach" type="checkbox" value="1" {{ ((old('near_beach') ? old('near_beach') : request('near_beach')) == 1 ? 'checked="checked"' : '') }}>
                         Near the Beach
                    </label>
                    @error('near_beach')
                        <span class="alert alert-danger">{{ $errors->first('near_beach') }}</span>
                    @enderror
                </div>

                <div class="checkbox">
                    <label>
                        <input name="accepts_pets" type="checkbox" value="1" {{ ((old('accepts_pets') ? old('accepts_pets') : request('accepts_pets')) == 1 ? 'checked="checked"' : '') }}>
                        Accepts Pets
                    </label>
                    @error('accepts_pets')
                        <span class="alert alert-danger">{{ $errors->first('accepts_pets') }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sleeps</label></label><input class="form-control" type="input" name="sleeps" value="{{ old('sleeps') ? old('sleeps') : request('sleeps') }}">
                    @error('sleeps')
                        <span class="alert alert-danger">{{ $errors->first('sleeps') }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Beds</label></label><input class="form-control" type="input" name="beds" value="{{ old('beds') ? old('beds') : request('beds') }}">
                    @error('beds')
                        <span class="alert alert-danger">{{ $errors->first('beds') }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <div class='input-group date'>
                        <input type='text' class="form-control" name="start_date" value="{{ old('start_date') ? old('start_date') : request('start_date') }}" placeholder="YYYY-MM-DD" id='startdate' autocomplete="off" />
                        <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @error('start_date')
                        <span class="alert alert-danger">{{ $errors->first('start_date') }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <div class='input-group date'>
                        <input type='text' class="form-control" name="end_date" value="{{ old('end_date') ? old('end_date') : request('end_date') }}" placeholder="YYYY-MM-DD" id='enddate' autocomplete="off" />
                        <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @error('end_date')
                        <span class="alert alert-danger">{{ $errors->first('end_date') }}</span>
                    @enderror
                </div>
            </div>
            </div>
     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary ">Submit</button>
      </div>


            </form>


    </div>

  </div>
</div>