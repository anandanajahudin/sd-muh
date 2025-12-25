<a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
</a>

@php
    // if (!empty($berita->slug)) {
    //     // PAKAI SLUG
    //     switch ($berita->jenis) {
    //         case 'berita':
    //             $landingUrl = route('newsDetailSlug', $berita->slug);
    //             break;
    //         case 'agenda':
    //             $landingUrl = route('agendaDetailSlug', $berita->slug);
    //             break;
    //         case 'opini':
    //             $landingUrl = route('opiniDetailSlug', $berita->slug);
    //             break;
    //         case 'tv':
    //             $landingUrl = route('tvDetailSlug', $berita->slug);
    //             break;
    //         default:
    //             $landingUrl = '#';
    //     }
    // } else {
    //     // TANPA SLUG → PAKAI ID
    //     switch ($berita->jenis) {
    //         case 'berita':
    //             $landingUrl = route('newsDetail', $berita->id);
    //             break;
    //         case 'agenda':
    //             $landingUrl = route('agendaDetail', $berita->id);
    //             break;
    //         case 'opini':
    //             $landingUrl = route('opiniDetail', $berita->id);
    //             break;
    //         case 'tv':
    //             $landingUrl = route('tvDetail', $berita->id);
    //             break;
    //         default:
    //             $landingUrl = '#';
    //     }
    // }
@endphp

@php
    $landingUrl = $berita->landingUrl();
@endphp

<a href="{{ $landingUrl }}" target="_blank" class="btn btn-sm btn-success">
    <i class="fas fa-eye"></i> Lihat di Website
</a>

<button type="button"
    class="btn btn-sm btn-dark"
    onclick="copyLandingUrl()">
    <i class="fas fa-link"></i> Salin Link
</button>

<input type="hidden" id="landingUrl" value="{{ $landingUrl }}">

{{-- ==================== --}}
{{-- Update berita --}}
{{-- ==================== --}}

@if (auth()->user()->jenis == 'Kepala Sekolah' ||
        auth()->user()->jenis == 'admin' ||
        auth()->user()->jenis == 'Bendahara')
    @if ($berita->gambar != null)
        @if ($berita->jenis == 'agenda')
            @if (file_exists('repo/berita/dataAgenda/' . $berita->id . '/' . $berita->gambar))
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Ganti Gambar</button>
            @else
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Upload Gambar</button>
            @endif
        @elseif ($berita->jenis == 'berita')
            @if (file_exists('repo/berita/dataBerita/' . $berita->id . '/' . $berita->gambar))
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Ganti Gambar</button>
            @else
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Upload Gambar</button>
            @endif
        @elseif ($berita->jenis == 'opini')
            @if (file_exists('repo/berita/dataOpini/' . $berita->id . '/' . $berita->gambar))
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Ganti Gambar</button>
            @else
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Upload Gambar</button>
            @endif
        @else
            @if (file_exists('repo/berita/dataTv/' . $berita->id . '/' . $berita->gambar))
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Ganti Gambar</button>
            @else
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#editGambarModal">Upload Gambar</button>
            @endif
        @endif
    @else
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
            data-target="#editGambarModal">Upload Gambar</button>
    @endif
@else
@endif

<button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
    data-target="#editBeritaModal">Ubah Data</button>

<form action="{{ route('berita.destroy', $berita->id) }}" class="d-inline" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="deleteFunction()">Hapus</button>
</form>


<script>
    function copyLandingUrl() {
        const input = document.getElementById('landingUrl');
        input.type = 'text';
        input.select();
        input.setSelectionRange(0, 99999); // mobile support
        document.execCommand('copy');
        input.type = 'hidden';

        alert('Link berita berhasil disalin!');
    }
</script>
