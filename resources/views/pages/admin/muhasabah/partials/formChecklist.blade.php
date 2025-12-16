<div class="row">
    @foreach ($muhasabahMaster as $muhasabahMaster)
        <div class="col-lg-6">
            <div class="form-group">
                <div class="checkbox-fade fade-in-primary">
                    <label>
                        <input type="checkbox" value="{{ $muhasabahMaster->id }}" name="status{{ $muhasabahMaster->id }}"
                            id="status{{ $muhasabahMaster->id }}">
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
