<form action="{{ route('muhasabah.updateHarianku', $muhasabahku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        @foreach ($muhasabahkuDetailOther as $muhasabahkuDetailOther)
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="checkbox-fade fade-in-primary">
                        <label>
                            <input type="checkbox" checked disabled>
                            <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span class="text-inverse">{{ $muhasabahkuDetailOther->masterMuhasabah->judul }}</span>
                        </label>
                        @error('status{{ $muhasabahkuDetailOther->id }}')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($muhasabahMasterOther as $muhasabahMasterOther)
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="checkbox-fade fade-in-primary">
                        <label>
                            <input type="checkbox" value="{{ $muhasabahMasterOther->id }}"
                                name="status{{ $muhasabahMasterOther->id }}" id="status{{ $muhasabahMasterOther->id }}">
                            <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span class="text-inverse">{{ $muhasabahMasterOther->judul }}</span>
                        </label>
                        @error('status{{ $muhasabahMasterOther->id }}')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <input type="hidden" class="form-control @error('id_muhasabah') is-invalid @enderror" name="id_muhasabah"
        id="id_muhasabah" value="{{ $muhasabahku->id }}" required readonly>
    <input type="hidden" class="form-control @error('id_user') is-invalid @enderror" name="id_user" id="id_user"
        value="{{ auth()->user()->id }}" required readonly>
    <input type="hidden" class="form-control @error('hari_ini') is-invalid @enderror" name="hari_ini" id="hari_ini"
        value="{{ $muhasabahku->tgl_muhasabah }}" required readonly>

    <button type="submit" class="btn btn-success btn-round btn-sm">Submit</button>
</form>
