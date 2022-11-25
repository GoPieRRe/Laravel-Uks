@extends('layouts.master')

@section('content')

<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        </div>
        <form action="{{ route('Obat.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Nama Obat :</label>
          <input required type="text" name="nama_obat" class="form-control" placeholder="Nama Obat...">
          <label for="" class="form-label">Jenis :</label>
          <select name="jenis" id="" class="form-control">
            <option value="">--PILIH--</option>
            <option value="Tablet">Tablet</option>
            <option value="Sirup">Sirup</option>
          </select>
          <label for="" class="form-label">fungsi :</label>
          <input required type="text" class="form-control" name="fungsi" placeholder="Fungsi...">
          <label for="" class="form-label">stok :</label>
          <input required type="number" min=1 class="form-control" name="stok" placeholder="Stok obat...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
  
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif

@if ($msg = Session::get('gagal'))
<div class="row no-gutters">
  <div class="col-lg-2 col-md-12 ml-auto">
    <div class="alert alert-danger shadow my-3" role="alert" style="border-radius: 3px">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="True" style="color:#721C24">&times;</span>
      </button>
      <div class="text-center">
        <svg width="3em" height="3em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>
      </div>
      <p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">Danger!</b>{{ $msg }}</p>
    </div>
  </div>
</div>
@endif
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Data <b>Obat</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <button type="button" data-toggle="modal" data-target="#exampleModals" class="btn btn-success btn-lg mb-2">&plus; Tambah</button>				
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Obat</th>						
                        <th>Jenis</th>
                        <th>Fungsi</th>
                        <th>stok</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                @foreach ($Obat as $b)
                <tbody>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->nama_obat }}</td>
                    <td>{{ $b->jenis }}</td>
                    <td>{{ $b->fungsi }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>   
                      <form action="{{ route('Obat.destroy', $b->id) }}" method="post">
                        <button type="button" type="button" data-toggle="modal" data-target="#exampleModal{{ $b->id }}" class="btn btn-warning"><img src="{{ asset('icon/pen-fill.svg') }}" alt=""></button>				
                            
                        
                          @method('DELETE')
                          @csrf
                            
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure??')"><img src="{{ asset('icon/trash-fill.svg') }}" alt=""></button>
                        </form>
                    </td>
                </tbody>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
                          </div>
                          <form action="{{ route('Obat.update', $b->id) }}" method="POST">
                  
                              @csrf
                              @method('PUT')
                          <div class="modal-body">
                            <label for="" class="form-label">Nama Obat :</label>
                            <input required type="text" name="nama_obat" value="{{ $b->nama_obat }}" class="form-control" placeholder="Nama Obat...">
                            <label for="" class="form-label">Jenis :</label>
                            <input required type="text" class="form-control" name="jenis" value="{{ $b->jenis }}" placeholder="Jenis...">
                            <label for="" class="form-label">fungsi :</label>
                            <input required type="text" class="form-control" name="fungsi" value="{{ $b->fungsi }}" placeholder="Fungsi...">
                            <label for="" class="form-label">Tambah stok :</label>
                            <input required type="number" min={{ $b->stok }} class="form-control" value="{{ $b->stok }}" name="stok" placeholder="Stok obat...">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                          </div>
                      </form>
                        </div>
                      </div>
                    </div>
                @endforeach
            </table>
        </div>
    </div>
</div>     
@endsection