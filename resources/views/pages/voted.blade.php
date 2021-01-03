@extends('layouts.voted')
@push('style')
<style>
    .bg {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.card-title {
  color: #2E0E09;
}

.card-link {
  color: #2E0E09;
  opacity: .6;
}

.card-link {
  text-decoration: underline;
}

.card-link:hover {
  opacity: 1;
  color: #2E0E09;
}
</style>

    
@endpush


@section('content')

<div class="d-flex justify-content-center align-items-center justify-content-sm-center justify-content-md-center bg" style="background: url(&quot;assets/img/bg-image.jpeg&quot;) center / contain no-repeat;text-align: center;">
    <div class="card" style="margin-right: 20px;margin-left: 20px;background: rgba(255,255,255,0.88);text-align: center;">
        <div class="card-body" style="margin-right: 15px;margin-left: 15px;text-align: center;">
            <h4 class="card-title" style="text-align: center;">You voted successfully</h4>
            <p class="card-text"></p><a class="card-link" href="{{route('home')}}" style="font-weight: normal;font-size: 15px;letter-spacing: 0px;">Modify your vote</a>
        </div>
    </div>
</div>
@endsection



@push('script')
    
@endpush