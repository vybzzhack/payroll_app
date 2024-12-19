<!-- Deduction Name Field -->
<div class="col-sm-12">
    {!! Form::label('deduction_name', 'Deduction Name:') !!}
    <p>{{ $deductions->deduction_name }}</p>
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

