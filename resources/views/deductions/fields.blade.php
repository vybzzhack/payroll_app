<!-- Deduction Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deduction_name', 'Deduction Name:') !!}
    {!! Form::text('deduction_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Deduction Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deduction_type', 'Deduction Type:') !!}
    {!! Form::text('deduction_type', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>