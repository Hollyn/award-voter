@extends('layouts.app')
@push('style')
    <style>
       [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img,  [type=radio] + .candidate-name span{
        cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
        outline: 2px solid #f00;
        }
    </style>
@endpush


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="user">
            <h6 class="user-name">{{Auth::user()->name}}</h6>
        </div>
        <div class="rule">
            <h2>Rules</h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis suscipit voluptatum culpa obcaecati velit hic dignissimos repellat, quibusdam excepturi dolorum saepe amet nostrum dolore cupiditate fuga ratione sint rerum provident?
            </p>
        </div>
        <form action="" method="POST">
            {{ csrf_field() }}
            @foreach ($candidateCategoryNames as $categoryName => $candidates)    
                <div class="category ">
                    <div class="category-title row">
                        <h4 class="title">{{$categoryName}}</h4>
                    </div>
                    <div class="container-candidate row">
                            @foreach ($candidates as $candidateName => $relationId)
                            <div class="candidate text-center col-12 col-sm-6 col-md-4 col-lg-3 ">
                                <label>
                                    <input type="radio" name="{{$categoryName}}" <?php echo (in_array($relationId, $votes)) ? 'checked' : '' ?> value="{{$relationId}}" >
                                
                                    <img src="{{asset('assets/images/default-avatar.jpg')}}">
                                    
                                    <div class="candidate-name">
                                        <span>{{$candidateName}}</span>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                      
                    </div>
                </div>
            @endforeach
            <div class="text-center submit-container">
                <button class="btn btn-success btn-md">Vote</button>
            </div>
        </form>

    </div>
@endsection



@push('script')
    
@endpush