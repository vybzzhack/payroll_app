<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $payrolls->employee_id }}</p>
</div>

<!-- Salary Id Field -->
<div class="col-sm-12">
    {!! Form::label('salary_id', 'Salary Id:') !!}
    <p>{{ $payrolls->salary_id }}</p>
</div>

<!-- Total Earnings Field -->
<div class="col-sm-12">
    {!! Form::label('total_earnings', 'Total Earnings:') !!}
    <p>{{ $payrolls->total_earnings }}</p>
</div>

<!-- Total Deductions Field -->
<div class="col-sm-12">
    {!! Form::label('total_deductions', 'Total Deductions:') !!}
    <p>{{ $payrolls->total_deductions }}</p>
</div>

<!-- Net Pay Field -->
<div class="col-sm-12">
    {!! Form::label('net_pay', 'Net Pay:') !!}
    <p>{{ $payrolls->net_pay }}</p>
</div>

<!-- Payroll Status Field -->
<div class="col-sm-12">
    {!! Form::label('payroll_status', 'Payroll Status:') !!}
    <p>{{ $payrolls->payroll_status }}</p>
</div>

