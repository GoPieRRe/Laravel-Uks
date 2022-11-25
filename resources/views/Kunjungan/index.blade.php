@extends('layouts.master')

@section('content')

<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kunjungan</h5>
        </div>
        <script >
            function yesnocheck() {
                if (document.getElementById('yes').checked) {
                    document.getElementById('ifyes').style.display = 'block';
                }else{
                    document.getElementById('ifyes').style.display = 'none';
                }
            }

            function yescheck() {
              if (document.getElementById('yes1')) {
                document.getElementById('ifyes').style.display = 'block';
              }else{
                document.getElementById('ifyes').style.display = 'none';
              }
            }
        </script>
        <form action="{{ route('Kunjungan.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">NIS :</label>
          <select required name="NIS" class="selectpicker form-control" data-live-search="true">
            <option value="">--PILIH NIS--</option>
            @foreach ($Pengunjung as $i)
            <option value="{{ $i->NIS }}">{{ $i->NIS }} || {{ $i->nama }}</option>    
            @endforeach
          </select>
          <label for="" class="form-check-label">Keperluan :</label>
          <br>
          <input type="radio"style="margin-left:2px" name="keperluan" class="form-check-input" onclick="javascript:yesnocheck();" id="yes" value="minta obat">
          <label for="yes" style="margin-left:25px">Minta Obat</label>
          <br>
          <input type="radio"style="margin-left:2px" name="keperluan" class="form-check-input" onclick="javascript:yesnocheck();" id="no" value="istirahat">
          <label for="no"style="margin-left:25px" class="form-check-label">Istirahat</label>
          <br>
          <input type="radio"style="margin-left:2px" name="keperluan" class="form-check-input" onclick="javascript:yescheck();" id="yes1" value="istirahat dan minta obat">
          <label for="no"style="margin-left:25px" class="form-check-label">Istirahat dan minta obat</label>
          <br>
          <div id="ifyes" style="display: none">
            <label for="nobat">Nama Obat :</label>
            <select name="nama_obat" id="nobat" class="form-control">
                <option value="-">--PILIH--</option>
                @foreach ($Obat as $i)
                <option value="{{ $i->nama_obat }}">{{ $i->nama_obat }} => {{ $i->stok }}</option>    
                @endforeach
            </select>
            <br>
            <input type="number" name="stok" min=0 class="form-control" placeholder="Stok...." id="">
          </div>
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
                        <h2>Data <b>Kunjungan</b></h2>
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
                        <th>Tanggal Kunjungan</th>
                        <th>Keperluan</th>
                        <th>Nama Obat</th>
                        <th>Stok Obat</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                @foreach ($Kunjungan as $b)
                <tbody>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->NIS }}</td>
                    <td>{{ $b->tgl_kunjungan }}</td>
                    <td>{{ $b->keperluan }}</td>
                    <td>{{ $b->nama_obat }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>   
                      <form action="{{ route('Kunjungan.destroy', $b->id) }}" method="post">
                        {{-- <button type="button" type="button" data-toggle="modal" data-target="#exampleModal{{ $b->id }}" class="btn btn-warning"><img src="{{ asset('icon/pen-fill.svg') }}" alt=""></button>				 --}}
                        <button type="button" type="button" data-toggle="modal" data-target="#exampleModall{{ $b->id }}" class="btn btn-primary"><img src="{{ asset('icon/eye.svg') }}" alt=""></button>				    
                        
                          @method('DELETE')
                          @csrf
                            
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin menghapus data ini {{ $b->NIS }}??')"><img src="{{ asset('icon/trash-fill.svg') }}" alt=""></button>
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
                            <label for="" class="form-label">stok :</label>
                            <input required type="number" min=1 class="form-control" value="{{ $b->stok }}" name="stok" placeholder="Stok obat...">
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

{{-- SHOW  --}}
@foreach ($view as $b)
<div class="py-2">
  <!-- Modal -->
  <div class="modal fade" id="exampleModall{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Kunjungan</h5>
        </div>
        <div class="modal-body">
          <label for="" class="form-label">NIS : <b>{{ $b->NIS }}</b></label>
          <br>
          <label for="" class="form-label">Nama siswa : {{ $b->nama }}</label>
          <br>
          <label for="" class="form-label">Rayon : {{ $b->rayon }}</label>
          <br>
          <label for="" class="form-label">Rombel : {{ $b->rombel }}</label>
          <br>
          <label for="" class="form-label">Tanggal kunjungan : {{ $b->tgl_kunjungan }}</label>
          <br>
          <label for="" class="form-label">Keperluan : {{ $b->keperluan }}</label>
          <br>
          <label for="" class="form-label">Nama Obat : {{ $b->nama_obat }}</label>
          <br>
          <label for="" class="form-label">Banyak obat : {{ $b->stok }}</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection