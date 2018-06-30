@include('post._modal')


<div class="card">
  <div class="card-body">
    <div class="form-module-card">
      <div class="row">
        <div class="col-md-10">
          <h5 class="card-title">Заголовок: {{$post->title}}</h5>
        </div>
        <button id="button" data-toggle="modal" data-target="#myModal" class="btn btn-info">Карта</button>
      </div>
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
          <div class="swiper-slide" style="background-image:url({{asset('images/body_bg.jpg')}})"></div>
        </div>
      </div>

      <div class="container" id="usrInfo">
        <p class="card-text">Коментар {{$post->comments}}</p>
        <p class="card-text">
          <small class="text-muted">Користувач
            {{$post->username}} Дата
            ({{ Carbon\Carbon::parse($post->created_at)->format('d-m-y') }})
          </small>
        <div class="cords" style="visibility: hidden">
          data-lat="{{$post->lat}}"
          data-lng="{{$post->lng}}"
        </div>
      </div>
    </div>
  </div>
</div>