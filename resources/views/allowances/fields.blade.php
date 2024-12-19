<!-- Allowance Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allowance_type', 'Allowance Type:') !!}
    {!! Form::text('allowance_type', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>