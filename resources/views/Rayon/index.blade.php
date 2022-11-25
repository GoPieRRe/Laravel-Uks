@extends('layouts.master')

@section('content')

<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Rayon</h5>
        </div>
        <form action="{{ route('Rayon.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Nama Rayon :</label>
          <input required type="text" name="nama_rayon" class="form-control" placeholder="Nama Rayon...">
          <label for="" class="form-label">Nama Pembimbing :</label>
          <input required type="text" class="form-control" name="pembimbing" placeholder="Pembimbing...">
          <label for="" class="form-label">No HP Pembimbing :</label>
          <input required type="text" class="form-control" name="no_hp" placeholder="+62 8xx-xxxx-xxxx">
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
                        <h2>Data <b>Rayon</b></h2>
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
                        <th>Nama Rayon</th>						
                        <th>Pembimbing</th>
                        <th>NO HP Pembimbing</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                @foreach ($Rayon as $b)
                <tbody>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->nama_rayon }}</td>
                    <td>{{ $b->pembimbing }}</td>
                    <td>{{ $b->no_hp }}</td>
                    <td>   
                      <form action="{{ route('Rayon.destroy', $b->id) }}" method="post">
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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Rayon</h5>
                        </div>
                        <form action="{{ route('Rayon.update',$b->id) }}" method="POST">
                
                            @csrf
                            @method('PUT')
                        <div class="modal-body">
                          <label for="" class="form-label">Nama Rayon :</label>
                          <input required type="text" name="nama_rayon" value="{{ $b->nama_rayon }}" class="form-control" placeholder="Nama Rayon...">
                          <label for="" class="form-label">Nama Pembimbing :</label>
                          <input required type="text" class="form-control" value="{{ $b->pembimbing }}" name="pembimbing" placeholder="Pembimbing...">
                          <label for="" class="form-label">No HP Pembimbing :</label>
                          <input required type="text" class="form-control" value="{{ $b->no_hp }}" name="no_hp" placeholder="+62 8xx-xxxx-xxxx">
                          {{-- <label for="" class="form-label">Rayon :</label>
                          <select name="rayon" id="" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="AL-IKROM 1">AL-IKROM 1</option>
                            <option value="AL-IKROM 2">AL-IKROM 2</option>
                            <option value="AL-IKROM 3">AL-IKROM 3</option>
                          </select> --}}
                          {{-- <label for="" class="form-label">rombel :</label>
                          <select name="rombel" id="" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="XII-RPL">XII-RPL</option>
                            <option value="XII-TKJ">XII-TKJ</option>
                            <option value="XII-BDP">XII-BDP</option>
                            <option value="XII-HTL">XII-HTL</option>
                          </select> --}}
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