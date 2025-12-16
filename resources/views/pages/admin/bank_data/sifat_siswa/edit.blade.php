<!-- Modal -->
<div class="modal fade modal-icon" id="editSifatSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSifatSiswaModalLabel">Edit Sifat Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        {{-- <form action="{{ route('sifatSiswa.update', $id_siswa) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') --}}

            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Sifat <span style="color:red">*</span></label>
                        </div>
                        <div class="col-md-12">
                            {{-- <input type="checkbox" name="status"  {{ $blog->status ? 'checked' : '' }}/>
                             --}}
                            @foreach ($sifatMaster as $sifatMaster)
                                {{-- @foreach ($sifatTerpilih2 as $sifatTerpilih2) --}}
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            {{-- <input type="checkbox" value="1" name="status" id="status" {{ $muhasabah->status=='1' ? 'checked': '' }}/> --}}
                                            {{-- <input type="checkbox" value="{{ $sifatTerpilih2->id }}" name="status" id="status" {{ $sifatMaster->id == $sifatTerpilih2->id ? 'checked': '' }}/> --}}
                                            {{-- <input type="checkbox" name="id_sifat[]" id="id_sifat[]" value="1" {{ $sifatTerpilih2->id == $sifatMaster->id ? 'checked': '' }}/> --}}
                                            <input type="checkbox" name="id_sifat[]" id="id_sifat[]" value="{{ $sifatTerpilih2->id }}"/>
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">{{ $sifatMaster->judul }}</span>
                                        </label>
                                    </div>
                                {{-- @endforeach --}}
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label">Sifat Terpilih <span style="color:red">*</span></label>
                        </div>
                        <div class="col-md-12">
                            {{-- @foreach ($sifatTerpilih2 as $sifatTerpilih2)
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox">
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">{{ $sifatTerpilih2->sifat->judul }}</span>
                                    </label>
                                </div>
                            @endforeach --}}
                        </div>
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
