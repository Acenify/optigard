@extends('frontend.layout.index')

@section('content')
<style>
    @media only screen and (max-width: 600px) {
        #ubah{
           height: 40vh;
           padding-bottom: 0;
           padding-top: 25vh;
        }
    }
</style>

<section id="ubah" class="page-title-sectition" style="background-image:url('{{ asset('assets/frontend/assets/banner-bg.png') }}'); background-size: cover; background-position: bottom center;">
    <div class="auto-container">
        <h2 class="page-title">Gallery</h2>
        <ul class="page-breadcrumb">
            <li><a href="{{ url('/') }}">home</a></li>
            <li>Gallery</li>
        </ul>
    </div>
</section>

<section class="projects-2-section">
    <div class="auto-container">
        <div class="sec-title-area text-center">
            <div class="sub-title s-two">latest work</div>
            <h2 class="sec-title mb_10">Our Projects</h2>
            <div class="title-desc mb_60">
                Production Adopting high-end pressure-sensitive adhesive layer and grinding process, the products have super high level in breathability, heat insulation, protection, communication, privacy and durability. At the same time, we are more cautious in the selection of materials for our products, and use environmentally friendly materials without formaldehyde or harmful substances. Let you in the use of film, no need to worry about the harm of formaldehyde.
            </div>
        </div>

        <div
            class="row justify-content-center align-items-center g-2"
        >
            <div class="col">
                <img
                    src="{{ asset('assets/frontend/assets/project-image-1.png')}}"
                    class="img-fluid rounded-top"
                    alt=""
                />

            </div>
            <div class="col">
                <img
                    src="{{ asset('assets/frontend/assets/project-image-2.png')}}"
                    class="img-fluid rounded-top"
                    alt=""
                />

            </div>
            <div class="col">
                <img
                    src="{{ asset('assets/frontend/assets/project-image-3.png')}}"
                    class="img-fluid rounded-top"
                    alt=""
                />

            </div>
            <div class="col">
                <img
                    src="{{ asset('assets/frontend/assets/project-image-4.png')}}"
                    class="img-fluid rounded-top"
                    alt=""
                />

            </div>
        </div>


        {{-- <div class="row">
            @forelse ($galleries as $g)
                <div class="col-lg-4 col-md-6">
                    <div class="projects-2-block">
                        <div class="projects-2-image">
                            <img src="{{ asset('assets/galeri/'.$g->galeri_img) }}"
                                 alt="{{ $g->galeri_judul }}" style="border:1px solid #ddd">
                            <div class="projects-2-category mt-2">{{ $g->galeri_judul }}</div>
                            <h4 class="projects-2-title">{{ $g->galeri_desc }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada data galeri.</p>
                </div>
            @endforelse
        </div>

        @if(method_exists($galleries, 'links'))
            <div class="mt-4 d-flex justify-content-center">
                {{ $galleries->links() }}
            </div>
        @endif --}}
    </div>
</section>
@endsection
