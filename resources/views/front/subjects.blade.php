@extends('front.layouts.app')
@section('main')

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Subjects</h2>
        <div class="row pt-5">

            @if ($subjects->isNotEmpty())
                @foreach ($subjects as $subject)
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <p class="mb-0 text-white">{{ $subject->discipline->name ?? '' }}</p>
                            <h4 class="pb-2 text-success">{{ $subject->name }}</h4>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection