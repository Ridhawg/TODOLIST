@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: cadetblue ">{{ __('To Do List') }}</div>

                <div class="card-body">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                        + Tambah Kegiatan
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambahkan Kegiatan Anda</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('simpan')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>hari</label>
                                            <select class="form-control" name="hari">
                                                <option value="senin">Senin</option>
                                                <option value="selasa">Selasa</option>
                                                <option value="rabu">Rabu</option>
                                                <option value="kamis">Kamis</option>
                                                <option value="jumat">Jumat</option>
                                                <option value="sabtu">Sabtu</option>
                                                <option value="minggu">Minggu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label><br>
                                            <input type="date" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <textarea class="form-control" name="kegiatan"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="belum">Belum</option>
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary mt-4" value="SIMPAN" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <br />
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Hari</td>
                            <td>Tanggal</td>
                            <td>Kegiatan</td>
                            <td>Status</td>
                            <td>Hapus</td>
                        </tr>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->hari}}</td>
                                <td>{{ $data->tanggal}}</td>
                                <td>{{ $data->kegiatan}}</td>
                                <td>
                                    @if($data->status == 'belum')
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'belum']) }}"
                                            class="btn btn-danger">Belum</a>
                                    @else
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'belum']) }}"
                                            class="btn btn-outline-danger">Belum</a>
                                    @endif

                                    @if($data->status == 'proses')
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'proses']) }}"
                                            class="btn btn-warning">Proses</a>
                                    @else
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'proses']) }}"
                                            class="btn btn-outline-warning">Proses</a>
                                    @endif

                                    @if($data->status == 'selesai')
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'selesai']) }}"
                                            class="btn btn-primary">Selesai</a>
                                    @else
                                        <a href="{{ route('ubahStatus', ['idkegiatan' => $data->id, 'status' => 'selesai']) }}"
                                            class="btn btn-outline-primary">Selesai</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('hapus/' . $data->id)}}" class="btn btn-danger">X</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection