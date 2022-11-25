@extends('layouts.master')

@section('content')

<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
        </div>
        <form action="{{ route('Rombel.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Tingkat :</label>
          <select name="tingkat" id="" class="form-control" required>
            <option value="">--PILIH--</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
          <label for="" class="form-label">Jurusan :</label>
          <input required type="text" name="jurusan" class="form-control" placeholder="Jurusan...">
          <label for="" class="form-label">Nama Pembimbing :</label>
          <input required type="text" class="form-control" name="ketua_produktif" placeholder="Pembimbing...">
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
<div class="alert alert-danger">
    <p>{{ $msg }}</p>
</div>
@endif
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Data <b>Rombel</b></h2>
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
                        <th>Nama Rombel</th>						
                        <th>Pembimbing</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                @foreach ($Rombel as $b)
                <tbody>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->jurusan }}</td>
                    <td>{{ $b->ketua_produktif }}</td>
                    <td>   
                      <form action="{{ route('Rombel.destroy', $b->id) }}" method="post">
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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Rombel</h5>
                        </div>
                        <form action="{{ route('Rombel.store') }}" method="POST">
                
                            @csrf
                        <div class="modal-body">
                          <label for="" class="form-label">Jurusan :</label>
                          <input required type="text" value="{{ $b->jurusan }}" name="jurusan" class="form-control" placeholder="Jurusan...">
                          <label for="" class="form-label">Nama Pembimbing :</label>
                          <input required type="text" class="form-control" value="{{ $b->ketua_produktif }}" name="ketua_produktif" placeholder="Pembimbing...">
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