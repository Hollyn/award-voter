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

<div class="coverBackground" style="width: 100%;height: 100%;"></div>
<div class="features-clean" style="background: rgba(255,255,255,0);">
    <div class="container">
        <div class="row">
            <div class="col"><span class="text-capitalize">{{__(Auth::user()->name)}}</span></div>
            <div class="col align-self-center" style="text-align: right;"><a href="{{url('logout')}}" style="color: var(--gray);">Logout</a></div>
        </div>
        <div class="col" style="text-align: center;padding-right: 15px;padding-bottom: 3px;padding-top: 3px;"><span style="font-style: normal;font-weight: normal;">Deadline :&nbsp;</span><span>January 3rd, 2021 00:00:00</span></div>
        <div class="text-center">
            <h4>Rules</h4>
            <p>You should give your vote before the time limit. You can always change your vote by logging in (It must be done before the deadline).</p>
        </div>

        <form action="" method="POST">
            {{ csrf_field() }}
        @foreach ($candidateCategoryNames as $categoryName => $candidates)    

            <div class="row features" style="margin-bottom: 20px;">
                <div class="col-12">
                    <h5 class="text-left">{{$categoryName}}</h5>
                    <hr style="height: 0px;border: 2px solid var(--dark);margin-top: 0px;">
                </div>
                <?php $is_neutral = true; ?>
                @foreach ($candidates as $candidateName => $relationId)
                    <?php 
                        $checked = '';
                        if (in_array($relationId, $votes)){
                            $checked = 'checked';
                            $is_neutral = false;
                        }  ?>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 text-center align-self-center item" style="padding: 0px;">
                        
                        <label>
                            <input type="radio" name="{{$categoryName}}" <?php echo $checked ?> value="{{$relationId}}" >
                        
                            <img height="100" src="{{asset('assets/images/default-avatar.png')}}">

                            <p class="description">{{$candidateName}}</p>

                        </label>
                    </div>
                @endforeach
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 text-center align-self-center item" style="padding: 0px;">
                        
                    <label>
                        <input type="radio" name="{{$categoryName}}" <?php echo ($is_neutral) ? 'checked' : '' ?> value="neutral" >
                    
                        <img height="100" style="opacity: .5" src="{{asset('assets/images/neutral-icon.png')}}">

                        <p class="description">{{__('Neutral')}}</p>

                    </label>
                </div>
            </div>
        @endforeach

        <div class="text-center submit-container">
            <button class="btn btn-success btn-md">Vote</button>
        </div>
        </form>
    </div>
</div>
@endsection



@push('script')
    
@endpush