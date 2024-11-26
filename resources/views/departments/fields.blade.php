<!-- Department Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_name', 'Department Name:') !!}
    {!! Form::text('department_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Manager Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manager_id', 'Manager:') !!}
    {!! Form::select('manager_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select employee', 'required']) !!}
</div>

