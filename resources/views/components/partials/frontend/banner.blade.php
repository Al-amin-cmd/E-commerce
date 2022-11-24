@props(['banners'=>[],])
@foreach($banners as $banner)
<div class="hero__item set-bg pb-5" style="" data-setbg="{{ asset('storage/banners/' . $banner->image) }}">
    <div class="hero__text">
        <span>{{ $banner->title }}</span>
        <h2>{{ $banner->sub_title_one }} <br />{{ $banner->sub_title_two }}</h2>
        <p>{{ $banner->discretion }}</p>
        <a href="#" class="primary-btn">{{ $banner->button }}</a>
    </div>
</div>
@endforeach