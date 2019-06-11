@extends('layouts.home')

@section('title', 'Report | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Report this Account</h3>
            <hr>
                <form method="POST" id="report" action="/report/soon-to-wed/{{ $profile->id }}/submit">
                 @csrf

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="report_type">Type of Report</label>
                        <select class="form-control" id="report_type" name="report_type" required>
                            <option>Abusive Behavior</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="report">Report Details</label>
                        <br><textarea class="form-control" id="report" name="report" placeholder="Specify your report..." rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/view/soon-to-wed/{{ $profile->id }}" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1" data-toggle="modal" data-target="#report_user">Submit Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="report_user" tabindex="-1" role="dialog" aria-labelledby="report" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="report">Submit Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit this report?
                    <br>
                    <label>Subject:</label>
                    <p id="subject1"></p>
                    <p id="report_type1"><b>Report Type: </b></p>
                    <p id="report1"><b>Report Details: </b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit_report" class="btn btn-success" href="/report/soon-to-wed/{{ $profile->id }}/submit">Submit Report</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#submit_report').click(function() {
            $('#subject1').text($('#subject').val());
            $('#report_type1').text($('#report_type').val());
            $('#report1').text($('#report').val());
        });

        $('#submit').click(function(){
            alert('Submit now');
            $('#report').submit();
        });
    </script>
@endsection