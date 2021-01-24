<div class="box box-info padding-1">
    <div class="box-body">
    
        <div class="form-group">
            {{ Form::label('lookup type') }}
 
       <select class="form-control form-control-sm" name="lookuptypeId">
             <option value="">Select lookup type</option>
             @foreach ($lookupTypes as $item)
             <option value="{{ $item->ltId }}" {{ ( $item->Item_code == $selected) ? 'selected' : '' }}> {{ $item->description_en }} </option>
             @endforeach  
           </select> 
           {!! $errors->first('lookuptypeId', '<div class="invalid-feedback">:message</p>') !!}
         </div>

        <div class="form-group">
            {{ Form::label('English Description') }}
            {{ Form::textarea('description_am', $lookup->description_am, ['class' => 'form-control' . ($errors->has('description_am') ? ' is-invalid' : ''), 
            'placeholder' => 'Description Am',
            'rows'=>'4'
            ]) }}
            {!! $errors->first('description_am', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('English Description') }}
            {{ Form::textarea('description_en', $lookup->description_en, ['class' => 'form-control' . ($errors->has('description_en') ? ' is-invalid' : ''), 
            'placeholder' => 'Description En',
            'rows'=>'4']) }}
            {!! $errors->first('description_en', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       

    

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>