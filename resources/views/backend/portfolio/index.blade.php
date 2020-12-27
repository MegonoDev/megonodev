@extends('layouts.backend.master-backend')
@section('title')
Portfolio
@endsection
@section('content')
    <div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h4> <i class="c-icon cil-window-maximize"></i> Portfolio</h4>
                        </li>
                        <li class="list-inline-item float-right">
                            <div class="d-none d-md-block">
                                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary mx-3">
                                    <i class="c-icon cil-plus"></i>
                                    Tambah portfolio
                                </a>
                            </div>
                            <div class="d-md-none float-right">
                                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary mb-3">
                                    <i class="c-icon cil-plus"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if(!$portfolios->isEmpty())
                    @include('backend.portfolio._table')
                    @else
                    <div class="text-center text-muted">
                        <img src="{{ asset('img/no-data.png') }}" width="200" height="200" alt="data not found">
                        <br>
                        Belum ada portfolio. klik tambah akun untuk membuat portfolio baru.
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            {{$portfolios->appends(Request::except('page'))->links()}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    $(document).ready(function() {

        $('.hapus').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    del(id);
                }
            })
        })

        function del(id) {
            var url = $('#delete_' + id).attr('action');
            var data = $('#delete_' + id).serialize();
            var method = "POST";

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(response) {
                    if (response.code == "200") {
                        Swal.fire(
                            'Success!',
                            'Background deleted',
                            'success'
                        )
                        backTo(response.url);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Can\'t delete background',
                            'warning'
                        )
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Warning!",
                        text: xhr.errors,
                        icon: "warning",
                        button: "OK!",
                        closeOnClickOutside: false
                    });
                }
            })
        }

        function backTo(url) {
            window.location.href = url;
        }

    });
</script>
@endpush

