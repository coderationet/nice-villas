<div class="form-group">
    <label for="{{$input_name}}">{{$title}}</label>
    <input type="text" class="form-control" id="{{$input_name}}"
           name="{{$input_name}}"
           @isset($item)
               value="{{$item->$input_name}}"
           @endif
           required
           @isset($placeholder)
               placeholder="{{$placeholder}}">
          @endisset
</div>
