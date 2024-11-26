<!-- Leave Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_name', 'Leave Name:') !!}
    {!! Form::text('leave_name', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::number('duration', null, ['class' => 'form-control']) !!}
</div>

<!-- Paid Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('paid', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('paid', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('paid', 'Paid', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Leave Condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_condition', 'Leave Condition:') !!}
    {!! Form::text('leave_condition', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>