@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img style="height: 32px; width: 32px;" src="{{ asset('images')}}/{{ $cryptoAsset->asset_logo }}" /> {{ $cryptoAsset->name }} ({{ $cryptoAsset->symbol }})
                </div>
                <div class="panel-body">
                    {{-- display success message --}} @if (Session::has('success'))
                    <div class="alert alert-success">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                    @endif {{-- display error message --}} @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                {{-- Template Start --}}
                <div class="container-fluid">
                    <div class="col-md-2">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Product
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            TB - Monthly
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="tabbable" id="tabs-305570">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#panel-495769" data-toggle="tab">Basic
                                    </a>
                                </li>
                                <!--
                                <li>
                                    <a href="#panel-207616" data-toggle="tab">Section 2
                                    </a>
                                </li>
                                -->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel-495769">
                                    {{-- Section Start --}}
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Description</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Similar Coins</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Team</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Website</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Twitter</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="control-label">Github Repository</label>
                                            <p class="form-control-static">Lorem Ipsum and then some</p>
                                        </div>
                                    </div>
                                    {{-- Section End --}}
                                </div>
                                <!--
                                <div class="tab-pane" id="panel-207616">
                                    <p>
                                        Howdy, I'm in Section 2.
                                    </p>
                                </div> 
                                -->
                            </div>
                        </div>
                    </div>
                    {{-- Template End --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
