<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select employee', 'required']) !!}
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', 'Bank Name:') !!}
    {!! Form::text('bank_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Branch Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_name', 'Branch Name:') !!}
    {!! Form::text('branch_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Account Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_number', 'Account Number:') !!}
    {!! Form::number('account_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Account Name:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Account Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_type', 'Account Type:') !!}
    {!! Form::text('account_type', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Bank Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_code', 'Bank Code:') !!}
    {!! Form::text('bank_code', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>