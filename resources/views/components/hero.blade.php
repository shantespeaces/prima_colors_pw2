
@props(["image"])

<section class="hero">
    <div class="conteneur-hero">
        <img class="image-hero" src="{{$image}}" alt="image du héro">
        <x-bannieres.countdown class="petit"/>
    </div>
</section>
