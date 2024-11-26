<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Select Employee', 'required']) !!}
    
</div>


<!-- Basic Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('basic_salary', 'Basic Salary:') !!}
    {!! Form::number('basic_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Bonus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonus', 'Bonus:') !!}
    {!! Form::number('bonus', null, ['class' => 'form-control']) !!}
</div>

<!-- Deductions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deductions', 'Deductions:') !!}
    {!! Form::number('deductions', null, ['class' => 'form-control']) !!}
</div>

<!-- Net Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('net_salary', 'Net Salary:') !!}
    {!! Form::number('net_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_date', 'Pay Date:') !!}
    {!! Form::date('pay_date', null, ['class' => 'form-control','id'=>'pay_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#pay_date').datepicker()
    </script>
@endpush