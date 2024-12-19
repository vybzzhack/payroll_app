<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee:') !!}
    <p>{{ $employeeDeductions->employee->full_name }}</p>
</div>

<!-- Deduction Id Field -->
<div class="col-sm-12">
    {!! Form::label('deduction_id', 'Deduction:') !!}
    <p>{{ $employeeDeductions->deduction->deduction_name }}</p>
</div>

