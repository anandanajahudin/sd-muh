@extends('layout.guest.main')
@section('content-title', 'Agenda 24')

@section('content')
    <section class="agenda" id="agenda">
        <div class="container">
            <header class="section-header">
                <p>AGENDA <span class="blog" style="color: #f68c09">24</span></p>
            </header>
            <div class="row">
                @foreach ($agenda as $agenda)
                    <!--ADD CLASSES HERE d-flex align-items-stretch-->
                    <div class="col-lg-3 mb-3 d-flex align-items-stretch">
                        <a href="{{ route('agendaDetail', $agenda->id) }}">
                            <div class="card">
                                <img src="{{ asset('repo/berita/dataAgenda/' . $agenda->id . '/' . $agenda->gambar) }}"
                                    class="card-img-top" style="width: 100%; height: 15vw; object-fit: cover;"
                                    alt="Card Image">
                                <div class="card-body d-flex flex-column">
                                    <span class="post-date mb-2" style="color: #f68c09">
                                        <i class="fas fa-user-alt"></i> {{ $agenda->userPost->name }}
                                        &nbsp;/&nbsp; <i class="fas fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($agenda->created_at)) }}
                                    </span>
                                    <h5 class="card-title mt-2">{{ $agenda->judul }}</h5>
                                    <a href="#" class="mt-auto align-self-start"></a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
