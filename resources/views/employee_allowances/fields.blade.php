<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select Employee', 'required']) !!}

</div>

<!-- Allowance Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allowance_id', 'Allowance Id:') !!}
    {!! Form::select('allowance_id', $allowances, null, ['class' => 'form-control', 'placeholder' => 'Select Allowance', 'required']) !!}

</div>