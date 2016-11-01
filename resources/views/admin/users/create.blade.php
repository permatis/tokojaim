@extends('partials.main')

@section('content')
    {!! Form::open(array('route' => 'admin.users.store')) !!}
		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Users</h3>
            </div>
			<div class="box-body">
				<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
					<label for="roles">Roles</label>
					<select name="roles" class="form-control kategori" id="kategori">
						<option value="0">Pilih Roles</option>

                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach

					</select>

                    @if ($errors->has('roles'))
                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                    @endif
				</div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label">E-Mail Address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label">Password</label>
                    <input type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="box-footer">
             	<button type="submit" class="btn btn-info">Simpan</button>
            </div>
		</div>
    {!! Form::close() !!}
@endsection
