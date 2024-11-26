<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee:') !!}
    <p>{{ $allowances->employee_id }}</p>
</div>

<!-- Allowance Type Field -->
<div class="col-sm-12">
    {!! Form::label('allowance_type', 'Allowance Type:') !!}
    <p>{{ $allowances->allowance_type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $allowances->amount }}</p>
</div>

<!-- Date Granted Field -->
<div class="col-sm-12">
    {!! Form::label('date_granted', 'Date Granted:') !!}
    <p>{{ $allowances->date_granted }}</p>
</div>

<!-- Allowance Privilage Field -->
<div class="col-sm-12">
    {!! Form::label('allowance_privilage', 'Allowance Privilage:') !!}
    <p>{{ $allowances->allowance_privilage }}</p>
</div>

