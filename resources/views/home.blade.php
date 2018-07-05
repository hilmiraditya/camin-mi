@if(Auth()->user()->isAdmin == 1)
    @include('admin.index')
@endif
@if(Auth()->user()->isAdmin == 0)
    @include('karyawan.index')
@endif