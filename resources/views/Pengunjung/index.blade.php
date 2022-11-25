@extends('layouts.master')

@section('content')

<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengunjung</h5>
        </div>
        <form action="{{ route('Pengunjung.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">NIS :</label>
          <input required type="number" min=1 name="NIS" class="form-control" placeholder="NIS...">
          <label for="" class="form-label">Nama Pengunjung :</label>
          <input required type="text" class="form-control" name="nama" placeholder="Nama...">
          <label for="" class="form-label">Rayon :</label>
          <select name="rayon" class="selectpicker form-control" data-live-search="true">
            <option>--PILIH--</option>
            @foreach ($rayon as $c)
            <option value="{{ $c->nama_rayon }}">{{ $c->nama_rayon }}</option>
            @endforeach
          </select>
          <label for="" class="form-label">rombel :</label>
          <select name="rombel" class="selectpicker form-control" data-live-search="true">
            <option>--PILIH--</option>
            @foreach ($rombel as $c)
            <option value="{{ $c->jurusan }}">{{ $c->jurusan }}</option>
            @endforeach
          </select>
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
                        <h2>Data <b>Pengunjung</b></h2>
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
                        <th>NIS</th>						
                        <th>Nama</th>
                        <th>Rayon</th>
                        <th>Rombel</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                @foreach ($Pengunjung as $b)
                <tbody>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->NIS }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->rayon }}</td>
                    <td>{{ $b->rombel }}</td>
                    <td>   
                      <form action="{{ route('Pengunjung.destroy', $b->id) }}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pengunjung</h5>
                          </div>
                          <form action="{{ route('Pengunjung.update', $b->id) }}" method="POST">
                  
                              @csrf
                              @method('PUT')
                          <div class="modal-body">
                            <label for="" class="form-label">NIS :</label>
                            <input required type="number" min=1 name="NIS" value="{{ $b->NIS }}" class="form-control" placeholder="NIS...">
                            <label for="" class="form-label">Jenis :</label>
                            <input required type="text" class="form-control" name="nama" value="{{ $b->nama }}" placeholder="Nama...">
                            <label for="" class="form-label">Rayon :</label>
                            <select name="rayon" id="" class="form-control">
                                <option value="{{ $b->rayon }}">{{$b->rayon}}</option>
                                @foreach ($rayon as $c)
                                  <option value="{{ $c->nama_rayon }}">{{ $c->nama_rayon }}</option>
                                @endforeach
                            </select>
                            <label for="" class="form-label">rombel :</label>
                            <select name="rombel" id="" class="form-control">
                                <option value="{{ $b->rombel }}">{{ $b->rombel }}</option>
                                @foreach ($rombel as $c)
                                  <option value="{{ $c->jurusan }}">{{ $c->jurusan }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                          </div>
                      {{-- </form> --}}
                        </div>
                      </div>
                    </div>
                @endforeach
            </table>
        </div>
                            
    
    </div>
</div>     
@endsection