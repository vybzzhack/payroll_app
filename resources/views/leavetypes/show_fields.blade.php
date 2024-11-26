<!-- Leave Name Field -->
<div class="col-sm-12">
    {!! Form::label('leave_name', 'Leave Name:') !!}
    <p>{{ $leavetypes->leave_name }}</p>
</div>

<!-- Duration Field -->
<div class="col-sm-12">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $leavetypes->duration }}</p>
</div>

<!-- Paid Field -->
<div class="col-sm-12">
    {!! Form::label('paid', 'Paid:') !!}
    <p>{{ $leavetypes->paid }}</p>
</div>

<!-- Leave Condition Field -->
<div class="col-sm-12">
    {!! Form::label('leave_condition', 'Leave Condition:') !!}
    <p>{{ $leavetypes->leave_condition }}</p>
</div>

