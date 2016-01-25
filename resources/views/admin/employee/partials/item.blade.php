<script type="text/javascript">
    $(document).ready(function() {
        $("#id_Region").change(function() {
            $.getJSON("{{ URL::to("admin/source") }}" +"/" + $("#id_Region").val() + "/GetCoutryRegion", function(data) {
                var country = $("#id_Country");
                country.empty();
                $.each(data, function(index, value) {
                    country.append('<option value="' + value.id_Country +'">' + value.Country + '</option>');
                });
            });
        });
        $('#starYearAttends').datetimepicker({
            showClear: true,
            showClose: true,
            format: 'DD-MMM-YYYY'
        });
        $('#finishYearAttends').datetimepicker({
            showClear: true,
            showClose: true,
            format: 'DD-MMM-YYYY'
        });
        $('#starYearJob').datetimepicker({
            showClear: true,
            showClose: true,
            format: 'DD-MMM-YYYY'
        });
        $('#finishYearJob').datetimepicker({
            showClear: true,
            showClose: true,
            format: 'DD-MMM-YYYY'
        });
    });
</script>
<script src="{{ asset('frontend/controllers/admin/adminEmployeeCareerHistory.js') }}"></script>
<script src="{{ asset('frontend/controllers/admin/adminEmployeeCareerHistoryCtrl.js') }}"></script>
<script src="{{ asset('frontend/controllers/admin/adminEmployeeEducationHistoryCtrl.js') }}"></script>
<div class="row">
    <div class="content content-header">
        <div class="col-md-12">
            <div class="form-row">
                <div class="pull-right top-right">
                    {!! Form::submit($submit_text, array('class' => 'btn btn-success btn-sm', 'name' => $submit_text)) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" ng-controller="adminEmployeeCareerHistory">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="block">
            <div class="header">
                <h2>{!! $BlockHeader !!}</h2>

            </div>
            <div class="content">
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="head np tac">
                            <img src="themes/taurus/img/user.jpg" class="img-thumbnail img-circle"/>
                        </div>
                        <div class="">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="input-group file">
                                        <input type="text" class="form-control" value="img/example/user/dmitry_b.jpg"/>
                                        <input type="file" name="file"/>
                                    <span class="input-group-btn">
                                        <button class="btn" type="button">Browse</button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 np">
                        <div class="form-row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                {!! Form::label('Current_position', 'Carrent Position:') !!}
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                @foreach($careerHistory as $careerItem)
                                    @if ($careerItem->Current_Position_Status)
                                        {!! $careerItem->Position_Name !!}
                                        ({!! $careerItem->Company_Name !!})
                                    @else
                                        {!! "-" !!}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                {!! Form::label('id_Employee_Type', 'Employee Type:') !!}
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                {!! Form::select('id_Employee_Type',$employeeType, $employee->id_Employee_Type, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                {!! Form::label('title', 'Title:') !!}
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                {!! Form::select('id_People_Title', $peopleTitle, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                {!! Form::label('First_Name', 'First Name:') !!}
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                {!! Form::text('First_Name', null, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('Middle_Name', 'Midle Name:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::text('Middle_Name', null, ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('Surname', 'Last Name:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::text('Surname', null, ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {!! Form::label('Employee_Address', 'Employee Address:') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('id_Availability_Territory', 'Region:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::select('id_Region', $regionsOptions, $address->getCountry()->id_Region, ['class' => 'form-control', 'id' => 'id_Region']) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('id_Country', 'Country:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::select('id_Country', $countryOptions, $address->id_Country, ['class' => 'form-control', 'id' => 'id_Country']) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('State', 'State:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::text('State', $address->State, ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('City', 'City:') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::text('City', $address->City, ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {!! Form::label('Employee_Address', 'Career and Educarion Descriptions:') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('Education_Description', 'Education Description') !!}
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::textarea('Education_Description',$employee->Education_Description, ['size' => '20x3', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        {!! Form::label('Career_Description', 'Cereer Description') !!}
                    </div>
                    <div class="col-xs-10 col-sm-9 col-md-9 col-lg-9">
                        {!! Form::textarea('Career_Description',null, ['size' => '20x3', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="block block-drop-shadow">
            <div class="header">
                <h2>Education History</h2>
                <div class="side pull-right">
                    <ul class="buttons">
                        <li><a href="#" data-ng-click="open({resultContainer:'result-education-container',target:'education'})"><span class="glyphicon glyphicon-plus"></span></a></li>
                        <li><a href="#"><span class="icon-cogs"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="content content-transparent np">
                <div class="list list-contacts">
                    <div class="list-item">
                        <div class="list-datetime">
                            <div class="time">September 2012</div>
                        </div>
                        <div class="list-text">
                            <a href="#" class="list-text-name">CEO</a>
                            <p>Some Company.</p>
                        </div>
                        <div class="list-controls">
                            <a href="#" class="widget-icon widget-icon-circle"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" class="widget-icon widget-icon-circle"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="block block-drop-shadow">
            <div class="header">
                <h2>Career History</h2>
                <div class="side pull-right">
                    <ul class="buttons">
                        <li><a href="#" data-ng-click="open({resultContainer:'result-career-container',target:'career'})"><span class="glyphicon glyphicon-plus"></span></a></li>
                        <li><a href="#"><span class="icon-cogs"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="content content-transparent np">
                <div class="list list-contacts">
                    <div class="list-item">
                        <div class="list-datetime">
                            <div class="time">September 2012</div>
                        </div>
                        <div class="list-text">
                            <a href="#" class="list-text-name">CEO</a>
                            <p>Some Company.</p>
                        </div>
                        <div class="list-controls">
                            <a href="#" class="widget-icon widget-icon-circle"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" class="widget-icon widget-icon-circle"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="content content-header">
        <div class="col-md-12">
            <div class="form-row">
                <div class="pull-right top-right">
                    {!! Form::submit($submit_text, array('class' => 'btn btn-success btn-sm', 'name' => $submit_text)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="col-md-6">--}}
    {{--@if ($universityHisttory->count() > 0)--}}
        {{--<ul>--}}
            {{--@foreach($universityHisttory as $id => $historyItem)--}}
                {{--<li class="row">--}}
                    {{--{!! $historyItem->University_Name !!}--}}
                    {{--{!! $historyItem->Degree_title !!}--}}
                    {{--{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-xs', 'name' => "del_attachment_$id")) !!}--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    {{--@if ($careerHistory->count() > 0)--}}
        {{--<ul>--}}
            {{--@foreach($careerHistory as $id => $historyItem)--}}
                {{--<li class="row">--}}
                    {{--{!! $historyItem->Company_Name !!}--}}
                    {{--{!! $historyItem->Position_Name !!}--}}
                    {{--{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-xs', 'name' => "del_attachment_$id")) !!}--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
{{--</div>--}}
