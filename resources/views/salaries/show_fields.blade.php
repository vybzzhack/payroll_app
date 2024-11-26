<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $salaries->employee_id }}</p>
    <!-- <p>{{ $client->employee ? $client->employee->first_name : 'No employee assigned' }}</p> -->
</div>

<!-- <div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $employee->full_name }}</p>
</div> -->

<!-- Basic Salary Field -->
<div class="col-sm-12">
    {!! Form::label('basic_salary', 'Basic Salary:') !!}
    <p>{{ $salaries->basic_salary }}</p>
</div>

<!-- Bonus Field -->
<div class="col-sm-12">
    {!! Form::label('bonus', 'Bonus:') !!}
    <p>{{ $salaries->bonus }}</p>
</div>

<!-- Deductions Field -->
<div class="col-sm-12">
    {!! Form::label('deductions', 'Deductions:') !!}
    <p>{{ $salaries->deductions }}</p>
</div>

<!-- Net Salary Field -->
<div class="col-sm-12">
    {!! Form::label('net_salary', 'Net Salary:') !!}
    <p>{{ $salaries->net_salary }}</p>
</div>

<!-- Pay Date Field -->
<div class="col-sm-12">
    {!! Form::label('pay_date', 'Pay Date:') !!}
    <p>{{ $salaries->pay_date }}</p>
</div>

