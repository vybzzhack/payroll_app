<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select employee', 'required']) !!}
</div>

<!-- Salary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary_id', 'Salary Id:') !!}
    {!! Form::select('salary_id', $salaries, null, ['class' => 'form-control', 'placeholder' => 'Select salary', 'required']) !!}
</div>

<!-- Total Earnings Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_earnings', 'Total Earnings:') !!}
    {!! Form::number('total_earnings', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Deductions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_deductions', 'Total Deductions:') !!}
    {!! Form::number('total_deductions', null, ['class' => 'form-control']) !!}
</div>

<!-- Net Pay Field -->
<div class="form-group col-sm-6">
    {!! Form::label('net_pay', 'Net Pay:') !!}
    {!! Form::number('net_pay', null, ['class' => 'form-control']) !!}
</div>

<!-- Payroll Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payroll_status', 'Payroll Status:') !!}
    {!! Form::text('payroll_status', null, ['class' => 'form-control', 'maxlength' => 1, 'maxlength' => 1]) !!}
</div>