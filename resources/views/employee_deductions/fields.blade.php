<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select Employee', 'required']) !!}
</div>

<!-- Deduction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deduction_id', 'Deduction Name:') !!}
    {!! Form::select('deduction_id', $deductions, null, ['class' => 'form-control', 'placeholder' => 'Select Deduction', 'required']) !!}
</div>