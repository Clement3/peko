@if ($data)
<div style="height : 200px; overflow: hidden;" class="container">
    <div style="height : 200px;" id="homeSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($data as $key => $slider)
                @if($key === 0)
                    <li data-target="#homeSlider" data-slide-to="{{ $key }}" class="active"></li>
                @else
                    <li data-target="#homeSlider" data-slide-to="{{ $key }}"></li>
                @endif
            @endforeach
        </ol>
        <div style="height : 200px;" class="carousel-inner">
            @foreach($data as $key => $slider)
                @if($key === 0)
                <div class="overlay-slider carousel-item active">
                    <img class="d-block w-100" src="{{ asset('image/slider/'.$slider->picture) }}" alt="{{ $slider->title }}">
                    <div class="carousel-caption d-md-block">
                        <h3>{{ $slider->title }}</h3>
                        <p>{{ $slider->body }}</p>
                    </div>
                </div>
                @else
                <div class="overlay-slider carousel-item">
                    <img class="d-block w-100" src="{{ asset('image/slider/'.$slider->picture) }}" alt="{{ $slider->title }}">
                    <div class="carousel-caption d-md-block">
                        <h3>{{ $slider->title }}</h3>
                        <p>{{ $slider->body }}</p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#homeSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endif