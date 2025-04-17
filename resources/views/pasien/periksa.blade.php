@extends('layout.app')

<<<<<<< HEAD
@section('title', 'Buat Janji Periksa')

@section('content')
<div class="container mt-4">
    <h3>Buat Janji Periksa</h3>

    {{-- Form Buat Janji --}}
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">Form Buat Janji</div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pasien.periksa.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="id_d Paulaokter">Pilih Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-control @error('id_dokter') is-invalid @enderror" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}" {{ old('id_dokter') == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_dokter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="datetime-local" name="tgl_periksa" id="tgl_periksa" class="form-control @error('tgl_periksa') is-invalid @enderror" value="{{ old('tgl_periksa') }}" required>
                    @error('tgl_periksa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Janji</button>
            </form>
        </div>
    </div>

    {{-- Riwayat Periksa --}}
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Riwayat Periksa</div>
        <div class="card-body">
            @if ($riwayat->isEmpty())
                <p>Belum ada riwayat periksa.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dokter</th>
                            <th>Tanggal</th>
                            <th>Biaya</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->dokter->nama ?? 'Dokter Tidak Ditemukan' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->isoFormat('dddd, D MMMM Y, HH:mm') }}</td>
                                <td>
                                    @if ($item->biaya_pemeriksaan > 0)
                                        Rp {{ number_format($item->biaya_pemeriksaan, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->biaya_pemeriksaan > 0 && $item->catatan)
                                        <span class="badge bg-success">Sudah Diperiksa</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Menunggu Pemeriksaan</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
=======
@section('title','Periksa')

@section('nav-item')
<li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-hospital"></i>
                  <p>Periksa</p>
                </a>
              </li>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Periksa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Periksa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Periksa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <div class="form-group">
                  <label for="exampleSelectBorder">Dokter</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    <option>Pilih Dokter</option>
                    <option>Dokter 1</option>
                    <option>Dokter 2</option>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Periksa</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Dokter</th>
                      <th>Tanggal</th>
                      <th>Biaya Periksa</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Test</td>
                      <td>Test</td>
                      <td>Test</td>
                      <td>Test</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
>>>>>>> 93e6fae (Tugas Bengkod3)
@endsection