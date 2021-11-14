@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <form action="{{ url('kecamatan') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan ...">
                                <div class="text-danger">
                                    @error('kecamatan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" name="warna" class="form-control" placeholder="Warna ...">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    @error('warna')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>GEO-JSON</label>
                            <textarea class="form-control" name="geojson" id="" rows="5" placeholder="Geo-Json ..."></textarea>
                            <div class="text-danger">
                                @error('geojson')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- bootstrap color picker -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- color picker with addon -->
    <script>
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-layer-group').css('color', event.color.toString());
        })
    </script>
@endsection