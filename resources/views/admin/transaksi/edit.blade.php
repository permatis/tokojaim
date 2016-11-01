@extends('partials.main')

@section('content')
    {!! Form::open(array('route' => ['admin.transaksi.update', $transaksi->id], 'method' => 'put')) !!}
		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Status Order</h3>
            </div>
			<div class="box-body">
                <div class="form-group{{ $errors->has('kd_transaksi') ? ' has-error' : '' }}">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" name="kd_transaksi" value="{{ $transaksi->kd_transaksi }}" disabled>

                    @if ($errors->has('kd_transaksi'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kd_transaksi') }}</strong>
                        </span>
                    @endif
                </div>

				<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
					<label for="status">Status</label>
					<select name="status" class="form-control kategori" id="kategori">

                        @foreach($status as $st)
                        <option value="{{ $st->id }}" @if($st->id === $transaksi->status_order_id) selected @endif>{{ $st->nama }}</option>
						@endforeach

					</select>

                    @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
				</div>
            </div>

            <div class="box-footer">
             	<button type="submit" class="btn btn-info">Update</button>
            </div>
		</div>
    {!! Form::close() !!}
@endsection
