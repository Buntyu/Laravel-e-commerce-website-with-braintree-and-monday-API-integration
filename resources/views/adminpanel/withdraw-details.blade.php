@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">User Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount for withdrawal</th>
                        <th>Date of request</th>
                        <th>BSB</th>
                        <th>Account</th>
                    </tr>
                    <tr>
                        <td>{{$withdraw->name}}</td>
                        <td>{{$withdraw->email}}</td>
                        <td>{{$withdraw->sum}}</td>
                        <td>{{$withdraw->created_at}}</td>
                        <td>{{$withdraw->bsb}}</td>
                        <td>{{$withdraw->account}}</td>
                    </tr>
                </table>
                <div class="col-md-1"><form action="{{url('adminpanel/withdraw/success')}}/{{$withdraw->id}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-success" value="Accept">
                    </form></div>
                <div class="col-md-1"><form action="{{url('adminpanel/withdraw/failed')}}/{{$withdraw->id}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="Decline">
                    </form>
                </div>



            </div>

        </div>
    </div>

@stop

@section('modal-block')


@stop