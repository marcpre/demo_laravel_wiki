@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
                {{-- Template Start --}}
                <div class="container-fluid">

		<div class="col-md-2">
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
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
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-10">
			<div class="tabbable" id="tabs-305570">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-495769" data-toggle="tab">Section 1</a>
					</li>
					<li>
						<a href="#panel-207616" data-toggle="tab">Section 2</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-495769">
						<p>
							I'm in Section 1.
						</p>
					</div>
					<div class="tab-pane" id="panel-207616">
						<p>
							Howdy, I'm in Section 2.
						</p>
					</div>
				</div>
			</div>
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
			<dl>
				<dt>
					Description lists
				</dt>
				<dd>
					A description list is perfect for defining terms.
				</dd>
				<dt>
					Euismod
				</dt>
				<dd>
					Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
				</dd>
				<dd>
					Donec id elit non mi porta gravida at eget metus.
				</dd>
				<dt>
					Malesuada porta
				</dt>
				<dd>
					Etiam porta sem malesuada magna mollis euismod.
				</dd>
				<dt>
					Felis euismod semper eget lacinia
				</dt>
				<dd>
					Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				</dd>
			</dl>
		</div>
</div>
                
                {{-- Template End --}}
                
            </div>
        </div>
    </div>
</div>
@endsection
