<form action="{{ route('muhasabah.storeHarianku') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        @foreach ($muhasabahMaster as $muhasabahMaster)
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="checkbox-fade fade-in-primary">
                        <label>
                            <input type="checkbox" value="{{ $muhasabahMaster->id }}"
                                name="status{{ $muhasabahMaster->id }}" id="status{{ $muhasabahMaster->id }}">
                            <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span class="text-inverse">{{ $muhasabahMaster->judul }}</span>
                        </label>
                        @error('status{{ $muhasabahMaster->id }}')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <input type="hidden" class="form-control @error('id_user') is-invalid @enderror" name="id_user" id="id_user"
        value="{{ auth()->user()->id }}" required readonly>
    <input type="hidden" class="form-control @error('hari_ini') is-invalid @enderror" name="hari_ini" id="hari_ini"
        value="{{ $hariIni }}" required readonly>

    <button type="submit" class="btn btn-success btn-round btn-sm">Submit</button>
</form>
