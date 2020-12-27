<table class="table table-responsive-sm table-bordered table-hover table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Slug</th>
            <th>Aksi</th>
         </tr>
    </thead>
    <tbody>
        @foreach($portfolios as $portfolio)
        <tr>
            <td>{{ $loop->iteration + $portfolios->firstItem() -1}}</td>
            <td>{{ $portfolio->nama }}</td>
            <td>{{ $portfolio->slug }}</td>
            <td>
                <a class="btn btn-sm btn-outline-info" href="{{ route('portfolio.show',$portfolio->id) }}">Show</a>
                {{-- <a class="btn btn-sm btn-outline-warning" href="{{ route('portfolio.edit',$portfolio->id) }}">Edit</a> --}}
                <form id="delete_{{ $portfolio->id }}" action="{{ route('portfolio.destroy',$portfolio->id) }}" class="d-inline" method="POST">
                    {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $portfolio->id }}">
                        <button type="submit" value="{{ $portfolio->id }}" class="hapus btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

