@section('partials.main')
@section('content')
	<div class="box box-primary">
    	<div class="box-header with-border">
            <h3 class="box-title">List Produk</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        </div>
        
        <div class="box-footer clearfix">
        {!! link_to('admin/produks/create', 'Tambah Produk', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}
        </div>
    </div>
@endsection
