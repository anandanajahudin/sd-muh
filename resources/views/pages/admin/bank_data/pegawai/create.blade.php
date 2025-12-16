<!-- Modal -->
<div class="modal fade modal-icon" id="addPegawaiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPegawaiModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Penerimaan Pegawai</label>
                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror"
                            placeholder="Tanggal Penerimaan Pegawai" name="tgl_masuk" id="tgl_masuk"
                            value="{{ old('tgl_masuk') }}">
                        @error('tgl_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">NBM</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                id="nip" oninput="nipNumbers(this.value)" placeholder="19xxxxxx"
                                value="{{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">NIK <span style="color:red">*</span></label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                id="nik" oninput="nikNumbers(this.value)" placeholder="35xxxxxxx"
                                value="{{ old('nik') }}" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender <span style="color:red">*</span></label>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" value="L" checked>
                            <label class="form-check-label" for="L">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check ml-4">
                            <input class="form-check-input" type="radio" name="gender" value="P">
                            <label class="form-check-label" for="P">
                                Perempuan
                            </label>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Tempat Lahir <span style="color:red">*</span></label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                placeholder="Surabaya" name="tempat_lahir" id="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tanggal Lahir <span style="color:red">*</span></label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir"
                                value="{{ old('tgl_lahir') }}" required>
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No.Handphone/Whatsapp <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp" id="no_hp" oninput="phoneNumbers(this.value)" placeholder="085xxxx"
                            value="{{ old('no_hp') }}" required />
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat <span style="color:red">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                            required></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Username <span style="color:red">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="ahmadjoko90" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Email <span style="color:red">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Email Pegawai"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Password <span style="color:red">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password pegawai"
                                value="{{ old('password') }}" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Jenis <span style="color:red">*</span></label>
                            {{-- <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" required>
                                <option selected disabled>Pilih jenis pegawai</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="kepsek">Kepala Sekolah</option>
                            </select> --}}

                            <input class="form-control @error('jenis') is-invalid @enderror" list="datalistOptions"
                                name="jenis" id="jenis" placeholder="Jenis Pegawai">
                            <datalist id="datalistOptions">
                                @foreach ($jenisPegawai as $jenisPegawai)
                                    <option value="{{ $jenisPegawai->jenis }}">
                                        {{ ucfirst($jenisPegawai->jenis) }}
                                    </option>
                                @endforeach
                                {{-- <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="kepsek">Kepala Sekolah</option> --}}
                            </datalist>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function phoneNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('no_hp');
        inputResult.value = text;
    }

    function nikNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nik');
        inputResult.value = text;
    }

    function nipNumbers(text) {
        text = text.replace(/[^0-9]/g, '');
        var inputResult = document.getElementById('nip');
        inputResult.value = text;
    }
</script>
