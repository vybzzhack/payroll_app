<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $deductions->employee_id }}</p>
</div>

<!-- Deduction Type Field -->
<div class="col-sm-12">
    {!! Form::label('deduction_type', 'Deduction Type:') !!}
    <p>{{ $deductions->deduction_type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $deductions->amount }}</p>
</div>

<!-- Date Applied Field -->
<div class="col-sm-12">
    {!! Form::label('date_applied', 'Date Applied:') !!}
    <p>{{ $deductions->date_applied }}</p>
</div>

