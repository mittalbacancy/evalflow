<?php

  $img_url = (isset($item) ? $item->avatar : url('/') . config('variables.avatar.public') . 'avatar0.png');
  $val=str_random(40);

?>
<input type="hidden" name="email_verified_at" value="1">
<input type="hidden" name="verification_code" value={{$val}}>
{!! Form::text('text', 'name', 'Name <span>*</span>') !!}

<div class="form-group">
<label for="username">Username<span>*</span></label>
<input class="form-control" type="text" name="username" id="username" value="@if(isset($item['username'])){{$item['username']}}@endif">
</div>

Form::text('email', 'example@gmail.com');
{!! Form::text('text', 'mobile', 'Mobile <span>*</span>') !!}

<div class="form-group">
  <label for="address">Address<span>*</span></label>
  <input class="form-control" type="text" name="address" id="address" value="@if(isset($item['address'])){{$item['address']}}@endif">
</div>



<div class="form-group">
  <label for="social_insurance_number">Social Insurance Number</label>
  <input class="form-control" type="text" name="social_insurance_number" id="social_insurance_number" value="@if(isset($item['social_insurance_number'])){{$item['social_insurance_number']}}@endif">
</div>



@if(isset($item->id))
{!! Form::text('password', 'password', 'Password') !!}
{!! Form::text('password', 'password_confirmation', 'Password confirmation') !!}
@else
  {!! Form::text('password', 'password', 'Password <span>*</span>') !!}
  {!! Form::text('password', 'password_confirmation', 'Password confirmation <span>*</span>') !!}
@endif


{{--<div class="form-group">--}}
  {{--<label for="gender">Gender:</label>--}}
  {{--<select class="form-control" id="gender" name="gender">--}}
    {{--<option value="male" @if(isset($item)) @if($item['gender']=='male') selected @endif @endif>MALE</option>--}}
    {{--<option value="female" @if(isset($item)) @if($item['gender']=='female') selected @endif @endif>FEMALE</option>--}}
  {{--</select>--}}
{{--</div>--}}

@if(isset($item->id))
  @else
  {!! Form::mySelect('active', 'Active', config('variables.boolean')) !!}
@endif

{{--@if(isset($item->id))--}}
{{--{!! Form::myFileImage('avatar', 'Photo', $img_url) !!}--}}
{{--@else--}}
  {{--{!! Form::myFileImage('avatar', 'Photo <span>*</span>', $img_url) !!}--}}
{{--@endif--}}
